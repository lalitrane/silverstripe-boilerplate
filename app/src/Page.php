<?php

namespace {

  use SilverStripe\CMS\Model\SiteTree;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\CompositeField;
  use SilverStripe\AssetAdmin\Forms\UploadField;
  use SilverStripe\Forms\CheckboxField;
  use SilverStripe\Forms\LabelField;
  // use DNADesign\Elemental\Extensions\ElementalPageExtension;

  class Page extends SiteTree
  {
    private static $db =  [
      'Alttitle' => 'Text',
      "ShowInCTAMenu" => "Boolean",
      'MetaTitle' => 'Varchar(255)',
      'Subtitle' => 'HTMLText',
      "HideCTA" => "Boolean",
      "FooterCol1" => "Boolean",
      "FooterCol2" => "Boolean",
      "FooterCopyrightCTA" => "Boolean",
    ];
  //   private static array $extensions = [
  //     ElementalPageExtension::class,
  // ];
    private static $has_one = [
      'HeroImage' => Image::class,
      'MetaImage' => Image::class
    ];

    // This will auto publish the image
    private static $owns = [
      'HeroImage',
      'MetaImage'
    ];


    // public function onAfterWrite()
    // {
    //   parent::onAfterWrite();
    //   if ($this->HeroImage()->exists() && !$this->HeroImage()->isPublished()) {
    //     $this->HeroImage()->doPublish();
    //   }

    //   if ($this->MetaImage()->exists() && !$this->MetaImage()->isPublished()) {
    //     $this->MetaImage()->doPublish();
    //   }
    // }
    function getSettingsFields()
    {
      $fields = parent::getSettingsFields();

      $fields->addFieldToTab(
        "Root.Settings",

        CompositeField::create(
          CheckboxField::create("ShowInCTAMenu", "Show in CTA menu?"),
          CheckboxField::create("FooterCopyrightCTA", "Show in Copyright row?"),
          CheckboxField::create("FooterCol1", "Show in Footer First column menu?"),
          CheckboxField::create("FooterCol2", "Show in Footer Second column menu?"),
        )->setTitle('Page Visibility')
      );




      return $fields;
    }
    public function  getCMSFields()
    {
      $fields = parent::getCMSFields();


      $fields->addFieldToTab(
        'Root.Main',
        $photo1 = UploadField::create('HeroImage', 'Banner'),
        'Content'
      );

      $fields->addFieldToTab('Root.Main', TextField::create('Alttitle', 'Alternate title')
        ->setDescription('Enter title here if you dont want to use default page title.'), 'Content');
      $fields->addFieldToTab(
        'Root.Main',
        TextField::create('MetaTitle')
          ->setRightTitle('Shown at the top of the browser window and used as the "linked text" by search engines.')
          ->addExtraClass('help'),
        'MetaDescription'
      );
      $fields->addFieldToTab(
        'Root.Main',
        $photo2 = UploadField::create('MetaImage', 'Meta Image'),
        'MetaDescription'
      );
      $photo1->setFolderName('Hero-photos');
      $photo2->setFolderName('Meta-photos');
      return $fields;
    }
  }
}
