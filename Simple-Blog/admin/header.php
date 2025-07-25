<?php
session_start();
if(!isset($_SESSION['user_info'])){
  header("location:..login.php");
}else{
  $author_id = $_SESSION['user_info'][0];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css.css" type="text/css" media="all" />
</head>

<body>
  <header id="menu">
    <h1>Blog</h1>
    <div>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
<div class="side">
  <ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="logout.php" class="login">Logout</a></li>
  </ul>
</div>