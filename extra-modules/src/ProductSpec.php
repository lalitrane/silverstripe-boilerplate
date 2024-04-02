<?php

namespace Origami;

use Page;

use SilverStripe\Forms\FieldList;
// use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\TabSet;

use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
// use SilverStripe\Forms\GridField\GridFieldConfig;
// use SilverStripe\Forms\GridField\GridFieldDataColumns;
// use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
// use SilverStripe\Forms\GridField\GridFieldAddNewButton;
// use SilverStripe\Forms\GridField\GridFieldSortableHeader;
// use SilverStripe\Forms\GridField\GridFieldPaginator;
// use SilverStripe\Forms\GridField\GridFieldEditButton;
// use SilverStripe\Forms\GridField\GridFieldDeleteAction;
// use SilverStripe\Forms\GridField\GridFieldDetailForm;
// use SilverStripe\Forms\OptionsetField;
// use SilverStripe\Forms\CheckboxSetField;
// use SilverStripe\Assets\File;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Versioned\Versioned;

class ProductSpec extends Page
{
    //Hide from "addpage"
    private static $hide_ancestor = ProductSpec::class;

    private static $db = [
        'Title' => 'Varchar',
        'Application' => 'Text',
        'Grade' => 'Text',
        'Colour' => 'Text',
        'Width' => 'Text',
        'Length' => 'Text',
        'Thickness' => 'Text',
        'Sorts' => 'Int',




    ];


    private static $hide_from_cms_tree = 'ProductSpec';



    private static $singular_name = "Product Specification";
    private static $plural_name = "Product Specifications";

    private static $default_sort = 'Sorts';
    private static $defaults = [
        'ShowInMenus' => false,
        'ShowInSearch' => false,
        'HideFromSiteTree' => true
    ];
    private static $has_one = [

        'ProductPage' => ProductPage::class

        //'Tier' => Tier::class
    ];



    private static $extensions = [
        Versioned::class,
    ];

    private static $versioned_gridfield_extensions = true;

    protected function onBeforeWrite()
    {
        if (!$this->Sorts) {
            $this->Sorts = ProductSpec::get()->max('Sorts') + 1;
        }

        parent::onBeforeWrite();
    }


    private static $summary_fields = [
        'Title' => 'Code',

        'Application' => 'Application',

        'Sorts' => 'Order'
    ];
    private static $table_name = 'OGProductSpec';


    public function getCMSFields()
    {
        //CheckboxSetField::create('typeforms', 'Type of Forms', array('online' => 'Online', 'downloadable' => 'Downloadable','other' => 'Other')),
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title', 'Code'),
            TextField::create('Application', 'Application'),
            TextField::create('Grade', 'Grade'),
            TextField::create('Colour', 'Colour'),
            TextField::create('Width', 'Width mm'),
            TextField::create('Length', 'Length m'),
            TextField::create('Thickness', 'Thickness um'),
            TextField::create('Sorts', 'Order'),


        ]);


        $fields->removeByName(array(
            'Sorts'
        ));
        return $fields;
        // return new FieldList(
        //     new TextField('Title','Code'),
        //     new TextField('Application','Application'),
        //     new TextField('Grade','Grade'),
        //     new TextField('Colour','Colour'),
        //     new TextField('Width','Width mm'),
        //     new TextField('Length','Length m'),
        //     new TextField('Thickness','Thickness um'),
        //       new TextField('Sorts', 'Order'),




        //   );




    }
}
