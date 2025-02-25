<?php

class Loader_Autoloader
{
	protected $paths;
	
	function __construct()
	{
		$this->paths = preg_split('/' . PATH_SEPARATOR . '/', get_include_path());
		ob_start();
	}
	
	public function autoload($class)
	{
		$filename = str_replace(array('_','\\'), DIRECTORY_SEPARATOR, $class) . '.php';
		
		foreach($this->paths as $path)
		{
			if(file_exists($path . DIRECTORY_SEPARATOR . $filename))
			{
                include $path . DIRECTORY_SEPARATOR . $filename;
				return;
			}
		}
// 		throw new Exception('Class `' . $class . '` not found!!!');
	}
}