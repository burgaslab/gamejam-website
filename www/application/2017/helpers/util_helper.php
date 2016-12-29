<?php

/**
 * Returns the variable if it isset or the default value "def".
 * Shorthand for (isset($var) ? $var : $def). It can be used as isset_or($var, $def) without raising notice.
 * @param $var Variable to check.
 * @param $def Default value.
 * @return Variable if set or default value.
 */
function isset_or(&$var, $def=null) {
	return isset($var) ? $var : $def;
}

/**
 * Gets a value in an array, specified by the selector or the default value if the selector is not found. If selector is null, the original array will be returned.
 * @param array $arr The array to look into.
 * @param string $selector The selector. Can be a single value like "key", or multi dimension, like "key|subkey", "|" is the separator.
 * @param $def Default (coalesce) value if the selector is not existing in the array.
 * @param string $separator Seperator for the selector.
 * @return Found value or default value.
 */
function arr($arr, $selector=null, $def=null, $separator="|") {
	$arr = (array)$arr;
	$current = $arr;
	if ($selector !== null) {
		$split = explode($separator, $selector);
		foreach ($split as $s) {
			if (is_array($current) && array_key_exists($s, $current)) {
				$current = $current[$s];
			} else {
				return $def;
			}
		}
	}
	return $current;
}


/**
 * Gets a CI config value by the supplied cascade keys. Throws an exception if not found.
 * @param args The keys by which to find config value.
 * @return The config value.`
 */
function conf() {
	$config =& get_config();

	$args = func_get_args();

	$res = $config;
	foreach ($args as $arg) {
		if (!is_array($res) || !array_key_exists($arg, $res)) {
			$tostring = implode(", ", $args);
			throw new Exception("Config key [{$tostring}] not found!");
		}
		$res = $res[$arg];
	}
	return $res;
}

function _get($key=null, $def="", $separator="|") {
	return arr($_GET, $key, $def, $separator);
}
function _get_arr($key=null, $def=array(), $separator="|") {
	return (array)_get($key, $def, $separator);
}

function _post($key=null, $def="", $separator="|") {
	return arr($_POST, $key, $def, $separator);
}
function _post_arr($key=null, $def=array(), $separator="|") {
	return (array)_post($key, $def, $separator);
}

function _files($key=null, $def="", $separator="|") {
	return arr($_FILES, $key, $def, $separator);
}
function _files_arr($key=null, $def=array(), $separator="|") {
	return (array)_files($key, $def, $separator);
}

function _get_post($key=null, $def="", $separator="|") {
	$res = _get($key, $def, $separator);
	if ($res === $def) {
		$res = _post($key, $def, $separator);
	}
	return $res;
}
function _get_post_arr($key=null, $def=array(), $separator="|") {
	return (array)_get_post($key, $def, $separator);
}

function _post_files_merge($key=null, $def="", $separator="|") {
	$post = (array)_post($key, array(), $separator);
	$files = (array)_files($key, array(), $separator);
	return array_merge_recursive_distinct($post, $files);
}

function _session($key=null, $def="", $unset=false, $separator="|") {
	$res = arr($_SESSION, $key, $def, $separator);
	if ($unset) {
		unset($_SESSION[$key]);
	}
	return $res;
}
function _session_arr($key=null, $def=array(), $unset=false, $separator="|") {
	return _session($key, $def, $unset, $separator);
}
function set_session($key, $value) {
	$_SESSION[$key] = $value;
}
function unset_session($key) {
	unset($_SESSION[$key]);
}

function _cookie($key=null, $def="", $separator="|") {
	return arr($_COOKIE, $key, $def, $separator);
}
function _server($key=null, $def="", $separator="|") {
	return arr($_SERVER, $key, $def, $separator);
}

function data_encrypt($data, $key) {
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv);
}

function data_decrypt($data, $key) {
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$res = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv);
	return rtrim($res, "\0");
}

function my_random_string($length, $charset="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz") {
	$res = "";
	$count = strlen($charset);
	while ($length--) {
		$res .= $charset[mt_rand(0, $count-1)];
	}
	return $res;
}

/**
 * Similar to preg_replace but ensures that once a value is replaced part of it will not be replaced again, which could happen if a replacement value itself contains a match.
 * @param string $pattern Regex pattern.
 * @param string $subject The subject to replace into.
 * @param array $values The values to replace.
 * @return The result string.
 */
function preg_replace_incremental($pattern, $subject, $values) {
	preg_match_all($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);

	$res = "";
	$prev = 0;
	for ($i = 0, $count = count($matches[0]); $i < $count; $i++) {
		$current = mb_strlen($matches[0][$i][0]) + $matches[0][$i][1];
		$part = mb_substr($subject, $prev, $current - $prev);
		$prev = $current;

		if (!array_key_exists($i, $values)) {
			throw new exception("Value with index [$i] not found.");
		}

		$res .= preg_replace("/".preg_quote($matches[0][$i][0])."/", $values[$i], $part, 1);
	}
	$res .= mb_substr($subject, $prev);

	return $res;
}

/**
 * Same as base64_encode function, but replaces non-url safe characters with safe ones:
 * "+" => "-"
 * "/" => "/" (unchanged)
 * "=" => "_"
 * @param string The string to encode as base64.
 * @return The encoded data.
 */
function base64_encode_urlsafe($data) {
	$res = base64_encode($data);
	return strtr($res, "+/=", "-/_");
}

/**
 * Same as base64_decode function, but replaces the url safe characters with original ones:
 * "-" => "+"
 * "/" => "/" (unchanged)
 * "_" => "="
 * @param string The string to encode as base64.
 * @return The encoded data.
 */
function base64_decode_urlsafe($data) {
	$res = strtr($data, "-/_", "+/=");
	return base64_decode($res);
}

/**
 * Checks if the request comes from a bot, based on the user agent.
 * @return boolean True if bot is detected.
 */
function is_bot() {
	$crawlers_agents = "Google|msnbot|Rambler|Yahoo|AbachoBOT|accoona|AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby";

	$ua = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";

	return strpos($crawlers_agents, $ua) !== false;
}

function array_merge_recursive_distinct($arr1, $arr2) {
	$res = $arr1;

	foreach ($arr2 as $key => &$value) {
		if (is_array($value) && isset($res[$key]) && is_array($res[$key])) {
			$res[$key] = array_merge_recursive_distinct($res[$key], $value);
		} else {
			$res[$key] = $value;
		}
	}

	return $res;
}

/**
 * Redirects to https on the same resource
 */
function enforce_ssl($port="") {
	$https = strtolower(_server("HTTPS"));
	$is_on = ($https == "on" || $https == "1");
	if (!$is_on) {
		$host = $_SERVER['HTTP_HOST'];
		$host = preg_replace("/:[0-9]+/", "", $host);
		if ($port) {
			$host = ":{$port}";
		}
		$url = "https://".$host.$_SERVER['REQUEST_URI'];
		redirect($url);
	}
}