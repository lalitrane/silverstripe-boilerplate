<?php

namespace Galactic;

use SilverStripe\ORM\DataExtension;

class UploadFileExtension extends DataExtension
{
    private static $db = [
        'Description' => 'Text',
    ];
}
