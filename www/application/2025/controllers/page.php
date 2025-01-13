<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

abstract class Page extends Base {

	private $year;
	public function __construct() {
		parent::__construct();

		$this->load->model("Pages_model");

		$this->year = conf("year");
	}

	protected function show_page($name) {

		$page = $this->Pages_model->get_one($this->year, $name);

		if (!$page) {
			show_404();
			return;
		}

		$this->set_page_title($page->title);

		$this->view->set("text", $page->text);

		$this->render("page");
	}
}
