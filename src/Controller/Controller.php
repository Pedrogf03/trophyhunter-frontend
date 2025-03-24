<?php

// Dependencias
require_once '../Model/TrophyHunter.php';
require_once '../config/config.php';

class Controller {
    
  private string $view;
  private TrophyHunter $trophyHunter;
  private string $css;
  private string $title;

  public function __construct() {
    $this->view = constant("DEFAULT_ACTION");
    $this->css = constant("DEFAULT_ACTION");
    $this->title = constant("DEFAULT_TITLE");

    
    $this->trophyHunter = new TrophyHunter();
  }

  public function getView() {
    return $this->view;
  }

}