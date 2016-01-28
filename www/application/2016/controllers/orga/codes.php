<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Codes extends Auth {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Codes_model");

		$this->view->set("current_path", $this->path->base . trim(strtok($this->path->current, "?") , "/"));
	}

	public function index() {
		$this->view->set("normal_count", $this->Codes_model->count(0));
		$this->view->set("reserved_count", $this->Codes_model->count(1));

		$action = $this->input->post("action");

		switch ($action) {
			case "generate":
				$this->generate();
				break;
			case "clear":
				$this->clear();
				break;
			case "export":
				$this->export();
				break;
			case "assign":
				$this->assign();
				break;
			case "list":
				$this->_list();
				break;
			case "send":
				$this->send();
				break;
			case "test_email":
				$this->test_email();
				break;
		}

		$this->render("orga/codes");
	}


	private function generate() {
		if ($this->Codes_model->can_generate()) {
			$this->Codes_model->generate(500, 100);
			redirect(current_url());
		} else {
			$this->view->set("error", "Кодовете вече са генерирани.");
		}
	}

	private function clear() {
		if ($this->Codes_model->can_delete()) {
			$this->Codes_model->delete();
			redirect(current_url());
		} else {
			$this->view->set("error", "Вече има гласове.");
		}
	}

	private function export() {
		$this->load->helper("download");

		$list = $this->Codes_model->get_list(0);
		$codes = array();
		foreach ($list as $i) {
			$codes[] = self::format_code($i->code);
		}
		$codes = implode("\n", $codes);
		force_download("codes.txt", $codes);
	}

	private function assign() {
		if ($this->Codes_model->can_assign()) {
			$this->Codes_model->assign();
			redirect(current_url());
		} else {
			$this->view->set("error", "Кодовете вече са зачислени.");
		}
	}

	private function _list() {
		$this->view->set("list", $this->Codes_model->get_participants());
	}

	private function send() {
		$list = $this->Codes_model->get_participants();

		$this->load->config("email");
		$this->load->library("email");

		foreach ($list as $i) {
			$view_model = array(
				"url" => $i["url"],
				"name" => $i["name"],
			);

			$body = $this->view->result("orga/vote_email", true, $view_model);

			$this->send_email("Гласувайте за най-добра игра на Burgas Game Jam 2016", $body, $i["email"]);
		}
	}

	private static function format_code($code) {
		return substr_replace($code, " ", strlen($code) / 2, 0);
	}


	private function send_email($subject, $message, $recipient, $sender="", $format="") {
		$config = config_item("email");
		$config["mailtype"] = ($format == "text" ? "text" : "html");

		$sender = ($sender ? $sender : $config["default_sender"]);

		$this->email->initialize($config);

		$this->email->to($recipient);
		$this->email->from($sender);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}

	private function test_email() {
		$this->load->config("email");
		$this->load->library("email");
		$view_model = array(
				"url" => "http://gamejam.burgaslab.org",
				"name" => "Ivan",
		);

		$body = $this->view->result("orga/vote_email", true, $view_model);

		$this->send_email("Гласувайте за най-добра игра на Burgas Game Jam 2016", $body, "@");
		exit;
	}
}
