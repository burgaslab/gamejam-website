<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require("base.php");

class Registration extends Base {

	const STATUS = "_status";

	public function index() {
		$this->load->library("path");
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->database();
		$this->load->model("Registration_model");

		$age_groups = conf("age_groups");
		$occupations = conf("occupations");

		$this->classloader->load("common", "Validator");

		$model = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"");
		$model = array_merge($model, (array)$this->input->post());

		$validator = new validator();

		if ($this->input->post()) {
			$validator->validate_required("name", $model["name"], 1);
			$validator->validate_email("email", $model["email"], 1);

			if (!$this->Registration_model->check_email($model["email"])) {
				$validator->add_error("email", "1");
			}
			if (!in_array($model["age"], $age_groups)) {
				$validator->add_error("age", 1);
			}
			if (!in_array($model["occupation"], $occupations)) {
				$validator->add_error("occupation", 1);
			}
			$validator->validate_required("agree", $model["agree"], 1);

			if ($validator->is_valid()) {
				$this->Registration_model->add($model["name"], $model["email"], $model["age"], $model["occupation"], $model["skills"]);

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
