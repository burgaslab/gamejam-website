<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("page.php");

class Jammers extends Page {

	public function index() {
		$this->show_page("jammers");
	}
}
