<?php

function smarty_variablefilter_htmlstring($source, $smarty) {
	return trim(htmlspecialchars($source, ENT_QUOTES, "utf-8"));
}
