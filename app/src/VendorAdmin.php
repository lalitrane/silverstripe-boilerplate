<?php

namespace Galactic;

use SilverStripe\Admin\ModelAdmin;

class VendorAdmin extends ModelAdmin
{



    private static $managed_models = [
        Vendor::class,
    ];
    private static $menu_icon_class = 'font-icon-happy';


    private static $summary_fields = [
        'Title' => 'Varchar',
        'VendorURL' => 'HTMLText',
        'VendorLogo' => Image::class,


    ];

    private static $menu_title = 'Vendors';

    private static $url_segment = 'vendor';
}
