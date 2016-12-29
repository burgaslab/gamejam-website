<?php

function smarty_function_error_summary($params, &$smarty) {
	$validator = $params[0];

	$res = "";
	if (count($validator->get_errors())) {
		$res .= '<ul class="validator-summary">';
		foreach ($validator->get_errors() as $key=>$error) {
			$res .= "<li>$error</li>";
		}
		$res .= "</ul>";
	}
	return $res;
}
