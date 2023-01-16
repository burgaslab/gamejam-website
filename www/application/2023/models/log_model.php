<?php

class Log_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function add($message) {
		$sql = "INSERT INTO log (message) VALUES (?)";
		$this->db->query($sql, $message);
	}
}