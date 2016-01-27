<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class MY_Exceptions extends CI_Exceptions {
	static $errors = array(
			400=>array("header"=>"Bad Request", "message"=>"The request cannot be fulfilled due to bad syntax."),
			404=>array("header"=>"Not Found", "message"=>"The resource you requested was not found."),
			500=>array("header"=>"Internal Server Error", "message"=>"An error occured. Tech support was notified."),
	);

	function __construct(){
		parent::__construct();
	}

	private function is_ajax() {
		return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest";
	}

	function show_404($page = "", $log_error = TRUE){
		$CI =& get_instance();
		if ($CI) {
			if ($CI->input->is_ajax_request()) {
				$this->ajax_error(404);
			} else {
				$this->html_error(404);
			}
		} else {
			parent::show_404();
		}
	}

	function show_error($heading, $message, $template = "error_general", $status_code = 500) {
		$this->clear_ob();

		$display_errors = ini_get("display_errors");
		if ($this->is_ajax()) {
			if ($display_errors) {
				return $this->ajax_error($status_code, $message);
			} else {
				return $this->ajax_error($status_code, "");
			}
		} else {
			if ($display_errors) {
				return parent::show_error($heading, $message, $template, $status_code);
			} else {
				return $this->html_error($status_code);
			}
		}
	}

	private function html_error($code) {
		$error = self::$errors[$code];
		$header = sprintf("HTTP/1.1 %s %s", $code, $error["header"]);
		$message = $error["message"];
		if (class_exists("CI_Controller")) {
			// CI is loaded
			$CI =& get_instance();

			$data["message"] = $message;

			$data["app_name"] = conf("title");

			$CI->output->set_header($header);
			$CI->load->view("service/error", $data);
			$CI->output->_display();
		} else {
			// show simple error otherwise
			return parent::show_error($error["header"], $message);
		}
	}

	private function ajax_error($code, $message="") {
		$error = self::$errors[$code];
		$header = sprintf("HTTP/1.1 %s %s", $code, $error["header"]);
		if (!$message) {
			$message = $error["message"];
		}

		$response = array(
				"error" => true,
				"message" => $message
		);
		$CI =& get_instance();

		$CI->output
		->set_header($header)
		->set_content_type("application/json")
		->set_output(json_encode($response))
		->_display();
	}

	private function clear_ob() {
		while (ob_get_level() > 1) {
			ob_end_clean();
		}
	}
}
