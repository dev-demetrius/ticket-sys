<?php
session_start();
include 'connection.inc.php';
include 'functions.php';

$user_data = check_login($conn);
$ticket_id = $_SESSION['ticket'];



$date = date("F j, Y, g:i a");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $author = $_SESSION['id'];
  $assign = $_POST['users'];
  $priority = $_POST['priority'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];

  if (!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
    $query = "insert into tickets (subject, content, author, assigned_to, priority) values ('$subject', '$content', '$author', '$assign', '$priority')";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?success=ticket&created");
  } else {

    echo "Invalid Info!";
  }
}

// Edit and Close Tickets

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $subject = $_GET['subject'];
  $content = $_GET['content'];
  $assign = $_GET['assign'];
  $priority = $_GET['priority'];
  //Set value of close ticket
  if (!isset($_GET['close_ticket'])) {
    $close = "open";
  } else {
    $close = $_GET['close_ticket'];
  }



  //Edit/Update Tickets
  if (isset($_SESSION)) {

    $query = "update tickets set subject = '$subject', content = '$content', assigned_to = '$assign', status = '$close', priority = '$priority', date_modified where id = $ticket_id";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?$ticket_id=updated");
    die;
  } else {
    //Error for Failed query
    header("Location: ../profile.php?ticket=failed");
    echo "Invalid Info!";
  }
}