<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Programme extends Base {

	public function index() {
		$this->render("programme");
	}
}
