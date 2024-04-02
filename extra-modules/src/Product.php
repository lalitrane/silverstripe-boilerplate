<?php

namespace Origami;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TreeMultiselectField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\CheckboxSetField;

class Product extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Blurb' => 'Text',
        'ProductDescription' => 'HTMLText',
        'Sort' => 'Int',

    ];

    private static $has_one = [

        'ProductImage' => Image::class
 
    ];


    private static $many_many = [
        'Type' => Type::class
    ];

    private static $icon_class = 'font-icon-picture';
    private static $table_name = 'OGProducts';
    private static $default_sort = 'Sort';

    // This will auto publish the image
    private static $owns = [
        'ProductImage'
    ];

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;
    protected function onBeforeWrite()
    {
        if (!$this->Sort) {
            $this->Sort = Product::get()->max('Sort') + 1;
        }

        parent::onBeforeWrite();
    }


    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->ProductImage()->exists() && !$this->ProductImage()->isPublished()) {
            $this->ProductImage()->doPublish();
        }
    }


    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            TextareaField::create('Blurb'), 

            
            CheckboxSetField::create('Type', 'Types', Type::get()),
            new HTMLEditorField('ProductDescription', 'Product Description')


        ]);
        $fields->removeByName(array(
            'Sort'
        ));
        $fields->addFieldToTab('Root.Main', $upload = UploadField::create(
            'ProductImage',
            'Product Image'
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg', 'gif'
        ));
        $upload->setFolderName('Product Photos');

        return $fields;
    }
}
