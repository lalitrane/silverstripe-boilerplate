<?php

namespace Origami;

use Page;

use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HeaderField;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class PortfolioHolderPage extends Page
{

	private static $allowed_children = [
		PortfolioPage::class
	];

	//Hide from "addpage"
	private static $hide_ancestor = PortfolioHolderPage::class;
}
