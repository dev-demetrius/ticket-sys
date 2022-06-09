<?php
session_start();
include 'connection.inc.php';
include 'functions.php';

$user = check_login($conn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name)) {
    $query = "insert into users (id, name, email, uid, pwd) values ('$id', '$name', '$email', '$user_name', '$password')";
    mysqli_query($conn, $query);

    header("Location: ../login.php?signup=success");
    die;
  } else {

    header("Location: ../signup.php?signup=fill&out&all&fields");
    die;
    echo "<h5>Fill out all Fields!</h5>";
  }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $name = $_GET['name'];
  $email = $_GET['email'];
  $user_name = $_GET['user_name'];
  $password = $_GET['password'];
  $id = $_SESSION['id'];

  if (isset($_SESSION)) {
    $query = "update users set name = '$name', email = '$email', uid = '$user_name', pwd = '$password' where id = '$id'";
    mysqli_query($conn, $query);

    header("Location: ../profile.php?profile=updated");
    die;
  } else {

    header("Location: ../profile.php?profile=failed");
    die;
  }
}