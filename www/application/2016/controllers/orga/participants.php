<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Participants extends Auth {

	public function index() {
		$this->render("orga/participants");
	}
}
