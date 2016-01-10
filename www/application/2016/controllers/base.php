<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

abstract class Base extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config("webresources");
		$this->load->library("smarty", null, "view");
	}

	protected function json_response($res) {
		$this->output->
		set_content_type("application/json")->
		set_output(json_encode($res));
	}

	protected function text_response($res) {
		$this->output->set_output($res);
	}

	protected function render($template) {
		try {
			$this->view->result($template);
		} catch (Exception $e) {
			show_error(htmlspecialchars_decode($e->getMessage()), 500, "Smarty Exception");
		}
	}

}
