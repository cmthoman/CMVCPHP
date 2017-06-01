<?php
namespace core;
class Dispatcher
{

	protected $controller;
	protected $method = 'index';
	protected $params= [];

	public function __construct()
	{
		/*Require any additional classes here...*/
		require_once '../lib/debug/ErrorHandler.php';
		$this->eh = new ErrorHandler;
		$this->eh->componentTrace('Dispatcher', true);

		/*Set the url variable to the returned reult of parseURL()
		We pass in the URL paramater of index.php?url= which is 
		obtained through .htaccess mod_rewrite*/
		$url = $this->parseURL($_GET['url']);
		
		/*Assume that the first element of the returned $url array denotes
		the controller requested. Check if the controller file exists in
		the app/controller folder. If it does, load it via require_once 
		and unset $url[0]. If it doesn't, send an error to the error handler.*/
		if(file_exists("../app/controller/$url[0].php"))
		{
			include_once "../app/controller/$url[0].php";
			$this->controller = new $url[0];
			unset($url[0]);
		}else{
			$this->eh->componentTrace("Controller: $url[0]", false);
		} 

		/*Assume the second element of the returned $url array denotes the
		method belonging to the first $url array element's controller. If
		it does, call the method. If it doesn't, send an error to the error
		handler*/

		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				$this->eh->componentTrace("Method: $url[1]", true);
				unset($url[1]);

				/*After unsetting the above $url elements for Controller and Method, store
				the remaining elements in $this->params array*/
				$this->params = $url ? array_values($url) : [];

				call_user_func_array([$this->controller, $this->method], $this->params);
			}else{
				$this->eh->componentTrace("Method: $url[1]", false);
			}
		}
	}

	protected function parseURL($url)
	{
		$url = parse_url(filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
		return(explode("/",$url['path']));
	}
}