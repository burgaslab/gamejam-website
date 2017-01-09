<?php

$config["nav"] = array(
	array("title"=>"Начало", "url"=>"home"),
	array("title"=>"Burgas Game Jam", "url"=>"about", "sub" => array(
			array("title"=>"Какво е Game Jam?", "url"=>"about"),
			array("title"=>"Правила", "url"=>"rules"),
	)),
	array("title"=>"Програма", "url"=>"programme", "sub" => array(
			array("title"=>"Ден 1 - Петък", "url"=>"programme#day1"),
			array("title"=>"Ден 2 - Събота", "url"=>"programme#day2"),
			array("title"=>"Ден 3 - Неделя", "url"=>"programme#day3"),
			array("title"=>"Лектори", "url"=>"programme#speakers"),
	)),
	array("title"=>"За Jammer-и", "url"=>"jammers"),
	array("title"=>"Подкрепи", "url"=>"support"),
	array("title"=>"Press Release", "url"=>"press"),
	array("title"=>"Регистрация", "url"=>"registration", "css"=>"highlight"),
	array("title"=>"Гласуване", "url"=>"vote", "css"=>"highlight"),
	array("title"=>"Класиране", "url"=>"standing"),
	array("title"=>"Архив", "url"=>"", "sub" => array(
		array("title"=>"Burgas Game Jam 2015", "url"=>"2015"),
		array("title"=>"Burgas Game Jam 2016", "url"=>"2016"),
	)),
);


$config["nav_orga"] = array(
		array("title"=>"Участници", "url"=>"orga/participants"),
		array("title"=>"Отбори", "url"=>"orga/teams"),
		array("title"=>"Кодове", "url"=>"orga/codes"),
		array("title"=>"Настройки", "url"=>"orga/settings"),
		array("title"=>"Изход", "url"=>"orga/auth/logout"),
);
