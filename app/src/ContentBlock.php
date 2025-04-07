<?php

namespace Galactic;


use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class ContentBlock extends DataObject
{
    private static $db = [
        'Title' => 'Text',
        'ContentArea' => 'HTMLText',

    ];

    private static $singular_name = "Content Block";
    private static $plural_name = "Content Blocks";
    // private static $hide_ancestor = 'Galactic\ContactBlock';
    // private static $hide_from_cms_tree = 'ContactBlock';






    private static $has_one = [

        'EnvironmentPage' => EnvironmentPage::class,
        'HomePage' => HomePage::class,
        'FeaturedImage' => Image::class
        //'Tier' => Tier::class
    ];

    private static $owns = [
        'FeaturedImage'
    ];

    // private static $extensions = [
    //     Versioned::class,
    // ];

    // private static $versioned_gridfield_extensions = true;



    private static $summary_fields = [
        'Title' => 'Title',



    ];
    private static $table_name = 'OGContentBlock';


    public function getCMSFields()
    {
        //CheckboxSetField::create('typeforms', 'Type of Forms', array('online' => 'Online', 'downloadable' => 'Downloadable','other' => 'Other')),


        return new FieldList(
            new TextField('Title'),
            new HTMLEditorField('ContentArea'),
            new UploadField('FeaturedImage', 'Image'),




        );
    }
}
