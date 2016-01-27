<?php

class Votes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	private function category($category) {
		$where = 1;
		$params = array($category);

		if ($category !== null) {
			$where = "category=?";
		}

		$sql = "SELECT COUNT(1) AS `count`, B.name, B.game FROM votes A JOIN teams B ON (A.team_id=B.id) WHERE {$where} GROUP BY B.id ORDER BY `count` DESC";

		$query = $this->db->query($sql, $params);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function categories() {
		$sql = "SELECT * FROM categories";

		$query = $this->db->query($sql);
		$cats = array();

		foreach ($query->result() as $row) {
			$cats[] = $row;
		}

		$query->free_result();

		$res = array();

		foreach ($cats as $c) {
			$standing = $this->category($c->name);

			$res[] = (object)array(
				"name" => $c->name,
				"desc" => $c->desc,
				"standing" => $standing,
			);
		}

		return $res;
	}

	public function general() {
		return $this->category(null);
	}
}