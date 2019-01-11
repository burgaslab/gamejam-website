<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

abstract class Base extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config("webresources");
		$this->load->config("nav");
		$this->load->library("smarty", null, "view");
		$this->load->helper("url");

		if (conf("force_ssl")) {
			enforce_ssl();
		}

		$this->view->set("base", $this->path->base);
		$this->view->set("http_base", $this->path->http_base);

		$current = $this->router->fetch_class();

		$nav = $this->get_nav();

		$nav = json_decode(json_encode($nav));

		$page_title = "";

		foreach ($nav as $i) {
			$found = null;
			foreach (arr($i, "sub", array()) as $j) {
				if ($j->url == $current) {
					$found = $j;
				}
			}
			if (!$found && $i->url == $current) {
				$found = $i;
			}

			if ($found) {
				$css = arr($found, "css", "");
				$found->css = "{$css} active";

				if ($current != "home") {
					$page_title = $found->title;
				}
			}
		}


		$this->view->set("nav", $nav);

		$this->set_page_title($page_title);
		
	}

	protected function set_page_title($page_title) {
		$title = sprintf("%s :: %s", conf("title"), conf("period"));
		if ($page_title) {
			$title = "{$page_title} | {$title}";
		}
		$this->view->set("html_title", $title);
	}

	protected function get_nav() {
		return conf("nav");
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
