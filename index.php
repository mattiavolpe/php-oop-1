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

  class Movie {
    public $title;
    public $description;
    public $director;
    public $year;
    public $genre;
    public $duration;
    public $rating;

    public function __construct(string $title, string $description, Director $director, int $year, Genre $genre, int $duration, float $rating) {
      $this -> title = $title;
      $this -> description = $description;
      $this -> director = $director;
      $this -> year = $year;
      $this -> genre = $genre;
      $this -> duration = $duration;
      $this -> rating = $rating;
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

  $titanic = new Movie("Titanic", "101-year-old Rose DeWitt Bukater tells the story of her life aboard the Titanic, 84 years later. A young Rose boards the ship with her mother and fiancé. Meanwhile, Jack Dawson and Fabrizio De Rossi win third-class tickets aboard the ship. Rose tells the whole story from Titanic's departure through to its death—on its first and last voyage—on April 15, 1912.", new Director("James", "Cameron"), 1997, new Genre("Drama"), 194, 7.9);
  $avatar = new Movie("Avatar", "In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.", new Director("James", "Cameron"), 2009, new Genre("Adventure"), 162, 7.6);
  $theImitationGame = new Movie("The Imitation Game", "Based on the real life story of legendary cryptanalyst Alan Turing, the film portrays the nail-biting race against time by Turing and his brilliant team of code-breakers at Britain's top-secret Government Code and Cypher School at Bletchley Park, during the darkest days of World War II.", new Director("Morten", "Tyldum"), 2014, new Genre("History"), 113, 8);
  $inception = new Movie("Inception", "Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person's idea into a target's subconscious.", new Director("Christopher", "Nolan"), 2010, new Genre("Science Fiction"), 148, 8.4);
  
  echo $titanic -> title;
  var_dump($titanic);

  echo $avatar -> title;
  var_dump($avatar);

  echo $theImitationGame -> title;
  var_dump($theImitationGame);

  echo $inception -> title;
  var_dump($inception);
?>