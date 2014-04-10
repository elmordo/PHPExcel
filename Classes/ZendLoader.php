<?php
if (!defined("PHPEXCEL_ROOT"))
	define("PHPEXCEL_ROOT", __DIR__);

class PHPExcel_ZendLoader implements Zend_Loader_Autoloader_Interface {

	public function autoload($className) {
		// check if we are able to load class
		if (strpos($className, "PHPExcel") === false) return false;

		// require file and return class
		$subPath = str_replace("_", "/", $className) . ".php";
		$path = __DIR__ . "/" . $subPath;

		Zend_Loader::loadFile($path);

		return true;
	}
}