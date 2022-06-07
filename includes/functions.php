<?php

date_default_timezone_set("EST");

include_once "connection.inc.php";
$user_data = check_login($conn);




$_SESSION["isAdmin"] = $user_data["isAdmin"];
$_SESSION["id"] = $user_data["id"];



function check_login($conn) {
  if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $query = "select * from users where id ='$id' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);

      return $user_data;
    }
  }
}

function get_tickets($conn) {
  $id = $_SESSION['id'];

  if ($_SESSION["isAdmin"] == 0) {
    $query = "select * from tickets where assigned_to ='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $tickets;
    } else {
      echo "No Tickets Available!";
    }
  } else {
    $query = "select * from tickets";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 1) {
      $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

      return $tickets;
    } else {
      echo "No Tickets Available!";
    }
  }
}




function printResults($tickets) {
  foreach ($tickets as $ticket) {

    $id = $ticket['id'];

    if ($ticket["priority"] == "high") {
      $priority_color = "border-start border-danger";
    } else {
      $priority_color = "border-start border-warning";
    }

    echo
    '
      <div class="container border border-light border-2 text-center mt-2 p-4" >
      
      <a href="ticket-form.php?view=' . $id . '""  >
      
      
                                    <div class="' .
      $priority_color .
      ' text-start w-100 mt-auto ps-4 border-5"  >
      
                                        <p>' .
      $ticket["subject"] .
      '</p>
                                        <p>' .
      $ticket["content"] .
      '</p>
                                        <p>' .
      $ticket["post_date"] .
      '</p>
      
                                    </div>
                                  </a>
                                                          </div>
      
    
            
                          ';
  }
}




function get_usernames($conn) {
  $query = "select id, name from users";

  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_all($result);

    return $users;
  }
}