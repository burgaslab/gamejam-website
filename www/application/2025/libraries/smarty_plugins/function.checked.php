<?php

function smarty_function_checked($params, &$smarty) {
	$state = arr($params, "state", 0);
	$state = arr($params, "0", $state);
	return ($state ? ' checked="checked" ': '');
}
