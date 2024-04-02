<?php

namespace Origami;

use Page;


class ResourceSearchPage extends page
{

    private static $has_many = [
        'Resource' => Resource::class,
    ];
    private static $table_name = 'OGResourcesearch';

    //Hide from "addpage"
    private static $hide_ancestor = ResourceSearchPage::class;
}
