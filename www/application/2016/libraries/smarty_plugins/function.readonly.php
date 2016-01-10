<?php

function smarty_function_readonly($params, &$smarty) {
	extract($params);
	return ($state ? ' readonly="readonly" ': '');
}
