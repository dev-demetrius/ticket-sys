<?php

  session_start();

  $_SESSION['loggedin'] = true;
  $_SESSION['isAdmin'] = $user_data['isAdmin'];
  $_SESSION['name'] = $user_data['name'];
  $_SESSION['id'] = $user_data['id'];



  include 'connection.inc.php';

  include 'functions.php';

  

//login authentication

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
      
      $query = "select * from users where uid = '$user_name' limit 1";
      $result = mysqli_query($conn, $query);

      if($result) {
        if($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);
          print_r($user_data);
          
          if ($user_data['pwd'] === $password) {

            $_SESSION['id'] = $user_data['id'];
            $_SESSION['name'] = $user_data['name'];
            
            header("Location: ../profile.php?login=success");
            die();

          } else {

            echo "Invalid Username or Password";
      
          }
        }
      } else {
        echo "Request Failed!";
      }
      
    } 
  }