<?php
session_start();
if(!isset($_SESSION['username'])) {
  header('location:sign_in.php');
  die();
}
include '../db.php';
if(isset($_GET['post'])){
    $solution_id = $_GET['post'];
    $query = "SELECT * FROM `solution` s INNER JOIN `users` u WHERE solution_id ='$solution_id' AND s.author = u.id ";
    $result = mysqli_query($conn, $query);
    }else{
        header("Location: ../departments.php");
    }

$msg= '';
$body='';
$username = $_SESSION['username'];
$query2 = "SELECT * FROM users WHERE username ='$username' "; 
$result2 = mysqli_query($conn, $query2); 
$data2 = mysqli_fetch_array($result2); 
$writer_id = $data2['id'];
$level = $data2['level'];
if(isset($_POST['add_comment'])){
    $body=strip_tags($_POST['body']);
    if(empty($body)){
        $msg= '<div class="alert alert-danger">
        Please Do not leave an empty comment!
  </div>';
    }else{
        $insert = mysqli_query($conn, "INSERT INTO `comments` (`writer_id`,`status`,`body`,`solution_id`,`date_created`) 
        VALUES ('$writer_id','Unapproved','$body','$solution_id',NOW())");
        if(isset($insert)){
          $msg='<div class="alert alert-success">
          Comment sent Successfully, and please wait the admin for accept your comment!
  </div>';
          header("refresh:3;url=show_solution.php?post=$solution_id");
        }else{
          $msg='<div class="alert alert-danger">
          Comment error
  </div>';
        }
        }
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
    <title>Show Solution</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets/css/solution-post.css" rel="stylesheet">
  <link href="../assets/css/home_page.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a href="../index.php" class="brand-link">
        <img src="../img/logo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 75px;height: 75px;">
      </a>

  <div class="collapse navbar-collapse" id="Navbar_Menu">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
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
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<?php
    while($row = mysqli_fetch_assoc($result)){
        $title= $row['title'];
        $tools= $row['tools'];
        $post=$row['post'];
        $author=$row['username'];
        $post_date=$row['post_date'];

?>
  <!-- Page Content -->
  <div class="container" style="padding-top: 2%;">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4" style="margin-left: -3px;">Title: <?php echo $row['title'];?></h1>
        <hr>
        <!-- Author -->
        <p class="lead"><b>By : </b><?php echo $row['username'];?></p>

        <hr>

        <!-- Date/Time -->
        <p><b>Date And Time Post : </b><?php echo $row['post_date'];?></p>

        <hr>
        <p><b>Tools : </b><?php echo $row['tools'];?></p>
        <hr>   
        <!-- Post Content -->
        <b>Solution : </b>
        <?php echo $row['post'];?>
        <hr>
<?php
        
    };
?>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group" >
              <?php echo $msg ;?>
                <textarea class="form-control" rows="3" id="body" name="body"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="add_comment" id="add_comment">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->

          <?php
              if($level == '1'){
              $query3 = "SELECT * FROM `comments` c INNER JOIN `users` u WHERE c.solution_id = $solution_id AND c.writer_id = u.id ORDER BY c.date_created DESC"; 
              $result3 = mysqli_query($conn, $query3); 
              while($row =mysqli_fetch_assoc($result3)){
              echo'
              <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
              <h5 class="mt-0">'.$row['username'].'</h5>
              '.$row['body'].'
              </div>
              '.(($level =='1' && $row['status']=='Unapproved') ? '<button type="button" class="btn btn-success btn-sm" style="margin: 10px 10px 10px 10px;">Approved</button>
              <button type="button" class="btn btn-danger btn-sm" style="margin: 10px 10px 10px 10px;">Delete</button>' :'<button type="button" class="btn btn-info btn-sm" style="margin: 10px 10px 10px 10px;">Unapproved</button>
              <button type="button" class="btn btn-danger btn-sm" style="margin: 10px 10px 10px 10px;">Delete</button>').'
              </div>';
            } 
          }else{
            $query3 = "SELECT * FROM `comments` c INNER JOIN `users` u WHERE c.solution_id = $solution_id AND c.writer_id = u.id AND c.status='Approved' ORDER BY c.date_created DESC"; 
            $result3 = mysqli_query($conn, $query3); 
            while($row =mysqli_fetch_assoc($result3)){
            echo'
            <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
            <h5 class="mt-0">'.$row['username'].'</h5>
            '.$row['body'].'
            </div>
            '.(($row['username'] == $username && $row['status']=='Approved') ? '<button type="button" class="btn btn-secondary btn-sm" style="margin: 10px 10px 10px 10px;">Edit</button>
            <button type="button" class="btn btn-danger btn-sm" style="margin: 10px 10px 10px 10px;">Delete</button>' :"").'
            </div>';
             }     
          }
   
          ?>

      </div>

    </div>
    <!-- /.row -->

  </div>




  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>




