<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	const STATUS = "_status";

	private static $age = array("12-16г.", "17-18г.", "18г.+");
	private static $occupation = array("ученик", "студент", "работещ", "безработен");

	private $validator = null;

	public function index() {
		$this->load->library("path");
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->database();

		require_once($this->path->abs_app . "libraries/class/Validator.php");

		$post = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"");
		$post = array_merge($post, (array)$this->input->post());

		$this->validator = new validator();

		if ($this->input->post()) {
			$this->validator->validate_required("name", $post["name"], 1);
			$this->validator->validate_email("email", $post["email"], 1);

			$sql = sprintf("SELECT 1 FROM participants WHERE email='%s'", $this->db->escape_str($post["email"]));
			$query = $this->db->query($sql);
			if ($query->result()) {
				$this->validator->add_error("email", "1");
			}
			if (!in_array($post["age"], self::$age)) {
				$this->validator->add_error("age", 1);
			}
			if (!in_array($post["occupation"], self::$occupation)) {
				$this->validator->add_error("occupation", 1);
			}
			$this->validator->validate_required("agree", $post["agree"], 1);

			if ($this->validator->is_valid()) {
				$data = array(
						"name" => $post["name"],
						"email" => $post["email"],
						"age" => $post["age"],
						"occupation" => $post["occupation"],
						"skills" => $post["skills"],
				);

				$sql = "INSERT INTO participants (name, email, age, occupation, skills) VALUES (?, ?, ?, ?, ?)";
				$this->db->query($sql, $data);

				$this->session->set_flashdata(self::STATUS, 1);
				redirect(current_url());
			}
		}


		$model = array(
			"data"=> $post,
			"validator"=> $this->validator,
			"age"=> self::$age,
			"occupation"=> self::$occupation,
			"is_success"=> $this->session->flashdata(self::STATUS),
		);

		$this->load->view("registration", $model);
	}
}
