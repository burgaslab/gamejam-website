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
				"title" => "Културен център “Морско Казино”",
				"text" => "29-31 януари 2016",
		);
		$this->view->set("map_model", $map_model);

		$this->render("home");
	}
}
