<?php

function smarty_function_webresources($params, &$smarty) {
	extract($params);

	$CI =& get_instance();

	$icon = isset_or($icon, "");
	$skin = isset_or($skin, "");
	$tab = isset_or($tab, "\t");

	if ($icon) {
		$icon = conf("webresources_icons", $icon);

		if (!$icon) {
			throw new exception("Icon \"{$icon}\" not found.");
		}

		if ($skin) {
			$icon = str_replace("[skin]", $skin, $icon);
		}

		return sprintf('<link href="%s%s" rel="shortcut icon" />', $CI->path->base, $icon);
	} else {

		$webresources = conf("webresources", $bundle);

		if (!$webresources) {
			throw new exception("Bundle \"{$bundle}\" not found.");
		}
		$type = "";

		$segments = explode(".", $webresources[0]);
		$ext = strtolower(array_pop($segments));
		switch ($ext) {
			case "js":
				$type = "js";
			break;
			case "css":
			case "less":
				$type = "css";
			break;
			default: throw new exception("Unknown file extension: \"{$ext}\".");
		}

		$template = "";
		switch ($type) {
			case "js":
				$template = '<script src="%s" type="text/javascript"></script>';
				break;
			case "css":
				$template = '<link href="%s" type="text/css" rel="stylesheet" />';
				break;
		}

		$ver = conf("webresources_ver");
		$minify = conf("webresources_minify");
		$root = $CI->path->base;

		$res = array();

		$next = "?";
		if ($minify) {
			if ($skin) {
				$skin = "?skin={$skin}";
				$next = "&";
			}
			$res[] = sprintf("%sresource/min/g=%s%s", $root, $bundle, $skin);
		} else {
			foreach ($webresources as $item) {
				if ($skin) {
					$item = str_replace("[skin]", $skin, $item);
				}
				$res[] = $root . $item;
			}
		}
		foreach ($res as &$item) {
			if ($ver) {
				$item .= "{$next}v={$ver}";
			}
			$item = sprintf($template, $item);
		}

		return implode("\n{$tab}", $res);
	}
}
