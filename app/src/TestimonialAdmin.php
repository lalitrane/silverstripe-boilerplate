<?php

namespace Galactic;

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\CheckboxSetField;


class TestimonialAdmin extends ModelAdmin
{


    private static $managed_models = [
        Testimonial::class,
        Rating::class
    ];
    private static $menu_icon_class = 'font-icon-block-file-list';
    private static $menu_title = 'Testimonials';

    private static $url_segment = 'testimonials-admin';


    private static $summary_fields = [
        'Title' => 'Varchar',
        'Url' => 'Varchar',
        'PartnerLogo' => Image::class,
        'Rating' => Rating::class
    ];
}
