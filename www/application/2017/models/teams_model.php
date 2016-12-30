<?php

class Teams_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_list($skip_id=0) {
		$sql = "SELECT * FROM teams WHERE id!=? AND year=? ORDER BY name";
		$query = $this->db->query($sql, array($skip_id, conf("year")));

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function get_one($id) {
		$sql = "SELECT * FROM teams WHERE id=? AND year=?";
		$query = $this->db->query($sql, array($id, conf("year")));

		return $query->row();
	}

	public function add($model) {
		$name = $model["name"];
		$game = $model["game"];

		$data = array(
				conf("year"),
				$name,
				$game,
			);

		$sql = "INSERT INTO teams (year, name, game) VALUES (?, ?, ?)";
		$this->db->query($sql, $data);
	}

	public function update($id, $model) {
		$current = $this->get_one($id);
		if ($current) {
			$name = $model["name"];
			$game = $model["game"];

			$data = array(
					$name,
					$game,
					$id,
					conf("year"),
			);

			$sql = "UPDATE teams SET name=?, game=? WHERE id=? AND year=?";
			$this->db->query($sql, $data);
			return $this->db->affected_rows() == 1;
		}
	}


	public function delete($id) {
		$data = array(
				$id,
				conf("year"),
		);

		$sql = "DELETE FROM teams WHERE id=? AND year=?";
		$this->db->query($sql, $data);
		return $this->db->affected_rows() == 1;
	}

	public function validate($id, $data) {
		$res = new validator();

		$res->validate_required("name", $data["name"], "Невалидно име");
		$res->validate_required("game", $data["game"], "Невалидно име на игра");
		return $res;
	}
}