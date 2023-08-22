<?php

namespace Galactic;

use SilverStripe\ORM\DataObject;

class Rating extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Rating' => 'Int'
    ];

    private static $belongs_many_many = [
        'Testimonial' => Testimonial::class
    ];

    private static $table_name = 'OGRating';
}
