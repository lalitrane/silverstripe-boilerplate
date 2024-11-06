<?php
namespace Galactic;

use Page;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Galactic\Banner;
class HomePage extends Page
{
    private static $description = 'Homepage layout';
    private static $icon_class = 'font-icon-home';
    private static $table_name = 'OGHomepage';

    private static $has_many = [
        'Banners' => Banner::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $bannerConfig = GridFieldConfig_RecordEditor::create();
        $bannerGrid = GridField::create('Banners', 'Homepage Banners', $this->Banners(), $bannerConfig);

        $fields->addFieldToTab('Root.Banners', $bannerGrid);
        $fields->removeByName(array(
            'HeroImage'
        ));
        return $fields;
    }
}
