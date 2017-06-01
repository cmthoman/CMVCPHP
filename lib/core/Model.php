<?php
namespace core;
require_once '../app/model/AppModel.php';
class Model
{
	protected static $eh;

	public function __construct()
	{
		/*Require any additional classes here...*/
		require_once '../lib/debug/ErrorHandler.php';
		self::$eh = new ErrorHandler;
		self::$eh->componentTrace('Model', true);
	}
}