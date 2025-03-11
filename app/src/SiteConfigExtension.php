<?php

namespace Galactic;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Assets\Image;
// use SilverStripe\Assets\File;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Silverstripe\SiteConfig\SiteConfig;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\CMS\Model\SiteTree;
class SiteConfigExtension extends DataExtension

{
    private static $db =[

        'PhoneNumber' => 'Varchar',
        'PhoneNumber1' => 'Varchar',
        'Email' => 'Varchar',
        'Email1' => 'Varchar',
        'FooterContent' => 'Text',
        'LinkedIn' => 'Varchar',
        'Facebook' => 'Varchar',
        'Twitter' => 'Varchar',
        'Instagram' => 'Varchar',
        'Youtube' => 'Varchar',
        'Instagram' => 'Varchar',
        'PlaceholderSS1' => 'Varchar',
        'PlaceholderSS2' => 'Varchar',
        'Address'=>'HTMLText',
        'Copyright'=>'HTMLText',
        'headcode'=>'HTMLText',
        'bodycode'=>'HTMLText',
        'ThemeVariation' => 'Text',


    ];


    private static $has_one = [
        'Logo_Dark' => Image::class,
        'Logo_Light' => Image::class,
        'favicon' => Image::class
    ];

    
    public function updateCMSFields(FieldList $fields)
    {


     $fields->addFieldToTab('Root.Branding', UploadField::create('Logo_Dark','Logo'));
     $fields->addFieldToTab('Root.Branding', UploadField::create('Logo_Light','Logo (Light Version)'));
     $fields->addFieldToTab('Root.Branding', UploadField::create('favicon','Favicon (512px 512px)'));
     $fields->addFieldToTab('Root.Branding', DropdownField::create('ThemeVariation', 'Navbar', array('light' => 'Light', 'dark' => 'Dark')) ->setValue('light'));

     


     $fields->addFieldToTab('Root.Contact', new EmailField('Email','Email'));
     $fields->addFieldToTab('Root.Contact', new EmailField('Email1','Alternate Email'));
     $fields->addFieldToTab('Root.Contact',TextField::create('PhoneNumber','Phone'));
     $fields->addFieldToTab('Root.Contact',TextField::create('PhoneNumber1','Alternate Phone'));
     $fields->addFieldsToTab('Root.Contact', new HTMLEditorField('Address', 'Address'));
     $fields->addFieldToTab('Root.Social', new TextField('LinkedIn','LinkedIn'));
     $fields->addFieldToTab('Root.Social', new TextField('Twitter','Twitter'));
     $fields->addFieldToTab('Root.Social',TextField::create('Facebook','Facebook'));
     $fields->addFieldToTab('Root.Social',TextField::create('Instagram','Instagram'));
     $fields->addFieldToTab('Root.Social',TextField::create('Youtube','Youtube'));
     $fields->addFieldToTab('Root.Social',TextField::create('PlaceholderSS1','Placeholder Social Media'));
     $fields->addFieldToTab('Root.Social',TextField::create('PlaceholderSS2','Placeholder Social Media'));
     
        $fields->addFieldsToTab('Root.Footer', TextareaField::create('FooterContent', 'Content for footer'));
        $fields->addFieldsToTab('Root.Footer', new HTMLEditorField('Copyright', 'Copyright information'));

        $fields->addFieldToTab('Root.Marketing',TextareaField::create('headcode','Code to be placed in Head tag'));
        $fields->addFieldToTab('Root.Marketing',TextareaField::create('bodycode','Code to be placed after the opening <body> tag'));


    }
}