<?php
$config["webresources_ver"] = "1";

$config["webresources_minify"] = false;

$config["webresources"] = array (
		"public_css" => array (
				"resource/style/public/webfonts.css",
				"resource/style/reset.less",
				"resource/style/swipebox.min.css",
				"resource/style/flipclock.css",
				"resource/style/pure/pure-min.css",
				"resource/style/pure/grid.css",
				"resource/style/public/font-awesome.min.css",
				"resource/style/public/main.less",
				"resource/style/public/screen-small.less",
				"resource/style/public/screen-medium.less",
				"resource/style/public/screen-large.less",
				"resource/style/public/screen-extra-large.less",
		),
		"public_js" => array (
				"resource/javascript/jquery-1.11.0.min.js",
				"resource/javascript/jquery.mosaicflow.min.js",
				"resource/javascript/jquery.swipebox.js",
				"resource/javascript/jquery.tablesorter.js",
				"resource/javascript/flipclock.min.js",
				"resource/javascript/form-validator.js",
				"resource/javascript/googlemap.js",
				"resource/javascript/public/app.js",
		),
		
		"orga_css" => array (
				"resource/style/public/webfonts.css",
				"resource/style/reset.less",
				"resource/style/swipebox.min.css",
				"resource/style/flipclock.css",
				"resource/style/pure/pure-min.css",
				"resource/style/pure/grid.css",
				"resource/style/public/font-awesome.min.css",
				"resource/style/public/main.less",
				"resource/style/public/screen-small.less",
				"resource/style/public/screen-medium.less",
				"resource/style/public/screen-large.less",
				"resource/style/public/screen-extra-large.less",
		),
		"orga_js" => array (
				"resource/javascript/jquery-1.11.0.min.js",
				"resource/javascript/jquery.mosaicflow.min.js",
				"resource/javascript/jquery.swipebox.js",
				"resource/javascript/jquery.tablesorter.js",
				"resource/javascript/flipclock.min.js",
				"resource/javascript/form-validator.js",
				"resource/javascript/googlemap.js",
				"resource/javascript/orga/tinymce_preinit.js",
				"resource/tinymce/jquery.tinymce.min.js",
				"resource/javascript/public/app.js",
				"resource/tinymce/tinymce.min.js",
				"resource/javascript/orga/main.js",
		),
);

$config["webresources_icons"] = array(
	"public" => "resource/image/public/favicon.ico",
);

if (function_exists("merge_env")) {
	merge_env(__FILE__, $config);
}
