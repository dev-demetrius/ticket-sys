<?php



date_default_timezone_set("EST");

include 'connection.inc.php';

$user_data = check_login($conn);

$_SESSION['isAdmin'] = $user_data['isAdmin'];






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
    $user_data = check_login($conn);
    if($_SESSION['isAdmin'] == 0) {
      $query = "select * from tickets where assigned_to ='$id'";

      $result = mysqli_query($conn, $query);
      if($result && mysqli_num_rows($result) > 0) {

        $tickets = mysqli_fetch_all($result);
        return $tickets;

      } 
      
    } else {
      $query = "select * from tickets";

      $result = mysqli_query($conn, $query);
      if($result && mysqli_num_rows($result) > 1) {

        $tickets = mysqli_fetch_all($result);
        return $tickets;

    }
}
  } 
}

function get_usernames($conn) {

  
    $query = "select id, name from users";
    

    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0) {
      $users = mysqli_fetch_all($result);
      
      return $users;

    }

}

  

