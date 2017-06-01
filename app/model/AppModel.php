<?php
class AppModel extends core\Model
{
	public function __construct()
	{
		parent::__construct();
		parent::$eh->componentTrace('AppModel', true);
	}	
}