<?php

namespace Origami;

use Page;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Versioned\Versioned;

class ProductFeature extends Page
{
    private static $db = [
        'Title' => 'Varchar',

        'Description' => 'Text',
        'Sorts' => 'Int',




    ];

    //Hide from "addpage"
    private static $hide_ancestor = ProductFeature::class;

    private static $hide_from_cms_tree = 'ProductFeature';



    private static $singular_name = "Product Feature";
    private static $plural_name = "Product Features";

    private static $default_sort = 'Sorts';
    private static $defaults = [
        'ShowInMenus' => false,
        'ShowInSearch' => false,
        'HideFromSiteTree' => true
    ];
    private static $has_one = [

        'ProductPage' => ProductPage::class,
        'FeatureImage' => Image::class
        //'Tier' => Tier::class
    ];

    private static $owns = [
        'FeatureImage'
    ];

    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;

    protected function onBeforeWrite()
    {
        if (!$this->Sorts) {
            $this->Sorts = ProductFeature::get()->max('Sorts') + 1;
        }

        parent::onBeforeWrite();
    }
    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->FeatureImage()->exists() && !$this->FeatureImage()->isPublished()) {
            $this->FeatureImage()->doPublish();
        }
    }

    private static $summary_fields = [
        'Title' => 'Feature',

        'Description' => 'Description',
        'FeatureImage' => 'Feature Image',
        'Sorts' => 'Order'
    ];
    private static $table_name = 'OGProductfeature';


    public function getCMSFields()
    {
        //CheckboxSetField::create('typeforms', 'Type of Forms', array('online' => 'Online', 'downloadable' => 'Downloadable','other' => 'Other')),


        return new FieldList(
            new TextField('Title', 'Feature'),
            new TextareaField('Description'),
            new UploadField('FeatureImage'),
            new TextField('Sorts', 'Order'),




        );
    }
}
