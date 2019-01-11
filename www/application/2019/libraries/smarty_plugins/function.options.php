<?php

require_once("variablefilter.htmlstring.php");

function smarty_function_options($params, &$smarty) {
	extract($params);

	$data = (array)isset_or($data, array());
	$value = isset_or($value, "");
	$text = isset_or($text, "");
	$sel = (array)isset_or($sel, 0);

	$format_string = null;
	$params = array();
	if (is_array($text)) {
		$format_string = array_shift($text);
		$params = $text;
	}

	$res = "";
	foreach ($data as $index=>$el) {
		if (is_scalar($el)) {
			$sel_value = ($value == "#" ? $index : $el);
			$sel_text = $el;
		} else {
			$sel_value = ($value == "#" ? $index : smarty_function_options_get_val($el, $value));

			if ($format_string === null) {
				$sel_text = smarty_function_options_get_val($el, $text);
			} else {
				$sel_text = preg_replace("/(\?#)/", $index, $format_string);
				$binds = array();
				foreach ($params as $field) {
					$binds[] = smarty_function_options_get_val($el, $field);
				}
				$sel_text = smarty_function_options_format($sel_text, $binds);
			}
		}

		$sel_value = smarty_variablefilter_htmlstring($sel_value, $smarty);
		$sel_text = smarty_variablefilter_htmlstring($sel_text, $smarty);
		$selected = in_array($sel_value, $sel) ? $selected = ' selected="selected"' : "";

		$res .= "<option value=\"{$sel_value}\"{$selected}>{$sel_text}</option>";
	}
	return $res;

}
function smarty_function_options_get_val($el, $prop) {
	if (is_array($el)) {
		return $el[$prop];
	} else {
		eval('$res = $el->'.$prop. ";");
		return $res;
	}
}

function smarty_function_options_format($text, $binds) {
	preg_match_all("/(\?)/", $text, $matches);

	$index = 0;
	for ($i = 0, $count = count($matches[0]); $i < $count; $i++) {
		$param = $matches[1][$i];
		$key = $index++;

		if (!array_key_exists($key, $binds)) {
			throw new exception("Binding [{$key}] not found.");
		}
		$value = $binds[$key];
		$text = preg_replace("/".preg_quote($param)."/", $value, $text, 1);
	}
	return $text;
}