<?php

namespace Origami;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
 use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
class ResourceType extends DataObject{

private static $db =[

    'Title' =>'Varchar',
    'Sort' => 'Int',
  'ContentBlock'=>'HTMLText',

];


private static $belongs_many_many = [
    'Resource' => Resource::class
];
private static $default_sort = 'Sort';

// private static $has_one = [
//     'Resource' => Resource::class
// ];


    private static $singular_name = 'Resource Type';
    private static $plural_name = 'Resource Types';

private static $table_name = 'OGResourceType';

private static $versioned_gridfield_extensions = true;

protected function onBeforeWrite()
{
    if (!$this->Sort) {
        $this->Sort = Resource::get()->max('Sort') + 1;
    }

    parent::onBeforeWrite();
}


public function getCMSfields()
{
    $fields = parent::getCMSFields();
    // $fields->addFieldToTab('Root.Main',   new HTMLEditorField('ContentBlock', 'Content Block'));

    // $fields->removeByName(array(
    //     'Sort'
    // ));

$fields->removeFieldFromTab("Root.Main","Resource");


    return $fields;
}
}




