<?php

namespace Origami;

use Page;

class PeopleHolder extends Page
{
	private static $allowed_children = [
		PeoplePage::class
	];

	private static $icon_class = 'font-icon-torsos-all';

	//Hide from "addpage"
	// private static $hide_ancestor = PeopleHolder::class;
}