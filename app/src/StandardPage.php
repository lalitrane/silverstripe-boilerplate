<?php
namespace Galactic;
use Page;
use DNADesign\Elemental\Extensions\ElementalPageExtension;

class StandardPage extends Page
{
    private static $description = 'Generic Content page with Elemental support';

    private static array $extensions = [
        ElementalPageExtension::class,
    ];
}