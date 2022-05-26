<?php

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
          
          if ($user_data['password'] === $password) {

            $_SESSION['id'] = $user_data['id'];

            header("Location: ../index.php");
            die();

          }
        }
      }
      echo "Invalid Username or Password";
    } else {

      echo "Invalid Username or Password";

    }
  }