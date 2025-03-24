<?php

class DataBase {

	private $host;
	private $db;
	private $user;
	private $pass;
	public $conn;

	public function __construct(){

		$this->host = constant('DB_HOST');
		$this->db = constant('DB_NAME');
		$this->user = constant('DB_USER');
		$this->pass = constant('DB_PASS');

		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
		mysqli_set_charset($this->conn, "utf8");

		if ($this->conn->connect_error) {
			die("Fallo en la conexión " . $this->conn->connect_error);
		}
	}

}