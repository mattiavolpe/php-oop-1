<?php
  class Director {
    public $name;
    public $lastName;

    public function __construct(string $name, string $lastName) {
      $this -> name = $name;
      $this -> lastName = $lastName;
    }
  }
