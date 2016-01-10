<?php

class Smarty_Prefilter_StripHtmlComments {

	public static function execute($output, $smarty) {
		return preg_replace("/<!--.*-->/U", '', $output);
	}
}
