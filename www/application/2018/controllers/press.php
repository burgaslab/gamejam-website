<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Press extends Base {

	public function index() {
		$this->render("press");
	}
}
