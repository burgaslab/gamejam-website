<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Home extends CI_Controller {

	public $method;

	public function __construct() {
		parent::__construct();

		$this->load->library("path");

		$this->method = $this->router->fetch_method();
	}

	public function index() {
		$this->load->view("home");
	}

	public function what() {
		$this->load->view("what");
	}

	public function rules() {
		$this->load->view("rules");
	}

	public function programme() {
		$this->load->view("programme");
	}

	public function support() {
		$this->load->view("support");
	}
}
