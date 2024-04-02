<?php

namespace Origami;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
 use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
class ResourceTopic extends DataObject{

private static $db =[

    'Title' =>'Varchar',
    'Sort' => 'Int',

];


private static $belongs_many_many = [
    'Resource' => Resource::class
];
// private static $has_many = [
//     'Projects' => Project::class
// ];
private static $default_sort = 'Sort';

// private static $has_one = [
//     'Resource' => Resource::class
// ];

    private static $singular_name = 'Resource Topic';
    private static $plural_name = 'Resource Topics';

private static $table_name = 'OGResourceTopic';

private static $versioned_gridfield_extensions = true;

protected function onBeforeWrite()
{
    if (!$this->Sort) {
        $this->Sort = Resource::get()->max('Sort') + 1;
    }

    parent::onBeforeWrite();
}


// public function getCMSfields()
// {
//     $fields = parent::getCMSFields();
//     // $fields->addFieldToTab('Root.Main',   new HTMLEditorField('ContentBlock', 'Content Block'));

//     // $fields->removeByName(array(
//     //     'Resource'
//     // ));
//     return $fields;
// }
}




