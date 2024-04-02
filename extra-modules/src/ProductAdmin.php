<?php

namespace Origami;

use SilverStripe\Admin\ModelAdmin;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ProductAdmin extends ModelAdmin
{

    private static $managed_models = [
        Product::class,
        Type::class

    ];

    // private static $menu_icon = 'app/images/product-icon.png';

 private static $menu_icon_class = 'font-icon-monitor';

    private static $menu_title = 'Products';

    private static $url_segment = 'product';
    private static $summary_fields = [
        'Title' => 'Varchar',
        'Blurb' => 'Text',
        'ProductDescription' => 'HTMLText',
        'ProductImage' => Image::class,
        'Type' => Type::class
    ];

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
