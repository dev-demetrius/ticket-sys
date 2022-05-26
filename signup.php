<?php

  session_start();

  include 'includes/signup.inc.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Signup</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <img src="" alt="" class="logo">
    <h1>Another Login</h1>
  </header>
   <div class="container">
    <form action="includes/signup.inc.php" method="POST">
      <input type="text" name="name" placeholder="Name"><br>
      <input type="text" name="email" placeholder="Email"><br>
      <input type="text" name="user_name" placeholder="Username"><br>
      <input type="password" name="password" placeholder="Password"><br>

      <input class="btn" type="submit" value="SignUp">

      
    </form>
  </div> 
  <h4 class="copyright mobile">
        Copyright © 2355 All Alien Rights Reserved
  </h4> 
</body>
</html>