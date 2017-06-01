<?php
namespace core;
require_once '../app/controller/AppController.php';
class Controller
{
	protected static $eh;

	public function __construct()
	{
		/*Require any additional classes here...*/
		require_once '../lib/debug/ErrorHandler.php';
		self::$eh = new ErrorHandler;
		self::$eh->componentTrace('Controller', true);
	}

	/*Allow controllers to load requested models by calling the 
	$this->model($model) method.*/
	protected function model($model)
	{
		if(file_exists("../app/model/$model.php"))
		{
			require_once "../app/model/$model.php";
			return new $model();
		}else{
			self::$eh->componentTrace("Model: $model", false);
		}
	}

	/*Allow controllers to load requested views and pass data
	using the $data array*/
	protected function view($view, $data = [])
	{
		if(file_exists("../app/view/$view.php"))
		{
			require_once "../app/view/$view.php";
		}else{
			self::$eh->componentTrace("View: $view", false);
		}
	}
}