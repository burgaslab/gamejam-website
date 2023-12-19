<?php

class Less extends CI_Controller {
	const CACHE_INTERVAL = 240; // in hours

	private $lessc;
	
	public function __construct() {
		parent::__construct();
		
		require_once($this->path->abs_app."/third_party/lessc.php");
		
		$this->lessc = new lessc();
	}
	public function index() {

		$file = $this->uri->uri_string();

		if ($file && is_file($file)) {
			$path_cache = $this->path->abs_cache;
			$res = '';
			if (isset($path_cache)) {
				$cache_file = sprintf("%s/less.%s.cache", $path_cache, md5($file));
				if (is_file($cache_file) && filemtime($cache_file) >= filemtime($file)) {
					$res = file_get_contents($cache_file);
				} else {
					$res = $this->compile($file, $cache_file);
				}
			} else {
				$res = $this->compile($file);
			}

			$seconds = self::CACHE_INTERVAL * 3600;
			$max_age = gmdate("D, d M Y H:i:s", time() + $seconds) . " GMT";

			$this->output
			->set_content_type("text/css")
			->set_header("Expires: $max_age")
			->set_header("Pragma: cache")
			->set_header("Cache-Control: max-age=" . self::CACHE_INTERVAL)
			->set_output($res);
		}

	}

	private function compile($file, $cache_file=null) {
		try {
			$res = $this->lessc->compileFile($file);
			if ($cache_file) {
				file_put_contents($cache_file, $res);
			}
			return $res;
		} catch (exception $e) {
			return "Lessc error: " . $e->getMessage();
		}
	}
}
