<?php

namespace Galactic;
use SilverStripe\Admin\ModelAdmin;

class CtaAdmin extends ModelAdmin
{



    private static $managed_models = [
        Cta::class,
    ];
    private static $menu_icon_class = 'font-icon-link';


    private static $summary_fields = [
        'Title' => 'Varchar',
  

    ];

    private static $menu_title = 'CTA';

    private static $url_segment = 'cta';
}
