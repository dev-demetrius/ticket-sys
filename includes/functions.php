<?php

date_default_timezone_set("EST");

include_once "connection.inc.php";
$user_data = check_login($conn);
$tickets = get_tickets($conn);

$_SESSION["isAdmin"] = $user_data["isAdmin"];












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
  if (isset($_SESSION)) {
    $name = $_SESSION['name'];
    if ($_SESSION['isAdmin'] == 0) {
      $query = "select * from tickets where assigned_to ='$name'";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $tickets;
      } else {
        $tickets = null;
      }
    } else {
      $query = "select * from tickets";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 1) {
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $tickets;
      }
    }
  }
}






function printResults($tickets) {
  if (!$tickets == null) {
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
        
                                          <div id="ticket-item" class="d-flex"><strong>Subject</strong> &nbsp  ' . $ticket['subject'] . '</div>
                                          <div id="ticket-item" class="d-flex"><strong>Content</strong> &nbsp ' . $ticket['content'] . '</div>
                                          <div id="ticket-item" class="d-flex"><strong>Date Created</strong> &nbsp ' . $ticket['post_date'] . '</div>
                                          <div id="ticket-item" class="d-flex"><strong>Created By</strong> &nbsp ' . $ticket['assigned_to'] . '</div>
        
                                      </div>
                                    </a>
                                                            </div>
        
      
              
                            ';
      }
    }
  } else {
    echo '<h1 class="text-center">No Tickets Available!</h1>';
  }
}

function emailNotification($conn, $recipient) {
  $query = "select tickets.assigned_to, users.* FROM tickets, users where tickets.assigned_to = '$recipient'";

  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $mailTo = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $mailTo;
  }
}




function get_usernames($conn) {
  $query = "select id, name, email from users";

  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users;
  }
}

function edit_tickets($conn, $ticket_id) {
  if (isset($_SESSION)) {
    $query = "select * from tickets where id ='$ticket_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $tickets = mysqli_fetch_assoc($result);
      return $tickets;
    }
  }
}