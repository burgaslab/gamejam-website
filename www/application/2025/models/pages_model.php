<?php

class Pages_model extends CI_Model {

	public function get_all($year) {
		$sql = "SELECT * FROM pages WHERE year=? ORDER BY title";
		$query = $this->db->query($sql, $year);

		$res = array();

		foreach ($query->result() as $row) {
			$res[] = (object)array(
				"name" => $row->name,
				"title" => $row->title,
			);
		}

		$query->free_result();

		return $res;
	}

	public function get_one($year, $name) {
		$sql = "SELECT * FROM pages WHERE year=? AND name=?";
		$query = $this->db->query($sql, array($year, $name));

		$res = null;

		$row = $query->row();
		if ($row) {
			$res = (object)array(
				"name" => $row->name,
				"title" => $row->title,
				"text" => $row->text,
			);
		}

		$query->free_result();

		return $res;
	}

	public function update($year, $name, $title, $text) {
		$sql = "UPDATE pages SET title=?, text=? WHERE year=? AND name=?";
		$query = $this->db->query($sql, array($title, $text, $year, $name));
	}
}