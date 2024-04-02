<?php

namespace Origami;

use SilverStripe\Admin\ModelAdmin;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;


class ResourceAdmin extends ModelAdmin
{



    private static $managed_models = [
        Resource::class,
        ResourceType::class,
        ResourceTopic::class
    ];
    private static $menu_icon_class = 'font-icon-book-open';


    private static $summary_fields = [
        'Title' => 'Varchar',
        'Description' => 'Text',
        'PrimaryPhoto' => Image::class

    ];

    private static $menu_title = 'Knowledge Centre';

    private static $url_segment = 'knowledgebase-resource';


    public function getEditForm($id = null, $fields = null)

    {

        $form = parent::getEditForm($id, $fields);

        if (class_exists(GridFieldOrderableRows::class) && $this->getGridFieldName()) {

            $gridField = $form->Fields()->fieldByName($this->getGridFieldName());

            $gridField->getConfig()->addComponent(new GridFieldOrderableRows());
        }

        return $form;
    }



    protected function getGridFieldName(): string

    {

        return $this->sanitiseClassName($this->modelClass);
    }
}
