<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

abstract class Base extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config("webresources");
		$this->load->config("nav");
		$this->load->library("smarty", null, "view");

		$this->view->set("base", $this->path->base);

		$current = $this->router->fetch_class();

		$nav = conf("nav");

		$page_title = "";
		foreach ($nav as &$i) {
			if ($i["url"] == $current) {
				$css = arr($i, "css", "");
				$i["css"] = "{$css} active";

				if ($current != "home") {
					$page_title = $i["title"];
				}
			}
		}
		$this->view->set("nav", $nav);

		$title = conf("title");
		if ($page_title) {
			$title = "{$page_title} | {$title}";
		}
		$this->view->set("html_title", $title);
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
