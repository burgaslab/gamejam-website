<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Path {
	public function __construct() {
		$CI =& get_instance();

		$script = $CI->input->server("SCRIPT_NAME");
		$this->base = rtrim(str_replace(basename($script), '', $script), "/") . '/';
		$this->abs_base = FCPATH;
		$this->abs_app = realpath(APPPATH) . DIRECTORY_SEPARATOR;
		$http_host = $CI->input->server("HTTP_HOST");
		$https = $CI->input->server("HTTPS");
		$request_uri = $CI->input->server("REQUEST_URI");
		$console = defined('STDIN');

		$this->protocol = $http_host ? ($https == "on" ? "https://" : "http://") : ($console ? "stdin://" : "");
		$this->http_root = $http_host ? ($this->protocol . $http_host) : "";
		$this->http_base = $http_host ? $this->http_root . $this->base : "";
		$this->current = '/' . ($request_uri ? substr($request_uri, strlen($this->base)) : "");
		$this->current_abs = $request_uri ? ($this->http_root . $request_uri) : "";
	}

	public function replace_slashes($input, $slash) {
		return preg_replace('#(\\\|\/)#', $slash, $input);
	}
	public function set_directory_separator($input) {
		return $this->replace_slashes($input, DIRECTORY_SEPARATOR);
	}

}
