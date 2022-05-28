<?php

  include 'connection.inc.php';
  include 'functions.php';

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $query = "insert into users (id, name, email, uid, pwd) values ('$id', '$name', '$email', '$user_name', '$password')";
        mysqli_query($conn, $query);

        header("Location: ../login.php");
        die;
    } else {

        echo "Invalid Info!";

    }
  }