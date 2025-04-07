<?php

namespace Galactic;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\Tab;
use SilverStripe\Versioned\Versioned;
use SilverStripe\ORM\ValidationResult;

class Cta extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'CtaURL' => 'Varchar(512)',
        'isExternal' => 'Int'
    ];

    private static $has_one = [
        'InternalPage' => SiteTree::class,
    ];

    private static $singular_name = "CTA";
    private static $plural_name = "CTAs";

    private static $icon_class = 'font-icon-link';
    private static $table_name = 'OGCTAs';

    private static $extensions = [
        Versioned::class,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'isExternal.Nice' => 'External?',
        'CtaURL' => 'External URL',
        'InternalPage.Title' => 'Internal Page'
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TabSet::create(
                'Root',
                Tab::create(
                    'Main',
                    TextField::create('Title', 'Button Text')
                        ->setMaxLength(150) // UI limit
                        ->setDescription('Max 150 characters')
                        ->setAttribute('required', true),
                    
                    DropdownField::create('isExternal', 'Link Type', [
                        '' => '-- Select Link Type --', // Forces user to select
                        0 => 'Internal Page',
                        1 => 'External URL'
                    ])
                    ->setDescription('Required field'),

                    TreeDropdownField::create('InternalPageID', 'Select an Internal Page', SiteTree::class)
                        ->setEmptyString('-- Select Page --'),

                    TextField::create('CtaURL', 'External URL')
                        ->setDescription('Enter a full URL including http:// or https://')
                        ->setMaxLength(512)
                )
            )
        );

        return $fields;
    }

    public function validate()
    {
        $result = parent::validate();
    
        // Convert isExternal to integer for accurate validation
  
    
        // Ensure Link Type is selected
        if ($this->isExternal === '' || $this->isExternal === null) {
            $result->addError('Please select a Link Type (Internal Page or External URL).');
        }
    
        // Ensure Title does not exceed 150 characters
        if (strlen($this->Title) > 150) {
            $result->addError('Title must not exceed 150 characters.');
        }
    
        return $result;
    }
    
}