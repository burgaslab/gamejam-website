<?php

class Votes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	private function category($category_id, $which) {
		$where = "B.year=?";
		$params = array(conf("year"), $category_id);

		if ($category_id !== null) {
			$where .= " AND category_id=?";
		}
		
		if ($which == "participants") {
			$where .= " AND C.participant_id IS NOT NULL";
		} else {
			$where .= " AND C.participant_id IS NULL";
		}

		$sql = "SELECT COUNT(1) AS `count`, B.name, B.game FROM votes A JOIN teams B ON (A.team_id=B.id) JOIN codes C ON (A.code_id=C.id) WHERE {$where} GROUP BY B.id ORDER BY `count` DESC";

		$query = $this->db->query($sql, $params);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function get_categories() {
		$sql = "SELECT * FROM categories WHERE year=?";
		$params = array(conf("year"));

		$query = $this->db->query($sql, $params);
		$cats = array();

		foreach ($query->result() as $row) {
			$cats[] = $row;
		}

		$query->free_result();

		return $cats;
	}

	public function categories_votes() {
		$cats = $this->get_categories();

		$res = array();

		foreach ($cats as $c) {
			$standing = $this->category($c->id, "participants");

			$res[] = (object)array(
				"name" => $c->name,
				"desc" => $c->desc,
				"standing" => $standing,
			);
		}

		return $res;
	}

	public function general() {
		return $this->category(null, "participants");
	}

	public function audience() {
		return $this->category(null, "audience");
	}

	private function get_code_id($code, $is_reserved) {
		$sql = "SELECT id FROM codes WHERE code=? AND is_reserved=? AND time_vote IS NULL AND year=?";
		$params = array($code, $is_reserved, conf("year"));
		$query = $this->db->query($sql, $params);
		$res = $query->row_array();

		return reset($res);
	}

	public function validate($data, $categories, $teams, $team_id) {
		$res = new validator();

		$code = str_replace(' ', '', $data["code"]);
		$is_reserved = $team_id ? true : false;
		if (!$this->get_code_id($code, $is_reserved)) {
			$res->add_error("code", "Невалиден код или кодът е използван");
		}

		foreach ($categories as $c) {
			$found = false;
			foreach ($teams as $t) {
				if ($t->id == $data["category"][$c->id]) {
					$found = true;
					break;
				}
			}

			if (!$found) {
				$res->add_error($c->id, "Невалиден избор");
			}
		}

		return $res;
	}


	public function add($data, $categories, $team_id) {
		$code = $string = str_replace(' ', '', $data["code"]);
		$is_reserved = $team_id ? true : false;
		$code_id = $this->get_code_id($code, $is_reserved);

		assert($code_id);

		$sql = "INSERT INTO votes (code_id, category_id, team_id) VALUES (?, ?, ?)";
		foreach ($categories as $c) {
			$params = array($code_id, $c->id, $data["category"][$c->id]);
			$this->db->query($sql, $params);
		}

		$sql = "UPDATE codes SET time_vote=? WHERE id=? AND year=?";
		$params = array(date("Y-m-d H:i:s"), $code_id, conf("year"));
		$this->db->query($sql, $params);
	}
}