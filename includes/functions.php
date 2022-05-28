<?php

include 'connection.inc.php';


function check_login($conn) {

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "select * from users where id ='$id' limit 1";

    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0) {

      $user_data = mysqli_fetch_assoc($result);
      return $user_data;

    }
  }
}

function get_tickets($conn) {

  if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "select * from tickets where assigned_to ='$id'";

    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0) {

      $tickets = mysqli_fetch_assoc($result);
      return $tickets;

    }
  }
}