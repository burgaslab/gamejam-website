<?php

class MyHooks {

	public function error_handlers() {
		set_exception_handler(array($this, "handle_exceptions"));
		set_error_handler(array($this, "handle_errors"));
		ob_start(array($this, "handle_fatal"));
	}

	public function handle_exceptions($exception) {
		$message = "" . $exception;
		log_message("error", $message);
		show_error($message);
	}
	public function handle_errors($severity, $message, $filepath, $line) {
		if (error_reporting() == 0) {
			// error is suppressed
			return true;
		}
		$ex =& load_class("Exceptions", "core");
		$severity = isset($ex->levels[$severity]) ? $ex->levels[$severity] : $severity;
		$message = sprintf("Severity: %s\nMessage: %s\nFilename: %s\nLine Number: %s", $severity, $message, $filepath, $line);

		log_message("error", $message);
		show_error($message);
	}

	function handle_fatal($buffer) {
		$error = error_get_last();
		if ($error ["type"] == 1) {
			$display_errors = ini_get("display_errors");

			$filepath = $error ["file"];
			$line = $error ["line"];
			$message = $error ["message"];

			$is_ajax = (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest");

			$message = sprintf("Severity: %s\nMessage: %s\nFilename: %s\nLine Number: %s", "FATAL", $message, $filepath, $line);

			header("HTTP/1.1 500 Internal Server Error");

			if (!$display_errors) {
				$message = "A fatal error occurred!";
			}
			if ($is_ajax) {
				$response = array(
						"error" => true,
						"message" => $message
				);

				return json_encode($response);
			} else {
				$res = file_get_contents(FCPATH . APPPATH . "errors/error_fatal.php");
				$res = preg_replace("/#message#/", $message, $res);
				return $res;
			}
		}

		return $buffer;
	}
}
