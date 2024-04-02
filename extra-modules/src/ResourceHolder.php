<?php

namespace Origami;

use Page;

class ResourceHolder extends Page
{
	private static $allowed_children = [
		Resource::class
	];


	private static $icon_class = 'font-icon-book-open';

	//Hide from "addpage"
	private static $hide_ancestor = ResourceHolder::class;
}
