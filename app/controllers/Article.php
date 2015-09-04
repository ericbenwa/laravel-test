<?php

namespace Blog\Controller;

use View;
use BaseController;

class Article extends BaseController {
	public function getCreate()
	{
		return View::make('create');
	}

	public function postCreate()
	{
		
	}
}