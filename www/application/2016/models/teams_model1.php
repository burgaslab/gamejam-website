<?php

class Teams_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_list() {
		$sql = "SELECT * FROM teams WHERE 1 ORDER BY name";
		$query = $this->db->query($sql);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function get_one($id) {
		$sql = "SELECT * FROM teams WHERE id=?";
		$query = $this->db->query($sql, $id);

		return $query->row();
	}

	public function add($model) {
		$name = $model["name"];
		$game = $model["game"];

		$data = array(
				$name,
				$game,
			);

		$sql = "INSERT INTO teams (name, game) VALUES (?, ?)";
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
					$id
			);

			$sql = "UPDATE teams SET name=?, game=? WHERE id=?";
			$this->db->query($sql, $data);
			return $this->db->affected_rows() == 1;
		}
	}


	public function delete($id) {
		$data = array(
				$id
		);

		$sql = "DELETE FROM teams WHERE id=?";
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