<?php
  class Genre {
    public $name = [];

    public function __construct(array $singleGenre) {
      foreach ($singleGenre as $key => $item) {
        array_push($this -> name, [
          "genre".$key => $item
        ]);
      }
    }
  }
