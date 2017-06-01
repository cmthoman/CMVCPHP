<?php
namespace core;
class ErrorHandler
{
	public function componentTrace($component, $success){
		if(config::$debug)
		{
			if($success)
			{
				echo "<=================================================><br/>";
				echo "Compenent \"$component\" loaded!<br/>";
				echo "<=================================================><br/>";
			}else{
				echo "<=================================================><br/>";
				echo "Compenent \"$component\" failed to load!<br/>";
				echo "<=================================================><br/>";
			}
		}
	}
}