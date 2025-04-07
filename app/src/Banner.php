<?php

namespace Galactic;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TabSet;
use SilverStripe\Versioned\Versioned;


class Banner extends DataObject
{


    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
        'TextVariation' => 'Text',
        // 'HeroBGcolor' => 'Text',
        'HideText' => 'Boolean',
        'Sort' => 'Int',

    ];

    private static $has_one = [

        'PrimaryPhoto' => Image::class,
        'MobilePhoto' => Image::class,
        'TopLayeredPhoto' => Image::class,
        'HomePage' => HomePage::class, // Add this line
    ];

    private static $api_access = true;

    private static $table_name = 'OGBanners';

    private static $menu_title = 'Homepage Banners';


    // This will auto publish the image
    private static $owns = [
        'PrimaryPhoto',
        'MobilePhoto',
        'TopLayeredPhoto'
    ];

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;


    protected function onBeforeWrite()
    {
        if (!$this->Sort) {
            $this->Sort = Banner::get()->max('Sort') + 1;
        }

        parent::onBeforeWrite();
    }


    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            DropdownField::create('TextVariation', 'Text Variation', array('light' => 'Light', 'dark' => 'Dark'))->setEmptyString('(Select one)'),
        ]);

        // $fields->addFieldsToTab('Root.Main', DropdownField::create('HeroBGcolor', 'Banner Background color', array('bluetoskybg' => 'Blue to Skyblue Gradient', 'bluetopinkbg' => 'Blue to Pink gradient','white' => 'White'))->setEmptyString('Select One'),'Content');

        $fields->addFieldToTab('Root.Main', new HTMLEditorField('Description'));



        $primaryPhotoUpload = UploadField::create('PrimaryPhoto', 'Picture');
        $mobilePhotoUpload = UploadField::create('MobilePhoto', 'Mobile Photo');
        $layeredPhotoUpload = UploadField::create('TopLayeredPhoto', 'Top Layered Photo');
        
        $primaryPhotoUpload->getValidator()->setAllowedExtensions(['png', 'jpeg', 'jpg', 'gif']);
        $mobilePhotoUpload->getValidator()->setAllowedExtensions(['png', 'jpeg', 'jpg', 'gif']);
        $layeredPhotoUpload->getValidator()->setAllowedExtensions(['png', 'jpeg', 'jpg', 'gif']);
        
        $primaryPhotoUpload->setFolderName('homepage-photos');
        $mobilePhotoUpload->setFolderName('homepage-photos');
        $layeredPhotoUpload->setFolderName('homepage-photos');
        
        $fields->addFieldsToTab('Root.Main', [$primaryPhotoUpload, $mobilePhotoUpload, $layeredPhotoUpload]);
        

        $fields->removeByName(array(
            'Sort'
        ));
        $fields->addFieldToTab("Root.Main", new CheckboxField("HideText", "Hide Copy? "), );
   

        return $fields;
    }
}
