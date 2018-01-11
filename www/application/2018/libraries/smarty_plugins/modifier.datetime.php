<?php


function smarty_modifier_datetime($input, $format="iso") {
	return $input ? parser::string_to_datetime($input, $format) : "";
}
