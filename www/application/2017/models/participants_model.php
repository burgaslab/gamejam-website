<?php

class Participants_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_list($term, $confirmed, $team_id) {
		$where = array("A.year=?");
		$params = array(conf("year"));
		if ($term) {
			$where[] = "(A.name LIKE ? OR email LIKE ? OR age LIKE ? OR occupation LIKE ? OR skills LIKE ?)";
			$term = "%{$term}%";
			$params[] = $term;
			$params[] = $term;
			$params[] = $term;
			$params[] = $term;
			$params[] = $term;
		}

		if ($confirmed !== null) {
			if ($confirmed) {
				$where[] = "time_confirmed IS NOT NULL";
			} else {
				$where[] = "time_confirmed IS NULL";
			}
		}

		if ($team_id) {
			$where[] = "team_id=?";
			$params[] = $team_id;
		}

		$where = implode(" AND ", $where);

		$sql = "SELECT A.*, B.name team_name, B.game FROM participants A LEFT JOIN teams B ON (A.team_id=B.id) WHERE {$where} ORDER BY name";
		$query = $this->db->query($sql, $params);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function get_one($id) {
		$sql = "SELECT A.*, B.name team_name, B.game FROM participants A LEFT JOIN teams B ON (A.team_id=B.id) WHERE A.id=? AND A.year=?";
		$query = $this->db->query($sql, array($id, conf("year")));

		return $query->row();
	}

	public function add($model) {
		$name = $model["name"];
		$email = $model["email"];
		$age = $model["age"];
		$occupation = $model["occupation"];
		$skills = $model["skills"];
		$team_id = arr($model, "team_id");
		$team_id = $team_id ? $team_id : null;
		$time_confirmed = ($team_id ? date("Y-m-d H:i:s") : null);

		$data = array(
				conf("year"),
				$name,
				$email,
				$age,
				$occupation,
				$skills,
				$time_confirmed,
				$team_id,
			);

		$sql = "INSERT INTO participants (year, name, email, age, occupation, skills, time_confirmed, team_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, $data);
	}

	public function check_email($id, $email) {
		$sql = "SELECT 1 FROM participants WHERE id!=? AND email=? AND year=?";
		$query = $this->db->query($sql, array($id, $email, conf("year")));
		return !$query->result();
	}

	public function update($id, $model) {
		$current = $this->get_one($id);
		if ($current) {
			$name = $model["name"];
			$email = $model["email"];
			$age = $model["age"];
			$occupation = $model["occupation"];
			$skills = $model["skills"];

			$team_id = $model["team_id"];
			$team_id = $team_id ? $team_id : null;

			$time_confirmed = $current->time_confirmed;
			if ($team_id && !$time_confirmed) {
				$time_confirmed = date("Y-m-d H:i:s");
			} else if (!$team_id) {
				$time_confirmed = null;
			}

			$data = array(
					$name,
					$email,
					$age,
					$occupation,
					$skills,
					$time_confirmed,
					$team_id,
					$id,
					conf("year"),
			);

			$sql = "UPDATE participants SET name=?, email=?, age=?, occupation=?, skills=?, time_confirmed=?, team_id=? WHERE id=? AND year=?";
			$this->db->query($sql, $data);
			return $this->db->affected_rows() == 1;
		}
	}


	public function delete($id) {
		$data = array(
				$id,
				conf("year"),
		);

		$sql = "DELETE FROM participants WHERE id=? AND year=?";
		$this->db->query($sql, $data);
		return $this->db->affected_rows() == 1;
	}

	public function validate($id, $data) {
		$res = new validator();

		$res->validate_required("name", $data["name"], "Невалидно име");
		$res->validate_email("email", $data["email"], "Невалиден имейл");

		if (!$this->check_email($id, $data["email"])) {
			$res->add_error("email", "Имейлът е използван за регистрация");
		}
		if ($data["age"]*1<18) {
			$res->add_error("age", "Събитието е достъпно само за пълнолетни");
		}
		if (!in_array($data["occupation"], conf("occupations"))) {
			$res->add_error("occupation", "Невалидна заетост");
		}
		return $res;
	}
}