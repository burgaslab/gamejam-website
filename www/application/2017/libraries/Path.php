<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");


class Path {
	/*
	 * Example values:
	   "base" => "/www/",
	   "abs_base" => "/usr/local/www/",
	   "abs_app" => "/usr/local/www/application/",
	   "abs_cache" => "/usr/local/www/application/cache/",
	   "protocol" => "http://",
	   "http_root" => "http://domain.com",
	   "http_base" => "http://domain.com/www/",
	   "current" => "/bg/url",
	   "current_abs" => "http://domain.com/www/bg/url",
	 */

	public function __construct() {
		$script = _server("SCRIPT_NAME");
		$this->base = rtrim(str_replace(basename($script), "", $script), "/") . "/";
		$this->abs_base = FCPATH;
		$this->abs_app = realpath(APPPATH) . DIRECTORY_SEPARATOR;
		$this->abs_cache = $this->set_directory_separator(conf("cache_dir"));
		$http_host = _server("HTTP_HOST");
		$https = _server("HTTPS");
		$request_uri = self::canonize_uri(_server("REQUEST_URI"));

		$console = defined("STDIN");

		$this->protocol = $http_host ? ($https == "on" ? "https://" : "http://") : ($console ? "stdin://" : "");
		$this->http_root = $http_host ? ($this->protocol . $http_host) : "";
		$this->http_base = $http_host ? $this->http_root . $this->base : "";
		$this->current = "/" . ($request_uri ? substr($request_uri, strlen($this->base)) : "");
		$this->current_abs = $request_uri ? ($this->http_root . $request_uri) : "";

		if (!is_dir($this->abs_cache)) {
			mkdir_rec($this->abs_cache);
			if (!is_really_writable($this->abs_cache)) {
				trigger_error("Directory {$this->abs_cache} is not writeable!", E_USER_ERROR);
			}
		}
	}

	public function replace_slashes($input, $slash) {
		return preg_replace("#(\\\|\/)#", $slash, $input);
	}
	public function set_directory_separator($input) {
		return $this->replace_slashes($input, DIRECTORY_SEPARATOR);
	}

	private static function canonize_uri($url) {
		$res = preg_replace("/\/{2,}/", "/", $url);
		$res = preg_replace("/(\/$)|(\/)\?/", "?", $res);
		return rtrim($res, "?");
	}
}
