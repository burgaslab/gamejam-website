<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require(dirname(__FILE__) . "/auth.php");

class Index extends Auth {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		redirect("/orga/participants");
	}
}
