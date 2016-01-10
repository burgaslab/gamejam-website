<?php

$config["cache_dir"] = APPPATH . "cache/";


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

