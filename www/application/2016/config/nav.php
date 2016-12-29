<?php

$config["nav"] = array(
	array("title"=>"Начало", "url"=>"home"),
	array("title"=>"Какво?", "url"=>"what", "sub" => array(
			array("title"=>"Какво е Game Jam?", "url"=>"#game-jam"),
			array("title"=>"Какво е Global Game Jam?", "url"=>"#global-game-jam"),
			array("title"=>"Какво е Burgas Game Jam?", "url"=>"#burgas-game-jam"),
	)),
	array("title"=>"Правила", "url"=>"rules", "sub" => array(
			array("title"=>"Темата", "url"=>"#theme"),
			array("title"=>"Време", "url"=>"#time"),
			array("title"=>"Участие", "url"=>"#participation"),
			array("title"=>"Авторски права", "url"=>"#copyrights"),
	)),
	array("title"=>"Програма", "url"=>"programme", "sub" => array(
			array("title"=>"Ден 1 - Петък", "url"=>"#day1"),
			array("title"=>"Ден 2 - Събота", "url"=>"#day2"),
			array("title"=>"Ден 3 - Неделя", "url"=>"#day3"),
			array("title"=>"Лектори", "url"=>"#speakers"),
	)),
	array("title"=>"За Jammer-и", "url"=>"jammers"),
	// array("title"=>"Снимки", "url"=>"photos"),
	//array("title"=>"BGJ 2015", "url"=>"bgj2015"),
	array("title"=>"Подкрепи", "url"=>"support"),
	array("title"=>"Press Release", "url"=>"press"),
	array("title"=>"Класиране", "url"=>"votes"),
	array("title"=>"Снимки", "url"=>"gallery"),
	array("title"=>"Ревю", "url"=>"review"),
	//array("title"=>"Регистрация", "url"=>"registration"),
	//array("title"=>"Гласуване", "url"=>"vote", "css"=>"highlight"),
	array("title"=>"Архив", "url"=>"", "sub" => array(
		array("title"=>"Burgas Game Jam 2015", "url"=>"../2015"),
	)),
);


$config["nav_orga"] = array(
		array("title"=>"Участници", "url"=>"orga/participants"),
		array("title"=>"Отбори", "url"=>"orga/teams"),
		array("title"=>"Кодове", "url"=>"orga/codes"),
		array("title"=>"Изход", "url"=>"orga/auth/logout"),
);