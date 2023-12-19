<?php

function smarty_function_anchor($params, &$smarty) {
	extract($params);
	$href = htmlspecialchars(get_url(isset_or($href, "")));
	$title = htmlspecialchars(isset_or($title, $href));
	$class = htmlspecialchars(isset_or($class, ""));
	$new = isset_or($new, 0);
	$target = ($new ? 'target="_blank"' : "");

	return sprintf('<a href="%s" title="%s" class="%s" %s>%s</a>', $href, $title, $class, $target, $title);
}
