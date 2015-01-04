<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Home extends CI_Controller {

	public function index() {
		$this->load->library("path");

		$this->load->view("home");
	}
	
	public function what() {
		$this->load->library("path");

		$this->load->view("what");
	}
	
	public function rules() {
		$this->load->library("path");

		$this->load->view("rules");
	}
	
	public function programme() {
		$this->load->library("path");

		$this->load->view("programme");
	}
	
	public function support() {
		$this->load->library("path");

		$this->load->view("support");
	}
}
