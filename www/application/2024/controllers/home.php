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
				"title" => conf("location"),
				"text" => conf("period"),
		);
		$this->view->set("map_model", $map_model);

		$autoplay = false;
		if (!isset($_COOKIE["autoplay"])) {
			$autoplay = true;
			setcookie("autoplay","1", time()+999999);
		}
		$this->view->set("autoplay", $autoplay);

		$this->view->set("live_stream", $this->Settings_model->get_value("live-stream"));
		$this->view->set("embed", $this->Settings_model->get_value("embed"));

		$this->load->model("Pages_model");

		$page = $this->Pages_model->get_one(conf("year"), "home");
		$this->view->set("text", $page->text);

		$this->render("home");
	}
}
