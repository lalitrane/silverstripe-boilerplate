<?php

namespace Origami;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
 use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
class Type extends DataObject{

private static $db =[

    'Title' =>'Varchar',
    'Sort' => 'Int',
  'ContentBlock'=>'HTMLText',
];


// private static $has_many = [
//     'Projects' => Project::class
// ];
private static $default_sort = 'Sort';
private static $belongs_many_many = [
    'Products' => Product::class
];


    private static $singular_name = 'Type';
    private static $plural_name = 'Types';

private static $table_name = 'OGType';

public function getCMSfields()
{
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main',   new HTMLEditorField('ContentBlock', 'Content Block'));
    return $fields;
}
}




