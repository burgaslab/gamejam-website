<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Teams extends Auth {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Teams_model");

		$this->classloader->load("common", "Validator");

		$this->view->set("current_path", $this->path->base . trim(strtok($this->path->current, "?") , "/"));
	}

	public function index() {
		$list = $this->Teams_model->get_list();

		$this->view->set("list", $list);

		$this->render("orga/teams");
	}


	private function render_one($id, $mode) {
		$item = $this->Teams_model->get_one($id);

		if ($item) {
			$this->view->set("item", $item);
			return $this->view->result("orga/team-row-{$mode}", true);
		}
		return "";
	}

	public function edit() {
		if ($this->input->is_ajax_request()) {
			$id = _post("id");

			$this->json_response($this->render_one($id, "edit"));
		}
	}

	public function cancel() {
		if ($this->input->is_ajax_request()) {
			$id = _post("id");

			$this->json_response($this->render_one($id, "view"));
		}
	}

	public function save() {
		if ($this->input->is_ajax_request()) {
			$model = $this->input->post();

			$id = arr($model, "id");

			$validator = $this->Teams_model->validate($id, $model);
			if ($validator->is_valid()) {
				$this->Teams_model->update($id, $model);
				$res = array(
					"success" => true,
					"data" => $this->render_one($id, "view"),
				);

			} else {
				$res = array(
					"success" => false,
					"data" => $validator->get_errors(),
				);
			}
			$this->json_response($res);

		}
	}

	public function add() {
		if ($this->input->is_ajax_request()) {
			$model = $this->input->post();

			$validator = $this->Teams_model->validate(0, $model);
			if ($validator->is_valid()) {
				$this->Teams_model->add($model);
				$res = array(
						"success" => true,
				);

			} else {
				$res = array(
						"success" => false,
						"data" => $validator->get_errors(),
				);
			}
			$this->json_response($res);

		}
	}

	public function delete() {
		if ($this->input->is_ajax_request()) {
			$id = _post("id");

			$res = $this->Teams_model->delete($id);
			$this->json_response($res);
		}
	}
}
