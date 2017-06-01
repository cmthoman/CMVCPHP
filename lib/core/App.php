<?php
namespace core;
class App
{
	public $eh;

	public function __construct()
	{
		#######################################################
		#Load additional classes to be used here...
		#######################################################
		require_once '../lib/debug/ErrorHandler.php';
		$this->eh = new ErrorHandler;

		$this->eh->componentTrace('App', true);
		require_once '../lib/router/Router.php';
		new Router;
	}
}