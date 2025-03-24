<?php

// Dependencias
require_once '../DAO/Service.php';

class TrophyHunter {

  private $conn;

  public function __construct() {

    $this->conn = new Service();

  }

}