<?php
  /* 
  Oggi pomeriggio ripassate i primi concetti di classe, variabili e metodi d'istanza che abbiamo visto stamattina e create un file index.php in cui:
  è definita una classe ‘Movie’
  all'interno della classe sono dichiarate delle variabili d'istanza
  all'interno della classe è definito un costruttore
  all'interno della classe è definito almeno un metodo
  vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà.
  Tra le varie proprietá, la classe Movie 'ha un' genere (sfruttare il concetto di composizione).

  Bonus 1:
  Creare un layout completo per stampare a schermo una lista di movies.
  Facciamo attenzione all’organizzazione del codice, suddividendolo in appositi file e cartelle.
  Possiamo ad esempio organizzare il codice:
  creando un file dedicato ai dati (tipo le array di oggetti) che potremmo chiamare db.php
  mettendo ciascuna classe nel proprio file e magari raggruppare tutte le classi in una cartella dedicata che possiamo chiamare Models/
  organizzando il layout dividendo la struttura ed i contenuti in file e parziali dedicati.

  Bonus 2 (opzionale)
  Modificare la classe Movie in modo che accetti piú di un genere.
  */

  $ratingBase = 10;

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

  class Director {
    public $name;
    public $lastName;

    public function __construct(string $name, string $lastName) {
      $this -> name = $name;
      $this -> lastName = $lastName;
    }
  }

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

  $movies = [
    new Movie("Titanic", "101-year-old Rose DeWitt Bukater tells the story of her life aboard the Titanic, 84 years later. A young Rose boards the ship with her mother and fiancé. Meanwhile, Jack Dawson and Fabrizio De Rossi win third-class tickets aboard the ship. Rose tells the whole story from Titanic's departure through to its death—on its first and last voyage—on April 15, 1912.", new Director("James", "Cameron"), 1997, new Genre("Drama"), 194, 7.9, "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg"),
    new Movie("Avatar", "In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.", new Director("James", "Cameron"), 2009, new Genre("Adventure"), 162, 7.6, "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg"),
    new Movie("The Imitation Game", "Based on the real life story of legendary cryptanalyst Alan Turing, the film portrays the nail-biting race against time by Turing and his brilliant team of code-breakers at Britain's top-secret Government Code and Cypher School at Bletchley Park, during the darkest days of World War II.", new Director("Morten", "Tyldum"), 2014, new Genre("History"), 113, 8, "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/zSqJ1qFq8NXFfi7JeIYMlzyR0dx.jpg"),
    new Movie("Inception", "Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person's idea into a target's subconscious.", new Director("Christopher", "Nolan"), 2010, new Genre("Science Fiction"), 148, 8.4, "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/edv5CZvWj09upOsy2Y6IwDhK8bt.jpg")
  ];
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- EXTERNAL BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Movies</title>
  </head>
  
  <body>
    
    <header id="app_header">

    </header>
    <!-- /#app_header -->

    <main id="app_main" class="py-5">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          <?php foreach($movies as $movie) : ?>
          <div class="col">
            <div class="card h-100">
              <div class="card-header p-0">
                <img class="card-img-top" src="<?= $movie -> coverImage ?>" alt="Movie cover image">
              </div>
              <div class="card-body">
                <h4 class="text-center"><?= $movie -> title; ?></h4>
                <h6 class="d-inline text-warning">Description: </h6>
                <span><?= $movie -> description; ?></span>
                <br>
                <br>
                <h6 class="d-inline text-warning">Director: </h6>
                <span><?= $movie -> director -> name . " " . $movie -> director -> lastName; ?></span>
                <br>
                <h6 class="d-inline text-warning">Year: </h6>
                <span><?= $movie -> year; ?></span>
                <br>
                <h6 class="d-inline text-warning">Genre: </h6>
                <span><?= $movie -> genre -> name; ?></span>
                <br>
                <h6 class="d-inline text-warning">Duration: </h6>
                <span><?= $movie -> duration . " mins"; ?></span>
              </div>
              <div class="card-footer">
                <?php if ($movie -> rating >= 6) : ?>
                <h6 class="d-inline text-success">Rating: </h6>
                <?php else : ?>
                <h6 class="d-inline text-danger">Rating: </h6>
                <?php endif ?>
                <span><?= $movie -> rating . " / " . $ratingBase; ?></span>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <!-- /.container -->
    </main>
    <!-- /#app_main -->

    <footer id="app_footer">

    </footer>
    <!-- /#app_footer -->
    
  </body>
  
</html>