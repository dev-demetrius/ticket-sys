<?php

date_default_timezone_set("EST");

include_once "connection.inc.php";
$user_data = check_login($conn);








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

  if ($_SESSION["isAdmin"] == 1) {
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

    if ($ticket['priority'] == "high") {
      $priority_color = "border-start border-danger";
    } else if ($ticket['priority'] == "medium") {
      $priority_color = "border-start border-warning";
    } else if ($ticket['priority'] == "low") {
      $priority_color = "border-start border-info";
    } else if ($ticket['status'] == "closed") {
      $priority_color = "border-start border-dark";
    }

    if ($ticket['status'] == "open") {
      echo
      '
      <div id="ticket" class="ticket container border border-light border-2 shadow-lg p-3 mb-5 bg-body rounded text-center mt-2 p-4" >
      
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
}




function get_usernames($conn) {
  $query = "select id, name from users";

  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_all($result);

    return $users;
  }
}