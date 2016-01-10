<?php


function smarty_modifier_mytime($input, $format=null) {
	return $input === null ? "" : parser::string_to_time($input, $format);
}
