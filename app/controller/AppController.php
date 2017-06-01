<?php
class AppController extends core\Controller
{

	public function __construct()
	{
		parent::__construct();
		/*Require any additional classes here...*/
		parent::$eh->componentTrace('AppController', true);
	}

}