<?php

class Codes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function count($reserved) {
		$where = 1;
		$params = array($reserved);

		if ($reserved !== null) {
			$where = "is_reserved=?";
		}

		$sql = "SELECT COUNT(1) FROM codes WHERE {$where}";

		$query = $this->db->query($sql, $params);

		$res = $query->row_array();

		$query->free_result();

		return reset($res);
	}

	public function can_generate() {
		return $this->count(null) == 0;
	}

	public function can_delete() {
		$sql = "SELECT COUNT(1) FROM votes";

		$query = $this->db->query($sql);

		$res = $query->row_array();

		$query->free_result();

		$count = reset($res);

		return $count == 0;
	}

	public function can_assign() {
		$sql = "SELECT COUNT(1) FROM participants A JOIN codes B ON (A.id=B.participant_id) WHERE A.team_id IS NOT NULL AND is_reserved=1";

		$query = $this->db->query($sql);

		$res = $query->row_array();

		$query->free_result();

		$count = reset($res);

		return $count == 0;
	}

	public function generate($normal, $reserved) {
		$total = $normal + $reserved;


		if ($total > 10000) {
			return;
		}

		$codes = array();
		for ($i = 0; $i < $total; $i++) {
			$code = str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT);

			if (in_array($code, $codes)) {
				$i--;
			} else {
				$codes[] = $code;
			}
		}

		assert(count($codes) == $total);

		$sql = "INSERT INTO codes (code, is_reserved) VALUES (?, ?)";

		for ($i = 0; $i < $total; $i++) {
			$data = array(
					$codes[$i],
					$i < $normal ? 0 : 1,
			);

			$this->db->query($sql, $data);
		}
	}

	public function delete() {
		$sql = "DELETE FROM codes";
		$this->db->query($sql);
	}

	public function get_list($reserved, $order="code") {
		$where = 1;
		$params = array($reserved);

		if ($reserved !== null) {
			$where = "is_reserved=?";
		}

		$sql = "SELECT * FROM codes WHERE {$where} ORDER BY {$order}";
		$query = $this->db->query($sql, $params);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = $row;
		}

		$query->free_result();

		return $res;
	}

	public function assign() {
		$sql = "SELECT * FROM participants WHERE team_id IS NOT NULL";
		$query = $this->db->query($sql);
		$participants = array();

		foreach ($query->result() as $row) {
			$participants[] = $row;
		}

		$query->free_result();

		$codes = $this->get_list(1, "id");

		assert(count($participants) < count($codes));

		$sql = "UPDATE codes SET participant_id=? WHERE id=?";
		for ($i = 0; $i < count($participants); $i++) {
			$data = array(
					$participants[$i]->id,
					$codes[$i]->id,
			);

			$this->db->query($sql, $data);
		}
	}

	public function get_participants() {
		// getting list
		$sql = "SELECT A.id, A.name, A.email, A.team_id, B.code, B.time_vote, C.name team_name, C.game FROM participants A JOIN codes B ON (A.id=B.participant_id) JOIN teams C ON (A.team_id=C.id) WHERE A.team_id IS NOT NULL AND is_reserved=1";
		$query = $this->db->query($sql);

		$res = array();

		$key = conf("encryption_key");

		foreach ($query->result() as $row) {
			$data = array(
					"participant_id" => $row->id,
					"team_id" => $row->team_id,
					"code" => $row->code,
			);

			$data = json_encode($data);
			$data = data_encrypt($data, $key);
			$data = base64_encode_urlsafe($data);

			$res[] = array(
					"id" => $row->id,
					"name" => $row->name,
					"email" => $row->email,
					"team_id" => $row->team_id,
					"code" => $row->code,
					"team_name" => $row->team_name,
					"game" => $row->game,
					"time_vote" => $row->time_vote,
					"url" => $this->path->http_base . "vote?" . $data,
			);
		}

		$query->free_result();

		return $res;
	}
}