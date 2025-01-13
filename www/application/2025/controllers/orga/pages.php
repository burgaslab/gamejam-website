<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Pages extends Auth {

	private $year;
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Pages_model");

		$this->year = conf("year");
		$this->view->set("success", $this->session->flashdata("status"));
	}

	public function index() {
		$pages = $this->Pages_model->get_all($this->year);
		$this->view->set("pages", $pages);

		$this->render("orga/pages");
	}

	public function edit($name="") {
		$page = $this->Pages_model->get_one($this->year, $name);

		if (!$page) {
			show_404();
			return;
		}

		if (_post()) {
			$this->Pages_model->update($this->year, $name, _post("model|title"), _post("model|text"));
			$this->session->set_flashdata("status", 1);
			if (_post("close")) {
				redirect("/orga/pages");
			} else {
				redirect(current_url());
			}
		}
		
		$this->view->set("success", $this->session->flashdata("status"));
		$this->view->set("model", $page);
		
		$this->render("orga/page-edit");
		
	}
}
