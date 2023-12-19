<?php

function smarty_function_random($params, &$smarty) {
	extract($params);
	$in = isset($in) ? $in : 0;
	$out = isset($out) ? $out : 1<<30;

	return rand($in, $out);
}