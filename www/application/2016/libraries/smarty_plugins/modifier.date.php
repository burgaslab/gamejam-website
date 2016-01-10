<?php


function smarty_modifier_date($input, $format=null) {
	return $input ? parser::string_to_date($input, $format) : "";
}
