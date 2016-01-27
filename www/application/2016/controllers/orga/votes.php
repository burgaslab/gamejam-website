<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Votes extends Auth {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Votes_model");
	}

	public function index() {
		$this->view->set("categories", $this->Votes_model->categories());
		$this->view->set("general", $this->Votes_model->general());

		$this->render("orga/votes");
	}



}
