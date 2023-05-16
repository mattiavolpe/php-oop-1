<div class="col">
  <div class="card h-100">
    <div class="card-header p-0">
      <img class="card-img-top" src="<?= $movie -> coverImage ?>" alt="Movie cover image">
    </div>
    <div class="card-body">
      <h4 class="text-center mb-3 fs-2"><?= $movie -> title; ?></h4>
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
