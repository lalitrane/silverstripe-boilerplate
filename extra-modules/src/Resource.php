<?php

namespace Origami;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\TabSet;
use SilverStripe\Versioned\Versioned;
use SilverStripe\TextExtraction\Cache\FileTextCache;
use SilverStripe\TextExtraction\Extractor\FileTextExtractor;
use SilverStripe\TextExtraction\Extractor\PDFTextExtractor;
use SilverStripe\TextExtraction\Extractor\HTMLTextExtractor;
use andrewandante\silverstripepdfparser\Extractor\PDFParserTextExtractor;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DropdownField;
use Page;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\RequiredFields;

// use SilverStripe\Forms\ListboxField;
// use SilverStripe\Security\Member;
// use SilverStripe\Blog\Model\BlogPost;
// use SilverStripe\Security\Group;
// use SilverStripe\Security\Permission;
// use SilverStripe\Security\Security;
// use SilverStripe\Blog\Model\Blog;

class Resource extends Page
{
    //Hide from "addpage"
    private static $hide_ancestor = Resource::class;

    // private static $can_be_root = false;
    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
        'Blurb' => 'HTMLText',
        'extractedtext' => 'Text',
        'Gated' => 'Boolean',
        'vimeoID' => 'Text',
        // 'Sort'=>'Int'


    ];
    private static $icon_class = 'font-icon-book-open';
    private static $has_one = [

        'PrimaryPhoto' => Image::class,

        'Videothumb' => Image::class,
        // 'ResourceSearchPage' => ResourceSearchPage::class,
        'pdfupload' => File::class,


    ];


    private static $defaults = [
        'ShowInMenus' => false,
        'ShowInSearch' => false,
        'HideFromSiteTree' => true

    ];

    private static $many_many = [
        // 'IndustryHolder' => IndustryHolder::class,
        // 'IndustryPage' => IndustryPage::class,
        'ResourceType' => ResourceType::class,
        'ResourceTopic' => ResourceTopic::class,
        // 'Authors'    => Member::class

    ];



    private static $table_name = 'OGResourcecentre';

    private static $menu_icon_class = 'font-icon-book-open';

    // This will auto publish the image
    private static $owns = [
        'PrimaryPhoto',

        'pdfupload'
    ];

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;


    protected function onBeforeWrite()
    {
        // if (!$this->Sort) {
        //     $this->Sort = Resource::get()->max('Sort') + 1;
        // }

        parent::onBeforeWrite();
    }
    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->PrimaryPhoto()->exists() && !$this->PrimaryPhoto()->isPublished()) {

            $this->PrimaryPhoto()->doPublish();
        }
        if ($this->Videothumb()->exists() && !$this->Videothumb()->isPublished()) {

            $this->Videothumb()->doPublish();
        }


        // if ($this->pdfupload()->exists() && !$this->extractedtext) { 

        // $this->testupload()->doPublish(); 
        // if ($this->pdfupload()->exists() && !$this->extractedtext) {

        //     $myFile =   $this->pdfupload();
        //     $extractor = PDFParserTextExtractor::for_file($myFile);
        //     $this->extractedtext = $extractor->getContent($myFile);
        //     $this->write();
        //     $this->pdfupload()->doPublish();
        // }
    }


    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),

        ]);
        $fields->addFieldToTab('Root.Main',   new HTMLEditorField('Blurb'));

        $fields->addFieldToTab('Root.Main',   new HTMLEditorField('Description'));
        $fields->addFieldsToTab('Root.Selection', [



            CheckboxSetField::create('ResourceType', 'Types', ResourceType::get()->sort('Title', 'ASC')),



        ]);
        $fields->addFieldsToTab('Root.Selection', [



            CheckboxSetField::create('ResourceTopic', 'Topics', ResourceTopic::get()->sort('Title', 'ASC')),



        ]);


        // $authorField = ListboxField::create(
        //     'Authors',
        //     _t(__CLASS__ . '.Authors', 'Authors'),
        //     $this->getCandidateAuthors()->map()->toArray()
        // );


        //     $authorNames = TextField::create(
        //     'AuthorNames',
        //     _t(__CLASS__ . '.AdditionalCredits', 'Additional Credits'),
        //     null,
        //     1024
        // )->setDescription(
        //     _t(
        //         __CLASS__ . '.AdditionalCredits_Description',
        //         'If some authors of this post don\'t have CMS access, enter their name(s) here. '.
        //         'You can separate multiple names with a comma.'
        //     )
        // );

        // $fields->addFieldsToTab(
        //     'Root.PostOptions',
        //     [

        //         $authorField,
        //         $authorNames
        //     ]
        // );



        $fields->addFieldToTab('Root.PDF/Video', $uploadpdf = UploadField::create(
            'pdfupload',
            'PDF'
        ));
        $fields->addFieldToTab('Root.PDF/Video', $upload = UploadField::create(
            'PrimaryPhoto',
            'Thumbnail'
        )->setDescription('This thumbnail will be displayed on the Knowledge Base page'));



        $fields->addFieldsToTab('Root.PDF/Video', [
            TextField::create('vimeoID'),

        ]);
        $fields->addFieldToTab('Root.PDF/Video', $Videothumb = UploadField::create(
            'Videothumb',
            'Video Thumbnail'
        )->setDescription('This thumbnail will appear on the video page'));
        $fields->addFieldToTab("Root.PDF/Video", new CheckboxField("Gated", "Gated? "),);

        $fields->addFieldsToTab('Root.PDF/Video', [
            TextareaField::create('extractedtext')
                ->addExtraClass('invisible'),

        ]);

        // $fields->addFieldToTab(
        //     'Root.Selection',
        //     CheckboxSetField::create('IndustryHolder', 'Industry', IndustryHolder::get()->sort('Title','ASC'))
        // );

        // $fields->addFieldToTab(
        //     'Root.Selection',
        //     CheckboxSetField::create('IndustryPage', 'Application', IndustryPage::get()->sort('Title','ASC'))
        // );



        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('Knowledge Centre Thumbnails');
        $uploadpdf->setFolderName('Knowledge Centre');

        $Videothumb->setFolderName('Knowledge Centre Thumbnails');
        return $fields;
    }



    public function getCMSValidator()
    {
        return new RequiredFields([
            'ResourceType'
        ]);
    }
}
