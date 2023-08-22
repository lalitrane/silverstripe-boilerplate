<?php

namespace Galactic;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TabSet;
use SilverStripe\Versioned\Versioned;


class Vendor extends DataObject
{


    private static $db = [
        'Title' => 'Varchar',
        'VendorURL' => 'HTMLText',



    ];

    private static $has_one = [

        'VendorLogo' => Image::class

    ];

    // private static $belongs_many_many = [
    //     'ProductPage' => ProductPage::class,
    //     'IndustryHolder' => IndustryHolder::class,
    //     'IndustryPage' => IndustryPage::class
    // ];


    private static $defaults = [
        'ShowInMenus' => false,
        'ShowInSearch' => false,
        'HideFromSiteTree' => true
    ];


    // private static $api_access = true;

    private static $table_name = 'OGVendors';

    private static $menu_title = 'Vendors';


    // This will auto publish the image
    private static $owns = [
        'VendorLogo'
    ];

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->VendorLogo()->exists() && !$this->VendorLogo()->isPublished()) {

            $this->VendorLogo()->doPublish();
        }
    }


    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            TextField::create('VendorURL')
        ]);







        $fields->addFieldToTab('Root.Main', $upload = UploadField::create(
            'VendorLogo',
            'Logo'
        ));


        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('Vendors');

        return $fields;
    }
}
