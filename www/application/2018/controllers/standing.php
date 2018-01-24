<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Standing extends Base {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Votes_model");
		$this->load->model("Settings_model");
	}

	public function index() {
		$open = $this->Settings_model->get_value("standing");

		$this->view->set("categories", $this->Votes_model->categories_votes());
		$this->view->set("general", $this->Votes_model->general());
		$this->view->set("audience", $this->Votes_model->audience());

		$this->load->config("auth");
		$this->load->library("session");
		$logged = $this->session->userdata(conf("auth_session_key"));

		$open = ($open || $logged);
		$this->view->set("open", $open);


		$this->render("standing");
	}



}
