<?php
  class Movie {
    public $title;
    public $description;
    public $director;
    public $year;
    public $genre;
    public $duration;
    public $rating;
    public $coverImage;

    public function __construct(string $title, string $description, Director $director, int $year, Genre $genre, int $duration, float $rating, string $image) {
      $this -> title = $title;
      $this -> description = $description;
      $this -> director = $director;
      $this -> year = $year;
      $this -> genre = $genre;
      $this -> duration = $duration;
      $this -> rating = $rating;
      $this -> coverImage = $image;
    }

    public function changeRatingBase($rating, $base) {
      return round($rating * $base / 10);
    }
  }
