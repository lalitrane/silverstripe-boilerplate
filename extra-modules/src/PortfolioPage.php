<?php

namespace Origami;

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

class PortfolioPage extends Page
{
    //Hide from "addpage"
    private static $hide_ancestor = PortfolioPage::class;

    private static $db =  [

        'ImageCard1Label' => 'Varchar',
        'FeaturesTitle' => 'Varchar',
        'Features1' => 'HTMLText',
        'Features2' => 'HTMLText',
        'BenefitsTitle' => 'Varchar',
        'Benefits' => 'HTMLText',
        'OptionsTitle' => 'Varchar',
        'Options' => 'HTMLText',
        'OptionsYTVideoURL' => 'Varchar',
        'OptionsVIVideoURL' => 'Varchar',
        'SpecificationsTitle' => 'Varchar',
        'Specifications' => 'HTMLText',
        // 'MachineryType' => 'Varchar(100)',



    ];

    private static $has_one = [
        'OptionsImg' => Image::class,
        'VendorLogo' => Image::class,



    ];
    private static $description = 'Portfolio Page layout';
    private static $icon_class = 'font-icon-rocket';
    private static $table_name = 'OGPortfoliopage';


    private static $owns = [
        'OptionsImg',
        'VendorLogo'

    ];


    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->OptionsImg()->exists() && !$this->OptionsImg()->isPublished()) {
            $this->OptionsImg()->doPublish();
        }
        if ($this->VendorLogo()->exists() && !$this->VendorLogo()->isPublished()) {
            $this->VendorLogo()->doPublish();
        }
    }
    private static $defaults = [
        'FeaturesTitle' => 'Features',
    ];

    public function  getCMSFields()
    {

        $fields = parent::getCMSFields();



        // $fields->addFieldsToTab('Root.Main', [
        //     DropdownField::create('MachineryType', 'Machinery Type', array( 'semiauto' => 'Semi-Automatic Stretch Wrappers', 'auto' => 'Automatic Stretch Wrappers' ))->setEmptyString('(Select one)'),
        //     ]);

        $fields->addFieldToTab(
            'Root.Main',
            $VendorLogo = UploadField::create('VendorLogo'),
            'Content'
        );


        $fields->addFieldToTab(
            'Root.Features',
            TextField::create('FeaturesTitle', 'Title', 'features')->setDescription('Only use if you wish to override default <strong>Features</strong> title')

        );

        $fields->addFieldToTab('Root.Features',   HTMLEditorField::create('Features1', 'Features 1st Column')->setRows(5));

        $fields->addFieldToTab('Root.Features',   HTMLEditorField::create('Features2', 'Features 2nd Column')->setRows(5));


        $fields->addFieldToTab(
            'Root.Benefits',
            TextField::create('BenefitsTitle', 'Title')->setDescription('Only use if you wish to override default <strong>Benfits</strong> title')
        );

        $fields->addFieldToTab('Root.Benefits',   HTMLEditorField::create('Benefits', 'Benefits')->setRows(5));







        $fields->addFieldToTab(
            'Root.Options',
            TextField::create('OptionsTitle', 'Title')->setDescription('Only use if you wish to override default <strong>Options</strong> title')
        );

        $fields->addFieldToTab('Root.Options',   HTMLEditorField::create('Options', 'Options')->setRows(5));




        $fields->addFieldToTab(
            'Root.Options',
            TextField::create('OptionsYTVideoURL', 'Youtube Video URL')
        );

        $fields->addFieldToTab(
            'Root.Options',
            TextField::create('OptionsVIVideoURL', 'Vimeo Video URL')
        );
        $fields->addFieldToTab(
            'Root.Options',
            $OptionsImg = UploadField::create('OptionsImg', 'Image')
        );


        $fields->addFieldToTab('Root.Specifications',   HTMLEditorField::create('Specifications', 'Specifications'));








        $OptionsImg->setFolderName('Machinery-photos');

        $VendorLogo->setFolderName('Machinery-photos');
        return $fields;
    }


    // public function getCMSValidator()
    // {
    //     return new RequiredFields([
    //         'MachineryType'
    //     ]);
    // }
}
