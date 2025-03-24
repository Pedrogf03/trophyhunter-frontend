<?php

// Dependencias
require_once '../DAO/DataBase.php';

class TrophyHunter {

  private $conn;

  public function __construct() {

    $this->conn = new DataBase()->conn;

  }

}