<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require("base.php");

class Registration extends Base {

	const STATUS = "_status";

	public function index() {
		$this->load->library("path");
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->database();

		$age_groups = conf("age_groups");
		$occupations = conf("occupations");

		$this->classloader->load("common", "Validator");

		$model = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"");
		$model = array_merge($model, (array)$this->input->post());

		$validator = new validator();

		if ($this->input->post()) {
			$validator->validate_required("name", $model["name"], 1);
			$validator->validate_email("email", $model["email"], 1);

			$sql = sprintf("SELECT 1 FROM participants WHERE email='%s'", $this->db->escape_str($model["email"]));
			$query = $this->db->query($sql);
			if ($query->result()) {
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
				$data = array(
						"name" => $model["name"],
						"email" => $model["email"],
						"age" => $model["age"],
						"occupation" => $model["occupation"],
						"skills" => $model["skills"],
				);

				$sql = "INSERT INTO participants (name, email, age, occupation, skills) VALUES (?, ?, ?, ?, ?)";
				$this->db->query($sql, $data);

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
