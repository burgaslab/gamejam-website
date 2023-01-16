<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require("base.php");

class Registration extends Base {

	const STATUS = "_status";


	public function index() {
		$this->load->library("path");
		$this->load->library("session");
		$this->load->helper("url");
		
		$this->load->model("Participants_model");

		$open = $this->Settings_model->get_value("registration");
		$age_groups = conf("age_groups");
		$occupations = conf("occupations");
		$shirt_sizes = conf("shirt_sizes");

		$this->classloader->load("common", "Validator");

		$model = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"", "shirt_size" => "");
		$model = array_merge($model, (array)$this->input->post());

		$validator = new validator();

		if ($open && $this->input->post()) {
			$validator = $this->Participants_model->validate(0, $model);
			$validator->validate_required("agree", $model["agree"], 1);

			if ($validator->is_valid()) {
				unset($model["confirmed"]);
				unset($model["team_id"]);
				$this->Participants_model->add($model);

				$this->session->set_flashdata(self::STATUS, 1);
				redirect(current_url());
			}
		}

		$this->view->set("open", $open);
		$this->view->set("age_groups", $age_groups);
		$this->view->set("occupations", $occupations);
		$this->view->set("shirt_sizes", $shirt_sizes);
		$this->view->set("model", $model);
		$this->view->set("validator", $validator);
		$this->view->set("success", $this->session->flashdata(self::STATUS));

		$this->render("registration");
	}
}
