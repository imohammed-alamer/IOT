<?php
session_start();
if(!isset($_SESSION['username'])) {
  header('location:sign_in.php');
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mohammed">
    <meta name="generator" content="v1.0.0">
    <title>Departments | Welcome</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Bootstrap core CSS -->

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/album.css" rel="stylesheet">
<link href="assets/css/home_page.css" rel="stylesheet">

  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a href="index.php" class="brand-link">
        <img src="img/logo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 75px;height: 75px;">
      </a>

  <div class="collapse navbar-collapse" id="Navbar_Menu">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">IOT Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Do-it-Yourself</a>
      </li>
    </ul>
  </div>

  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>


<section class="jumbotron text-center">
    <div class="container">
      <h1>Departments</h1>
      <h5>Welcome, <?= $_SESSION['username']?></h5>
    </div>
  </section>

      <div class="container" id="iconss">
          <div class="row row-cols-3">
              <div class="col">
                  <a href="electricity.php">
                      <img id="myImg" src="img/electricity.png"  alt="electricity" style="max-width:110px ">
                  </a>
              </div>
              <div class="col">
                  <a href="add_employee.php">
                      <img id="myImg" src="img/plumbing.png"  alt="plumbing" style="max-width:110px ">
                  </a>
              </div>
              <div class="col">
                  <a href="tran_out.php">
                      <img id="myImg" src="img/appliances.png"  alt="appliances" style="max-width:110px ">
                  </a>
              </div>
          </div>
      </div>
</body>

</html>