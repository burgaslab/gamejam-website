<?php

class Settings_model extends CI_Model {

	public function get_all() {
		$sql = "SELECT * FROM settings ORDER BY id";
		$query = $this->db->query($sql);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = (object)array(
				"id" => $row->id,
				"name" => $row->name,
				"desc" => $row->desc,
				"value" => json_decode($row->value),
			);
		}

		$query->free_result();

		return $res;
	}

	public function update($model) {
		$sql = "UPDATE settings SET value=? WHERE id=?";

		foreach ($model as $id=>$value) {
			$params = array(json_encode($value), $id);

			$query = $this->db->query($sql, $params);
		}
	}

	public function get_value($name) {
		$sql = "SELECT value FROM settings WHERE name=?";
		$query = $this->db->query($sql, $name);
		$res = $query->row();
		return json_decode($res->value);
	}
}