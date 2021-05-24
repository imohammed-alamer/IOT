<?php
session_start();
if(!isset($_SESSION['username'])) {
  header('location:sign_in.php');
  die();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mohammed">
    <meta name="generator" content="v1.0.0">
    <title>Electricity Services</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
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




<div class="container" style="margin-top: 3%;">

  <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Request a Solution</a>
                        <a class="dropdown-item" href="electricity/add_solution.php">Add Solution</a>
                    </div>
                </div>
            </li>
            </ul>
        </div>
        <div class="card-body" style="display: block;height: 600px;overflow-y: scroll;scroll-behavior: smooth;">
        <ul class="list-unstyled">
        <?php
        $query = "SELECT * FROM `solution` s INNER JOIN `users` u WHERE s.author = u.id ORDER BY `solution_id` DESC"; 
        $result = mysqli_query($conn, $query); 
        while($post =mysqli_fetch_assoc($result)){
        echo '<li class="media">
                <img src="img/person.png" class="mr-3" alt="person">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><a href="electricity/show_solution.php?post='.$post['solution_id'].'">'.$post['title'].'</a></h5>
                        '.strip_tags(substr($post['post'],0,40)).'
                        <footer class="blockquote-footer">Date & Time : '.$post['post_date'].'<cite title="Source Title"> | Author : '.$post['username'].' | Solution</cite></footer>
                    </div>
             </li>
            <hr>';
           }
           
            ?>
            </ul>
        </div>
        </div>
    </div>

  </div>
</div>




        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>