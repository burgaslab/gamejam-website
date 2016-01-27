<?php

class MY_Log extends CI_Log {

	public function __construct()	{
		parent::__construct();

		//updated log levels according to the correct order
		$this->_levels	= array("ERROR" => "1", "INFO" => "2",  "DEBUG" => "3", "ALL" => "4");

		$config =& get_config();

		if (!is_dir($this->_log_path)) {
			@mkdir($this->_log_path);
			if (!is_really_writable($this->_log_path)) {
				die ("Logs directory is not writeable!");
			}
		}

		$this->_enabled = true;
	}

	function write_log($level = "error", $msg, $php_error = FALSE) {
		if ($level == "error") {
			$msg = self::get_verbose($msg);
		}

		return parent::write_log($level, $msg, $php_error);
	}



	private static function get_verbose($text) {
		$NL = "\r\n";

		$text .= $NL;
		$text .= $NL."CLIENT IP: ".$_SERVER["REMOTE_ADDR"];
		$text .= $NL."URL: "."http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$text .= $NL."SCRIPT: ". $_SERVER["SCRIPT_FILENAME"];
		$text .= $NL."AJAX: ". (_server("HTTP_X_REQUESTED_WITH") == "XMLHttpRequest" ? "true" : "false");
		$text .= $NL."QUERY STRING: ". $_SERVER["QUERY_STRING"];
		$text .= $NL."GET:".$NL;
		$text .= str_replace("\n", $NL, var_export($_GET, true));
		$text .= $NL."POST:".$NL;
		$text .= str_replace("\n", $NL, var_export($_POST, true));
		$text .= $NL."SESSION:".$NL;
		$text .= str_replace("\n", $NL, var_export($_SESSION, true));
		$text .= $NL."FILES:".$NL;
		$text .= str_replace("\n", $NL, var_export($_FILES, true));
		$text .= $NL."TRACE:".$NL;
		$text .= self::get_stacktrace(5);
		$text .= $NL;
		return $text;
	}

	private static function get_stacktrace($traces_to_ignore = 1){
		$traces = debug_backtrace();
		$res = array();
		$j = 0;
		foreach($traces as $i => $call){

			if ($i < $traces_to_ignore ) {
				continue;
			}
			// ignore benchmark call
			//if (isset($call["args"][0][0]->benchmark)) {
			//	continue;
			//}
			$object = "";

			$start = "#".str_pad($j, 3, " ");
			$function = $call["function"];
			$args = "";//json_encode($call["args"]);
			$file = isset($call["file"]) ? $call["file"] : "";
			$line = isset($call["line"]) ? $call["line"] : "";
			$res[] = $start.$object.$function."(".$args.") called at [".$file.":".$line."]";
			$j++;
		}
		return implode("\n", $res);
	}

	private static function get_arg(&$arg) {
		if (is_object($arg)) {
			$arr = (array)$arg;
			$args = array();
			foreach($arr as $key => $value) {
				if (strpos($key, chr(0)) !== false) {
					$key = "";    // Private variable found
				}
				$args[] =  "[".$key."] => ".self::get_arg($value);
			}
			$arg = get_class($arg) . " Object (".implode(",", $args).")";
		}
	}
}
