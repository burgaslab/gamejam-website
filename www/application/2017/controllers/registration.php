<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require("base.php");

class Registration extends Base {

	const STATUS = "_status";


	public function index() {
		$this->load->library("path");
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("Participants_model");

		$age_groups = conf("age_groups");
		$occupations = conf("occupations");

		$this->classloader->load("common", "Validator");

		$model = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"");
		$model = array_merge($model, (array)$this->input->post());

		$validator = new validator();

		if ($this->input->post()) {
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


		$this->view->set("age_groups", $age_groups);
		$this->view->set("occupations", $occupations);
		$this->view->set("model", $model);
		$this->view->set("validator", $validator);
		$this->view->set("success", $this->session->flashdata(self::STATUS));

		$this->render("registration");
	}
}
