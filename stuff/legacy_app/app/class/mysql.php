<?php

class mysql {

	private $host, $username, $password, $database, $names;
	private $link;
	private $stack = array();

	public $query = '';
	public $errno = 0;
	public $error = '';
	public $log = '';

	const MAX_ROW_INDEX = '18446744073709551615'; // 2^64 - 1
	const CONSOLE_LOG = 'cons';

	public function __construct($host, $username, $password, $database, $names='utf8') {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->names = $names;
	}
	public function __destruct() {
		if ($this->link && $this->link->stat()) {
			$this->close();
		}
	}
	public function __toString() {
		$res = "";
		$res .= "Host: {$this->host}" . PHP_EOL;
		$res .= "Database: {$this->database}" . PHP_EOL;
		$res .= "Status: " . ($this->link->stat() ? "connected" : "closed") . PHP_EOL;
		$res .= "Query count: " . count($this->stack) . PHP_EOL;
		$res .= "Queries: " . var_export($this->stack, true) . PHP_EOL;
		return $res;
	}
	public function __set($name, $val) {
		switch ($name) {
			case 'log': $this->log = $val;
			break;
		}
		// nothing
	}

	public function connect() {
		$this->link = new mysqli($this->host, $this->username, $this->password);

		if ($this->link) {
			$this->select_db();
			if (!empty($this->names)) {
				$this->query("SET NAMES " . $this->names);
			}
		} else {
			$this->errno = $this->link->errno;
			$this->error = $this->link->error;
			throw new exception($this->error, $this->errno);
		}
	}
	public function close() {
		$res = $this->link->close();
		if (!$res) {
			$this->errno = $this->link->errno;
			$this->error = $this->link->error;
			throw new exception($this->error, $this->errno);
		}
	}

	/* internal funcions */
	private function select_db() {
		$res = $this->link->select_db($this->database);
		if (!$res) {
			$this->errno = $this->link->errno;
			$this->error = $this->link->error;
			throw new exception($this->error, $this->errno);
		}
	}
	private function free($result) {
		$res = $result->free();
	}
	private function fetch_data($result, $result_type) {
		$res = array();
		while($row = $result->fetch_array($result_type)) {
			$res[] = $row;
		}
		return $res;
	}
	public function escape($string) {
		return $this->link->escape_string($string);
	}

	/* public query functions */
	public function query($query) {
		$this->query = $query;

		$this->log_query($query);

		$result = $this->link->query($query);

		if ($result) {
			array_push($this->stack, $query);
			return $result;
		} else {
			$this->errno = $this->link->errno;
			$this->error = $this->link->error;
			throw new exception($this->error, $this->errno);
		}
	}
	public function select($query, $result_type = MYSQL_ASSOC) {
		$result = $this->query($query);
		$data = $this->fetch_data($result, $result_type);
		$this->free($result);

		return $data;
	}
	public function select_scalar($query) {
		$result = $this->query($query);

		if ($this->affected_rows()) {
			$scalar = $result->fetch_row();
			if (count($scalar)) {
				$scalar = $scalar[0];
			} else {
				$scalar = null;
			}

			$this->free($result);

			return $scalar;
		} else {
			$this->free($result);

			return null;
		}
	}
	public function insert($table, $data) {
		$columns = array();
		$values = array();

		foreach($data as $column => $value) {
			array_push($columns, '`'.$column.'`');

			if ($value === null) {
				array_push($values, "null");
			} else {
				$value = $this->escape($value);
				array_push($values, "'$value'");
			}
		}

		$columns = implode(', ', $columns);
		$values = implode(', ', $values);
		$query = "INSERT INTO $table ($columns) VALUES ($values);";

		$this->query($query);
	}
	public function update($table, $data, $condition = 1) {
		$statements = array();

		foreach($data as $column => $value) {
			if ($value === null) {
				array_push($statements, "`$column` = null");
			} else {
				$value = $this->escape($value);
				array_push($statements, "`$column` = '$value'");
			}
		}

		$statements = implode(', ', $statements);

		$query = "UPDATE $table SET $statements WHERE $condition";

		$this->query($query);
	}
	public function delete($table, $condition = 1) {
		$query = "DELETE FROM $table WHERE $condition";

		$this->query($query);
	}

	/* public properties */
	public function affected_rows() {
		return $this->link->affected_rows;
	}
	public function insert_id() {
		return $this->link->insert_id;
	}
	public function stack() {
		return $this->stack;
	}

	public function parse_value($value, $type) {
		switch ($type) {
			case 'b': return $value ? 1 : 0;
			case 'i': return intval($value);
			case 'f': return floatval($value);
			case 's': return "'".$this->escape($value)."'";

			default: trigger_error("Unknown type: $type");
		}
	}
	public function parse_array($values, $type) {
		$res = array();
		foreach($values as $value) {
			$res[] = $this->parse_value($value, $type);
		}
		return $res;
	}
	public function parse_order($order) {
		switch ($order) {
			case '+': return 'ASC';
			case '-': return 'DESC';
			case '*': return 'rand()';

			default: trigger_error("Unknown order: $order");
		}
	}
	public function parse_func($func) {
		$func = strtolower($func);
		if (in_array($func, array("count", "min", "max", "sum", "avg"))) {
			return strtoupper($func);
		}
		trigger_error("Function not found: $func");
	}
	public function get_max_row() {
		return self::MAX_ROW_INDEX;
	}
	private function log_query($query) {
		if ($this->log) {
			if ($this->log == self::CONSOLE_LOG) {
				print($query . PHP_EOL);
			} else {
				file_put_contents($this->log, $query . PHP_EOL, FILE_APPEND);
			}
		}
	}
}

