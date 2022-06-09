<?php
session_start();
include 'connection.inc.php';
include 'functions.php';
$_SESSION["isAdmin"] = $user_data["isAdmin"];
$_SESSION["id"] = $user_data["id"];
$ticket_id = $_SESSION['ticket'];



$date = date("F j, Y, g:i a");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $priority = $_POST['priority'];
  $assign = $_POST['users'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $author = $_SESSION['id'];

  if (!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
    $query = "insert into tickets (subject, content, author, assigned_to, priority, post_date) 
        values ('$subject', '$content', '$author', '$assign', '$priority', '$date')";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?success=ticket&created");
  } else {

    echo "Invalid Info!";
  }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $subject = $_GET['subject'];
  $content = $_GET['content'];
  $assign = $_GET['assign'];
  $priority = $_GET['priority'];
  $close = $_GET['close_ticket'];



  if (isset($_SESSION)) {
    $query = "update tickets set subject = '$subject', content = '$content', assigned_to = '$assign', status = '$close', priority = '$priority' where id = $ticket_id";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?$ticket_id=updated");
    die;
  } else {
    header("Location: ../profile.php?ticket=failed");
    echo "Invalid Info!";
  }
}