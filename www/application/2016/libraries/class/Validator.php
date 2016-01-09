<?php

class Validator {
	const DEFAULT_ERROR_MESSAGE = "Invalid value!";
	const REGEX_NOT_EMPTY = "/.+/";
	const REGEX_EMAIL = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	const REGEX_USERNAME = "/^[a-z0-9_\-]{4,32}$/i";
	const REGEX_PHONE = "/^[0-9 +-\/]{6,}$/";
	const REGEX_NAME = "/^[а-яa-z ]{3,40}$/ui";
	const REGEX_PASSWORD = "/^.{6,}$/";
	const REGEX_URL = '/^(https?):\/\/(.)+/';
	
	static $IMAGE_EXT = array("jpg", "jpeg", "png", "gif");
	static $VIDEO_EXT = array("flv", "mp4");
	static $AUDIO_EXT = array("mp3");
	
	protected $errors = array();
	
	public function __construct() {
	}
	
	public function add_error($key, $message) {
		$this->errors[$key] = $message;
	}
	public function remove_error($key) {
		unset($this->errors[$key]);
	}
	public function set_error($state, $key, $message) {
		if ($state) {
			$this->add_error($key, $message);
		} else {
			$this->remove_error($key);
		}
	}
	public function get_errors() {
		return $this->errors;
	}
	public function reset() {
		$this->errors = array();
	}
	public function has_error($key, $suffix="") {
		$key = $this->get_key($key, $suffix);
		return array_key_exists($key, $this->errors);
	}
	public function get_error($key, $suffix="") {
		$key = $this->get_key($key, $suffix);
		return $this->errors[$key];
	}
	public function is_valid() {
		return count($this->errors) == 0;
	}
	public function merge($validator, $key_suffix="", $message_suffix="") {
		foreach($validator->get_errors() as $key=>$error) {
			$key = $this->get_key($key, $key_suffix);
			$this->add_error($key, $error . $message_suffix);
		}
	}
	
	public function get_custom_errors($messages) {
		$res = array();
		foreach ($this->errors as $key=>$m) {
			$res[$key] = array_key_exists($key, $messages) ? $messages[$key] : $m;
		}
		return $res;
	}
	
	private function get_key($key, $suffix) {
		if ($suffix && is_array($suffix)) {
			$suffix = implode("_", $suffix);
		}
		return $suffix ? "{$key}_{$suffix}" : $key;
	}
	
	
	public function validate_string($key, $input, $message, $regex) {
		$res = self::test_string($input, $regex);
		$this->set_error(!$res, $key, $message);
	}
	public function validate_required($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_NOT_EMPTY);		
	}
	public function validate_username($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_USERNAME);
	}
	public function validate_email($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_EMAIL);
	}
	public function validate_password($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_PASSWORD);
	}
	public function validate_name($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_NAME);
	}
	public function validate_phone($key, $input, $message) {
		$this->validate_string($key, $input, $message, self::REGEX_PHONE);
	}
	public function validate_int($key, $input, $message, $min, $max) {
		$res = self::test_int($input, $min, $max);
		$this->set_error(!$res, $key, $message);
	}
	public function validate_float($key, $input, $message, $min, $max) {
		$res = self::test_float($input, $min, $max);
		$this->set_error(!$res, $key, $message);
	}
	public function validate_custom($key, $message, $method) {
		$res = call_user_func_array(array($this, $method), array($key));
		$this->set_error(!$res, $key, $message);
	}
	
	public static function test_string($input, $regex) {
		return preg_match($regex, $input);
	}
	public static function test_int($input, $min=null, $max=null) {
		$input = intval($input);
		return ($min === null || $input >= $min) &&
					 ($max === null || $input <= $max);
	}
	public static function test_float($input, $min=null, $max=null) {
		$input = intval($input);
		return ($min === null || $input >= $min) &&
		($max === null || $input <= $max);
	}
	
	public static function test_file($arr) {
		return isset($arr["tmp_name"]) && is_uploaded_file($arr["tmp_name"]);
	}
	public static function test_image($arr) {
		return self::test_file($arr) && isset($arr["name"]) && self::test_image_ext($arr["name"]); 
	}
	public static function test_video($arr) {
		return self::test_file($arr) && isset($arr["name"]) && self::test_video_ext($arr["name"]);
	}
	public static function test_audio($arr) {
		return self::test_file($arr) && isset($arr["name"]) && self::test_audio_ext($arr["name"]);
	}
	public static function test_file_ext($file, $exts) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		return in_array(strtolower($ext), $exts);
	}
	public static function test_image_ext($file) {
		return self::test_file_ext($file, self::$IMAGE_EXT);
	}
	public static function test_video_ext($file) {
		return self::test_file_ext($file, self::$VIDEO_EXT);
	}
	public static function test_audio_ext($file) {
		return self::test_file_ext($file, self::$AUDIO_EXT);
	}
}