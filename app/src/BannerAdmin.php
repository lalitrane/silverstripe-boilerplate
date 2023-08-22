<?php

namespace Galactic;

use SilverStripe\Admin\ModelAdmin;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class BannerAdmin extends ModelAdmin
{

    private static $managed_models = [
        Banner::class,
    ];
    private static $menu_icon_class = 'font-icon-picture';


    private static $summary_fields = [
        'Title' => 'Varchar',
        'Description' => 'Text',
        'PrimaryPhoto' => Image::class,
        'MobilePhoto' => Image::class,

    ];

    private static $menu_title = 'Homepage Banners';

    private static $url_segment = 'banner';

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
