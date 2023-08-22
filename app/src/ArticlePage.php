<?php

namespace Galactic;

use Page;

use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\RequiredFields;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\DropdownField;

class ArticlePage extends Page
{

    private static $can_be_root = false;

    private static $db =  [];
    private static $description = 'Article Page layout';
    private static $icon_class = 'font-icon-rocket';
    private static $table_name = 'OGMachinerypage';


    // private static $owns = [
    //     'OptionsImg',
    //     'VendorLogo'

    // ];


    // public function onAfterWrite()
    // {
    //     parent::onAfterWrite();
    //     if ($this->OptionsImg()->exists() && !$this->OptionsImg()->isPublished()) {
    //         $this->OptionsImg()->doPublish();
    //     }
    //     if ($this->VendorLogo()->exists() && !$this->VendorLogo()->isPublished()) {
    //         $this->VendorLogo()->doPublish();
    //     }
    // }
    // private static $defaults = [
    //     'FeaturesTitle' => 'Features',

    // ];

    public function  getCMSFields()
    {

        $fields = parent::getCMSFields();




        return $fields;
    }


    // public function getCMSValidator()
    // {
    //     return new RequiredFields([
    //         'MachineryType'
    //     ]);
    // }
}
