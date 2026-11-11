<?php require_once('./layouts/header.php'); ?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h1 class="mb-4 btn btn-primary"> Users</h1>
  <div class="row mb-12 g-6">
    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <img class="card-img-top" src="<?= asset('assets/img/elements/2.png'); ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h6 class="card-subtitle">Support card subtitle</h6>
        </div>
        <img class="img-fluid" src="<?= asset('assets/img/elements/5.png'); ?>" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
          <a href="javascript:void(0);" class="card-link">Card link</a>
          <a href="javascript:void(0);" class="card-link">Another link</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h6 class="card-subtitle">Support card subtitle</h6>
          <img class="img-fluid d-flex mx-auto my-6 rounded" src="<?= asset('assets/img/elements/4.png'); ?>" alt="Card image cap">
          <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
          <a href="javascript:void(0);" class="card-link">Card link</a>
          <a href="javascript:void(0);" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

<?php require_once('./layouts/footer.php'); ?>