<?php

class Registration_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function check_email($email) {
		$sql = sprintf("SELECT 1 FROM participants WHERE email='%s'", $this->db->escape_str($email));
		$query = $this->db->query($sql);
		return !$query->result();
	}

	public function add($name, $email, $age, $occupation, $skills) {
		$data = array(
				"name" => $name,
				"email" => $email,
				"age" => $age,
				"occupation" => $occupation,
				"skills" => $skills,
		);

		$sql = "INSERT INTO participants (name, email, age, occupation, skills) VALUES (?, ?, ?, ?, ?)";
		$this->db->query($sql, $data);
	}
}