<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Rules extends Base {

	public function index() {
		$this->render("rules");
	}
}
