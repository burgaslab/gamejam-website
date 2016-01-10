<?php
$config["webresources_ver"] = "1";

$config["webresources_minify"] = false;

$config["webresources"] = array (
		"public_css" => array (
				"resource/public/style/webfonts.css",
				"resource/style/reset.less",
				"resource/style/lib.less",
				"resource/style/jquery.upgradebrowsers.css",
				"resource/style/prettyPhoto.css",
				"resource/public/style/main.less",
		),
		"public_js" => array (
				"resource/javascript/jquery-1.11.0.min.js",
				"resource/javascript/jquery.blockUI-2.66.js",
				"resource/javascript/underscore.js",
				"resource/javascript/popup.js",
				"resource/javascript/app.js",
				"resource/javascript/jquery.upgradebrowsers-1.0.js",
				"resource/javascript/jquery.cookie.js",
				"resource/javascript/jquery.prettyPhoto.js",
				"resource/javascript/form-validator.js",
				"resource/public/javascript/account.js",
				"resource/public/javascript/shop.js",
				"resource/public/javascript/googlemap.js",
				"resource/public/javascript/main.js",
		),
);

$config["webresources_icons"] = array(
	"public" => "resource/public/image/favicon.ico",
);

if (function_exists("merge_env")) {
	merge_env(__FILE__, $config);
}
