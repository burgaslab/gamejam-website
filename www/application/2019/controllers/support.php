<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("page.php");

class Support extends Page {

	public function index() {
		$this->show_page("support");
	}
}
