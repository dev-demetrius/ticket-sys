<?php

  session_start();

    include("includes/functions.php");
    include("includes/login.inc.php");

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="site-head">
    <img src="assets/images/tool_icon.svg" alt="" class="logo">
    <h1 class="title">Another Login</h1>
  </header>

  <div class="container"> 
    <form class="login-form" action="" method="POST">

      <input class="first" type="text" name="user_name" placeholder="Username"><br>
      <input type="password" name="password" placeholder="Password"><br>

      <input class="btn" type="submit" value="Login">

      <a href="signup.php">Signup</a>
    </form>
  </div>
  <h4 class="copyright mobile">
        Copyright © 2355 All Alien Rights Reserved
  </h4>  
</body>
</html>