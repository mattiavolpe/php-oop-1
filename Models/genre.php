<?php
  class Genre {
    public $name;
    public $alias;

    public function __construct(string $name) {
      $this -> name = $name;
      if (strlen($name) > 3) {
        $this -> alias = substr($name, 0, 3);
      } else {
        $this -> alias = $name;
      }
    }
  }
