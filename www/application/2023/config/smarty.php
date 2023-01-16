<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$cache_dir = get_instance()->config->item("cache_dir");

$config["smarty"] = array(
	"template_dir" => APPPATH . "views/",
	"compile_dir" => $cache_dir . "/smarty/",
	"plugins_dir" => array(APPPATH."third_party/smarty/plugins", APPPATH."libraries/smarty_plugins"),
	"debugging" => false,
	"compile_check" => true, // consider setting to "false" in production
	"force_compile" => false,
	"caching" => false,
	"cache_dir" => $cache_dir . "/smarty/",
	"cache_lifetime" => 120,
	"error_reporting" => E_ALL | E_STRICT,
	"autoload_filters" => array (
				"pre" => array (
						"switch",
						"striphtmlcomments",
				),
				"variable" => array (
						"htmlstring"
				)
		),
	"use_sub_dirs" => true,
	"escape_html" => false,
);

merge_env(__FILE__, $config);
