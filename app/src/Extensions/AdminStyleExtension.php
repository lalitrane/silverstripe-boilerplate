<?php

namespace App\Extensions;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\View\Requirements;
use SilverStripe\Core\Extension;

class AdminStyleExtension extends Extension
{
    public function onAfterInit()
    {
        // Load the custom CSS file from the public folder
        Requirements::css('/admin.css');
    }
}
