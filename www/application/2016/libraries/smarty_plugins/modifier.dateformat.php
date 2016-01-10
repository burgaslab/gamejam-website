<?php

function smarty_modifier_dateformat($input, $format) {
	$time = strtotime($input);
	return $input && $time ? date($format, $time) : "";
}
