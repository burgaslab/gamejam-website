<?php

$config["cache_dir"] = APPPATH . "cache/";

//$config["title"] = "Burgas Game Jam";
$config["location"] = "Експозиционен център “Флора”";
$config["period"] = "03 февруари - 05 февруари 2023";
$config["title"] = "Burgas Game Jam 2023 :: 03 февруари - 05 февруари";

$config["age_groups"] = array("18-20г.", "21-29г.", "30г.+");
$config["occupations"] = array("ученик", "студент", "работещ", "геймър", "безработен");
$config["opt_bool"] = array(1=>"да", 0=>"не");

$config["event_start"] = "2023-02-03 16:00:00";
$config["location"] = array(42.5043459,27.4825012);
$config["year"] = 2023;
$config["force_ssl"] = true;

$config["shirt_sizes"] = array("XS", "S", "M", "L", "XL");
/*
 * Use this from other config files like so:
 * merge_env(__FILE__, $config).
 * Its purpose is to merge the environmental config (if exists) with the main one, so only the settings which are different are included in the environment config file.
*/
function merge_env($file, &$config) {
	$file = "env_" . basename($file);

	$file =  APPPATH."config/".ENVIRONMENT."/" . $file;

	if (file_exists($file)) {
		require ($file);
	}
}

merge_env(__FILE__, $config);

