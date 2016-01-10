<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class What extends Base {

	public function index() {
		$this->render("what");
	}
}
