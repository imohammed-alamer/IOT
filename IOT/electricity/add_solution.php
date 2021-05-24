<?php
session_start();
if(!isset($_SESSION['username'])) {
  header('location:sign_in.php');
  die();
}
include '../db.php';
$msg= '';
$title='';
$tools='';
$post='';
$dep_id='1';
$username = $_SESSION['username'];
$query2 = "SELECT * FROM users WHERE username ='$username' "; 
$result2 = mysqli_query($conn, $query2); 
$data2 = mysqli_fetch_array($result2); 
$author = $data2['id'];
if(isset($_POST['add'])){
    $title=strip_tags($_POST['title']);
    $tools=strip_tags($_POST['tools']);
    $post=$_POST['post'];
    if(empty($title)){
        $msg= '<div class="alert alert-danger">
        Please Write The Title For Your Solution!
  </div>';
    }elseif(empty($tools)){
        $msg= '<div class="alert alert-danger">
        Please Write Tools For Your Solution!
  </div>'; 
    }elseif(empty($post)){
        $msg= '<div class="alert alert-danger">
        Please Write Your Solution!
  </div>'; 
    }else{
        $insert = mysqli_query($conn, "INSERT INTO `solution` (`title`,`tools`,`post`,`author`,`dep_id`,`post_date`) 
        VALUES ('$title','$tools','$post','$author','$dep_id',NOW())");
        if(isset($insert)){
          $msg='<div class="alert alert-success">
          Addtion Successful!
  </div>';
          header("refresh:2;url=../electricity.php");
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
    <title>Add Solution</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/2y1247zlwun2qx7keegmdqjzy8za4hpkc2jkd71wbyarosfu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/album.css" rel="stylesheet">
    <link href="../assets/css/home_page.css" rel="stylesheet">

  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a href="index.php" class="brand-link">
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




<div class="container" style="margin-top: 3%;">

  <div class="row">
    <div class="col-12">
        <div class="card">
        <h5 class="card-header">Add Solution</h5>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
            <?php echo $msg ;?>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $title;?>">
                </div>
                <div class="form-group col-md-6">
                <label for="tools">Tools</label>
                <input type="text" class="form-control" name="tools" id="tools" value="<?php echo $tools;?>">
                </div>
            </div>
                 <label for="post">Your Solution</label>
                <textarea rows="15" name="post" id="post"><?php echo $post;?></textarea>
                <script>
                    tinymce.init({
                    selector: 'textarea',
                    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    });
                </script>
                <br>
            <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
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