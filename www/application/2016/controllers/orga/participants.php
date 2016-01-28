<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("auth.php");

class Participants extends Auth {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model("Participants_model");
		$this->load->model("Teams_model");

		$this->classloader->load("common", "Validator");

		$this->view->set("opt_bool", conf("opt_bool"));
		$this->view->set("age_groups", conf("age_groups"));
		$this->view->set("occupations", conf("occupations"));
		$this->view->set("teams", $this->Teams_model->get_list());
		$this->view->set("current_path", $this->path->base . trim(strtok($this->path->current, "?") , "/"));
	}

	public function index() {

		$filter = array(
			"term" => "",
			"confirmed" => -1,
			"team_id" => 0,
		);
		$filter = array_merge($filter, (array)$this->input->get());

		$term = $filter["term"];
		$confirmed = $filter["confirmed"] == -1 ? null : $filter["confirmed"];
		$team_id = $filter["team_id"];

		$list = $this->Participants_model->get_list($term, $confirmed, $team_id);

		$this->view->set("list", $list);
		$this->view->set("filter", $filter);

		$this->render("orga/participants");
	}


	private function render_one($id, $mode) {
		$item = $this->Participants_model->get_one($id);

		if ($item) {
			$this->view->set("item", $item);
			return $this->view->result("orga/participant-row-{$mode}", true);
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

			$validator = $this->Participants_model->validate($id, $model);
			if ($validator->is_valid()) {
				$this->Participants_model->update($id, $model);
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

			$validator = $this->Participants_model->validate(0, $model);
			if ($validator->is_valid()) {
				$this->Participants_model->add($model);
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

			$res = $this->Participants_model->delete($id);
			$this->json_response($res);
		}
	}
}
