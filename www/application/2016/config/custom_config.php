<?php

$config["cache_dir"] = APPPATH . "cache/";

$config["title"] = "Burgas Game Jam :: 29-31 януари 2016";

$config["age_groups"] = array("12-16г.", "17-18г.", "18г.+");
$config["occupations"] = array("ученик", "студент", "работещ", "безработен");

$config["event_start"] = "2016-01-29 13:00:00";
$config["location"] = array(42.494730, 27.482612);
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

