<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Votes extends Base {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Votes_model");
	}

	public function index() {
		$this->view->set("categories", $this->Votes_model->categories_votes());
		$this->view->set("general", $this->Votes_model->general());

		$this->render("votes");
	}



}
