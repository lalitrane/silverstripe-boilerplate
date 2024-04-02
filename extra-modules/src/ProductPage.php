<?php

namespace Origami;



use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
// use SilverStripe\Forms\GridField\GridFieldConfig;
// use SilverStripe\Forms\GridField\GridFieldDataColumns;
// use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
// use SilverStripe\Forms\GridField\GridFieldAddNewButton;
// use SilverStripe\Forms\GridField\GridFieldSortableHeader;
// use SilverStripe\Forms\GridField\GridFieldPaginator;
// use SilverStripe\Forms\GridField\GridFieldEditButton;
// use SilverStripe\Forms\GridField\GridFieldDeleteAction;
// use SilverStripe\Forms\GridField\GridFieldDetailForm;

use Page;

class ProductPage extends Page
{
	//Hide from "addpage"
	private static $hide_ancestor = ProductPage::class;

	private static $db = [
		// 'Position' => 'HTMLText',
		'ProductName' => 'Text',
		'ProductOverview' => 'Text',


	];
	private static $icon_class = 'font-icon-menu-modaladmin';


	private static $has_one = [
		'ProductImage' => Image::class,
		'ProductLogo' => Image::class

	];

	private static $owns = [
		'ProductLogo',
		'ProductImage',
	];
	private static $has_many = [
		'ProductFeature' => ProductFeature::class,
		'ProductSpec' => ProductSpec::class,


	];
	//   private static $defaults = [
	//     'ShowInMenus' => false,
	//     'ShowInSearch' => false,
	// ];
	private static $table_name = 'OGProductv1';
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', TextField::create('ProductName'), 'Content');
		$fields->addFieldToTab(
			'Root.Main',
			TextField::create('ProductOverview', '(Homepage) High-level service overview'),
			'Content'
		);

		$fields->addFieldToTab(
			'Root.Attachments',
			$photo = UploadField::create('ProductLogo')
		);
		$fields->addFieldToTab(
			'Root.Attachments',
			$photo = UploadField::create('ProductImage')
		);



		$photo->setFolderName('product-photos');


		$config = GridFieldConfig_RecordEditor::create();
		$config->addComponent(new GridFieldOrderableRows('Sorts'));

		$fields->addFieldToTab('Root.Features', GridField::create(
			'ProductFeature',
			'Features',
			$this->ProductFeature(),
			$config,
			GridFieldConfig_RecordEditor::create()

		));


		$fields->addFieldToTab('Root.Specs', GridField::create(
			'ProductSpec',
			'Specifications',
			$this->ProductSpec(),
			$config,
			GridFieldConfig_RecordEditor::create()
		));



		return $fields;
	}
}
