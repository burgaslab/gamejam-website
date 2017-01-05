<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Home extends Base {

	public function index() {
		$time = strtotime(conf("event_start")) - time();
		$this->view->set("time", $time);

		$location = conf("location");
		$map_model[] = array (
				"lat" => $location[0],
				"lng" => $location[1],
				"title" => "Експозиционен център “Флора”",
				"text" => "20-22 януари 2017",
		);
		$this->view->set("map_model", $map_model);

		$autoplay = false;
		if (!isset($_COOKIE["autoplay"])) {
			$autoplay = true;
			setcookie("autoplay","1", time()+999999);
		}
		$this->view->set("autoplay", $autoplay);

		$this->render("home");
	}
}
