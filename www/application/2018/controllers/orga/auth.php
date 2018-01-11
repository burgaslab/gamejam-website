<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require(dirname(__FILE__) . "/../base.php");

class Auth extends Base {

	private $session_key;

	public function __construct() {
		parent::__construct();

		$this->load->config("auth");
		$this->load->library("session");
		$this->load->helper("url");
		$this->classloader->load("common", "PasswordHash");

		$this->session_key = conf("auth_session_key");

		$method = $this->router->fetch_method();

		if ($method != "login" && !$this->session->userdata($this->session_key)) {
			redirect("/orga/auth/login");
		}
	}

	protected function get_nav() {
		return conf("nav_orga");
	}


	public function login() {
		$username = "";

		if ($this->input->post("login")) {
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			$hasher = new PasswordHash(12, false);
			
			$res = ($username == conf("orga_username") && $hasher->CheckPassword($password, conf("orga_password")));
			if ($res) {
				$this->session->set_userdata(array($this->session_key=>1));
				$location = _get("ret", "/orga");
				redirect($location);
			} else {
				$this->view->set("error", 1);
				$this->session->unset_userdata($this->session_key);
			}
		}
		$this->view->set("username", $username);

		$this->render("orga/login");
	}



	public function logout() {
		$this->session->unset_userdata($this->session_key);
		redirect("/");
	}

	private static function hash_password($password) {
		$hasher = new PasswordHash(12, false);
		return $hasher->HashPassword($password);
	}
}
