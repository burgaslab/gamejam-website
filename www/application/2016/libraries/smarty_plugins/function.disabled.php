<?php

function smarty_function_disabled($params, &$smarty) {
	extract($params);
	return ($state ? ' disabled="disabled" ': '');
}
