<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Settings extends Auth {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Settings_model");
	}

	public function index() {
		$settings = $this->Settings_model->get_all();
		$this->view->set("settings", $settings);

		if (_post()) {
			$model = array();
			foreach ($settings as $i) {
				$val = _post("setting|{$i->id}");
				if ($i->name != "live-stream") {
					$val = ($val ? true : false);
				}
				$model[$i->id] = $val;
			}
			$this->Settings_model->update($model);

			$this->session->set_flashdata("status", 1);
			redirect(current_url());
		}

		$this->view->set("success", $this->session->flashdata("status"));

		$this->render("orga/settings");
	}
}
