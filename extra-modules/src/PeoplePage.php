<?php

namespace Origami;



use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use Page;

class PeoplePage extends Page
{
	private static $can_be_root = false;

	//Hide from "addpage"
	// private static $hide_ancestor = PeoplePage::class;

	// private static $db = [
	// 	'Position' => 'HTMLText',
	// 	'Phonenumber' => 'Text',
	// 	'Email' => 'Text',
	// 	'Blurb' => 'Text',

	// ];

	// private static $has_one = [
	// 	'Photo' => Image::class,
	// 	'Document' => File::class
	// ];
	// private static $defaults = [
	// 	'ShowInMenus' => false,
	// 	'ShowInSearch' => false,
	// ];
	// private static $owns = [
	// 	'Photo',
	// 	'Document',
	// ];
	// private static $icon_class = 'font-icon-torso';
	// private static $table_name = 'OGPeople';
	// public function getCMSFields()
	// {
	// 	$fields = parent::getCMSFields();
	// 	$fields->addFieldToTab('Root.Main', TextField::create('Position'), 'Content');
	// 	$fields->addFieldToTab(
	// 		'Root.Main',
	// 		TextField::create('Phonenumber', 'Phone number'),
	// 		'Content'
	// 	);
	// 	$fields->addFieldToTab('Root.Main', TextField::create('Email'), 'Content');
	// 	$fields->addFieldToTab(
	// 		'Root.Attachments',
	// 		$photo = UploadField::create('Photo')
	// 	);
	// 	$fields->addFieldsToTab('Root.Main', TextareaField::create('Blurb'), 'Content');

	// 	$fields->addFieldToTab(
	// 		'Root.Attachments',
	// 		$brochure = UploadField::create(
	// 			'Document',
	// 			'PDF Document, (optional)'
	// 		)
	// 	);

	// 	$photo->setFolderName('people-photos');
	// 	$brochure
	// 		->setFolderName('people-brochures')
	// 		->getValidator()->setAllowedExtensions(array('pdf'));

	// 	return $fields;
	// }
}