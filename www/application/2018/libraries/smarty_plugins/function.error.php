<?php

function smarty_function_error($params, &$smarty) {
	$validator = $params[0];
	$key = $params[1];
	$suffix = arr($params, 2, "");
	
	if ($validator->has_error($key, $suffix)) {
		return sprintf('<span class="validator-error">%s</span>', $validator->get_error($key, $suffix));
	}
	return "";
}
