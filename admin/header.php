<?php
  
  session_start();

  include 'db.php'; 
  
  if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    
      $get_email = $_SESSION['email'];
      $get_password = $_SESSION['password'];

      $query = "SELECT * FROM users WHERE email ='$get_email' AND password ='$get_password'";

      if($result = mysqli_query($link, $query)){
          
          if(mysqli_num_rows($result) > 0){
             
            }else{

                header('Location:/cms/index.php');
              }
      }

  }else{

        header('Location:/cms/index.php');
        }




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <!--tinyMCE
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>-->

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>CMS Blog</title>
  </head>

  <body>

<!--navbar-->
    <div class="container">
      <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <a class="navbar-brand ml-5" href="index.php">CMS Admin</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active mx-2">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item mr-5">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
    </ul>
    </div>
  </nav>
</div>


<div class="row mt-5"><!--body container-->


  <div class="col-lg-2 navbar-inverse bg-inverse ml-2 navbar-default p-0" style="position: fixed,"><!--left nav-->
            <ul class="nav nav-pills flex-column d-flex mt-2 ml-2">
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="index.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="/cms/admin/new-post.php">
                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;New Posts</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white"href="posts.php">
                <i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;Posts</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="category.php">
                <i class="fa fa-th" aria-hidden="true"></i>&nbsp;Categories</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="messages.php">
                <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Messages</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="users.php">
                <i class="fa fa-users" aria-hidden="true"></i>&nbsp;Users</a>
              </li>
              <li class="nav-item my-1">
                <a class="nav-link text-white" href="profile.php">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile</a>
              </li>
              
            </ul>
  </div><!--left nav-->