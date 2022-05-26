<?php

include 'connection.inc.php';

function gettickets($conn) {

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