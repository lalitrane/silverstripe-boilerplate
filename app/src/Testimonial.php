<?php

namespace Galactic;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TabSet;



class Testimonial extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Url' => 'Varchar',

    ];

    private static $has_one = [

        'QuoteImg' => Image::class,
        //'Tier' => Tier::class
    ];
    private static $many_many = [
        'Rating' => Rating::class,
    ];

    private static $table_name = 'OGPartners';


    // This will auto publish the image
    private static $owns = [
        'QuoteImg'
    ];

    // private static $extensions = [
    //     Versioned::class,
    // ];

    // private static $versioned_gridfield_extensions = true;

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->QuoteImg()->exists() && !$this->QuoteImg()->isPublished()) {
            $this->QuoteImg()->doPublish();
        }
    }


    public function getCMSfields()
    {

        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            TextField::create('Url', 'Url'),
        ]);
        $fields->addFieldToTab('Root.Main', $upload = UploadField::create(
            'QuoteImg',
            'Picture'
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('Testimonials');

        return $fields;
    }
}
