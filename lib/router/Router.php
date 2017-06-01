<?php
namespace core;
class Router
{
	
	function __construct()
	{
		#######################################################
		#Load additional classes to be used here...
		#######################################################
		require_once '../lib/debug/ErrorHandler.php';
		$this->eh = new ErrorHandler;

		#######################################################
		#Include any Router libraries here
		#######################################################
		$this->eh->componentTrace('Router', true);
		require_once '../lib/router/Dispatcher.php';
		new Dispatcher;
	}
}