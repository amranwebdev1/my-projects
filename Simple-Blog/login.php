<?php 
session_start();
ob_start();
include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
    body{
      box-sizing: border-box;
      overflow: hidden;
      margin: 0;
      padding: 0;
      background-color: #B6CAE5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    form{
      box-sizing: border-box;
      width: 80%;
      padding: 30px;
      border-radius: 15px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      box-shadow: 8px 8px 16px #d0d0d0, -8px -8px 16px #fff;
    }
    form label{
      display: block;
      text-align: left;
      margin-bottom: 5px;
    }
    form input{
      padding: 8px;
      background-color: #B6CAE5;
      font-size: 18px;
      margin-bottom: 20px;
      border: none;
      border-radius: 7px;
      box-shadow: inset 2px 2px 6px #d0d0d0,inset -2px -2px 6px #fff;
    }
    form input[name="login"]{
      box-shadow: 2px 2px 6px #d0d0d0, 2px 2px 6px #fff;
      cursor: pointer;
    }
    form h2{
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <form action="" method="POST">
    <h2>Login Form</h2>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter your Email"/>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" placeholder="Enter your Password" />
    <input type="submit" name="login" value="Login">
  </form>
</body>

</html>
<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM user";
  $query = mysqli_query($conn,$sql);
  $ftc = mysqli_fetch_assoc($query);
  if($ftc['email'] == $email AND $ftc['password'] == $pass){
    $arr = array($ftc['id'],$ftc['username'],$ftc['email'],$ftc['password']);
    $_SESSION['user_info'] = $arr;
    header("location:admin/index.php");
  }else{
    echo "faild";
  }
}

?> 