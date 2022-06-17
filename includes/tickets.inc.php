<?php
session_start();
include 'connection.inc.php';
include 'functions.php';





$user_data = check_login($conn);

$ticket_id = $_SESSION['ticket'];


date_default_timezone_set("EST");

$date = date("F j, Y, g:i a");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $author = $_SESSION['name'];
  $assign = $_POST['users'];
  $priority = $_POST['priority'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $date = date("F j, Y, g:i a");

  if (!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
    $query = "insert into tickets (subject, content, author, assigned_to, priority, post_date) values ('$subject', '$content', '$author', '$assign', '$priority', '$date')";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?success=ticket&created");
  } else {

    echo "Invalid Info!";
  }
}

// Edit and Close Tickets

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $assign = $_GET['assign'];
  $priority = $_GET['priority'];
  $subject = $_GET['subject'];
  $content = $_GET['content'];
  $date = date("F j, Y, g:i a");

  //Edit/Update Tickets
  //Set value of close ticket
  if (!isset($_GET['close_ticket'])) {
    $query = "update tickets set subject = '$subject', content = '$content', assigned_to = '$assign', priority = '$priority', date_modified = '$date' where id = $ticket_id";
    mysqli_query($conn, $query);
    header("Location: ../tickets.php?$ticket_id=updated");
    die;
  } else {
    $close = $_GET['close_ticket'];
    $closeBy = $_SESSION['name'];
    $query = "update tickets set closed_by = '$closeBy', status = '$close', date_modified = '$date' where id = $ticket_id";
    mysqli_query($conn, $query);
    header("Location: ../tickets.php?$ticket_id=updated&Closed");
    die;
  }
}