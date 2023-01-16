<?php

function smarty_function_err($params, &$smarty) {
	$validator = $params[0];

	array_shift($params);

	$err = array();

	if(is_array($params[0])) {
		$err = $params[0];
	} else {
		$err = $params;
	}

	foreach ($err as $v) {
		$css_class = "error";
		$suffix = "";
		if (is_scalar($v)) {
			$key = $v;
		} else {
			$key = $v[0];
			$suffix = arr($v, 1, "");
			$css_class = arr($v, 2, $css_class);
		}

		if ($validator->has_error($key, $suffix)) {
			return $css_class;
		}
	}

	return "";
}
