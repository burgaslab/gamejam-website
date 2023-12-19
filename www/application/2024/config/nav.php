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
			array("title"=>"Ден 3 - Неделя", "url"=>"programme#day3")
	)),
	array("title"=>"За Jammer-и", "url"=>"jammers"),
	array("title"=>"Подкрепи", "url"=>"support"),
	array("title"=>"Press Release", "url"=>"press"),
	array("title"=>"Регистрация", "url"=>"registration", "css"=>"highlight"),
	//array("title"=>"Гласуване", "url"=>"vote", "css"=>"highlight"),
	//array("title"=>"Класиране", "url"=>"standing"),
	array("title"=>"Архив", "url"=>"", "sub" => array(
		array("title"=>"Burgas Game Jam 2015", "url"=>"../2015"),
		array("title"=>"Burgas Game Jam 2016", "url"=>"../2016"),
		array("title"=>"Burgas Game Jam 2017", "url"=>"../2017"),
		array("title"=>"Burgas Game Jam 2018", "url"=>"../2018"),
		array("title"=>"Burgas Game Jam 2019", "url"=>"../2019"),
		array("title"=>"Burgas Game Jam 2020", "url"=>"../2020"),
		array("title"=>"Burgas Game Jam 2023", "url"=>"../2023"),
	)),
);


$config["nav_orga"] = array(
		array("title"=>"Участници", "url"=>"orga/participants"),
		array("title"=>"Отбори", "url"=>"orga/teams"),
		//array("title"=>"Кодове", "url"=>"orga/codes"),
		array("title"=>"Страници", "url"=>"orga/pages"),
		array("title"=>"Настройки", "url"=>"orga/settings"),
		array("title"=>"Изход", "url"=>"orga/auth/logout"),
);
