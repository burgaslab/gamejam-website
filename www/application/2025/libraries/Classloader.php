<?php

class Classloader {

	private $CI;
	private $dirs;

	public function __construct($params = array()) {
		$this->CI =& get_instance();

		$this->CI->config->load("classloader");

		$this->dirs = conf("classloader_dirs");
	}

	public function load($dir, $class="") {
		assert(isset($this->dirs[$dir]));
		$path = $this->CI->path->abs_app . $this->dirs[$dir] . "/";
		if ($class) {
			$file = $path . $class . ".php";
			require_once($file);
		}  else {
			$files = glob($path . "*.php");
			foreach($files as $file) {
				require_once($file);
			}
		}
	}
}