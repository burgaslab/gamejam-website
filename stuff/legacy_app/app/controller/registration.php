<?php
	$conf = require_once("app/config/mysql.php");
	require_once("app/class/mysql.php");
	require_once("app/class/validator.php");

	session_start();
	
	define("STATUS_KEY", "REG_STATUS");
	
	$is_success = isset($_SESSION[STATUS_KEY]);
	unset($_SESSION[STATUS_KEY]);
	
	$mysql = new mysql($conf["host"], $conf["username"], $conf["password"], $conf["database"]);
	$mysql->connect();
	
	$model = array("name"=>"", "email"=>"", "age"=>"", "occupation"=>"", "skills"=>"", "agree"=>"");
	$model = array_merge($model, $_POST);
	
	
	$age = array("12-16г.", "17-18г.", "18г.+");
	$occupation = array("ученик", "студент", "работещ", "безработен");
	$validator = new validator();
	
	if ($_POST) {
		$validator->validate_required("name", $model["name"], 1);
		$validator->validate_email("email", $model["email"], 1);
		
		$query = sprintf("SELECT 1 FROM participants WHERE email='%s'", $mysql->escape($model["email"]));
		if ($mysql->select_scalar($query)) {
			$validator->add_error("email", "1");
		}
		
		if (!in_array($model["age"], $age)) {
			$validator->add_error("age", 1);
		}
		if (!in_array($model["occupation"], $occupation)) {
			$validator->add_error("occupation", 1);
		}
		$validator->validate_required("agree", $model["agree"], 1);
		
		if ($validator->is_valid()) {
			$data = array(
				"name" => $model["name"],
				"email" => $model["email"],
				"age" => $model["age"],
				"occupation" => $model["occupation"],
				"skills" => $model["skills"],
			);
			$mysql->insert("participants", $data);
			
			$_SESSION[STATUS_KEY] = 1;
			header("Location: ".$_SERVER["REQUEST_URI"]);
		}
	}