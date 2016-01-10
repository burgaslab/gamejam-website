<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Photos extends Base {

	private function index() {
		$this->render("photos");
	}
}
