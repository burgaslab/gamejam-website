<?php

$path_to_root = "../../";

$skin = isset($_GET["skin"]) ? $_GET["skin"] : "";

require_once ($path_to_root . "../application/2023/config/webresources.php");
$webresources = $config["webresources"];

function walker(&$item, $index, $root) {
	$item = $root . $item;
}
array_walk_recursive($webresources, "walker", $path_to_root);
return $webresources;
