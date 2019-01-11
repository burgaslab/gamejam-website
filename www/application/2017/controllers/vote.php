<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Vote extends Base {

	const STATUS = "_status";

	public function index() {
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("Votes_model");
		$this->load->model("Teams_model");
		$this->load->model("Settings_model");

		$this->classloader->load("common", "Validator");

		$open = $this->Settings_model->get_value("vote");

		$categories = $this->Votes_model->get_categories();

		$model = array("code"=>"");
		foreach ($categories as $c) {
			$model["category"][$c->id] = "";
		}

		$team_id = 0;
		if ($this->input->get()) {
			$key = conf("encryption_key");

			$params = current(array_keys($this->input->get()));
			$params = base64_decode_urlsafe($params);
			$params = data_decrypt($params, $key);
			$params = json_decode($params);
			if (isset($params->code)) {
				$model["code"] = $params->code;
				$team_id = $params->team_id;
			}
		}

		$teams = $this->Teams_model->get_list($team_id);

		$validator = new validator();

		if ($open && $this->input->post()) {
			$model = array_merge($model, (array)$this->input->post());

			// hinder any bruteforce attempts...codes are very weak.
			sleep(1);

			$validator = $this->Votes_model->validate($model, $categories, $teams, $team_id);

			if ($validator->is_valid()) {
				$this->Votes_model->add($model, $categories, $team_id);

				$this->session->set_flashdata(self::STATUS, 1);
				redirect(current_url());
			}
		}

		$this->view->set("open", $open);
		$this->view->set("is_participant", ($team_id != 0));
		$this->view->set("categories", $categories);
		$this->view->set("teams", $teams);
		$this->view->set("model", $model);
		$this->view->set("validator", $validator);
		$this->view->set("success", $this->session->flashdata(self::STATUS));

		$this->render("vote");
	}
}
