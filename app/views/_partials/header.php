<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/vendor/sweetalert2js/sweetalert2.min.css">
    <title><?= $data['title'] .' - '. $data['sub_title'] ?></title>
  </head>
  <body>
  <div class="row justify-content-center">
    <div class="col-lg-7">
    <!-- Nav -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2 border-0" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn btn-secondary my-2 my-sm-0 rounded-circle btn-sm" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Nav -->