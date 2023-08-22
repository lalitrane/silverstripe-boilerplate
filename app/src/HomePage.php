<?php
namespace Galactic;
use Page;

use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class HomePage extends Page
    {
     
        private static $description = 'Homepage layout';
        private static $icon_class = 'font-icon-home';
        private static $table_name = 'OGHomepage';
  

      

    }
