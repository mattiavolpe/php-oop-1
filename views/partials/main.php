<main id="app_main" class="py-5">
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php foreach($movies as $movie) : ?>
        <?php include __DIR__ . "/movie.php" ?>
      <?php endforeach ?>
    </div>
  </div>
  <!-- /.container -->
</main>
<!-- /#app_main -->
