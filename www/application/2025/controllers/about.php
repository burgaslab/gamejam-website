<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("page.php");

class About extends Page {

	public function index() {
		$this->show_page("about");
	}
}
