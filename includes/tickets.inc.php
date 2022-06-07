<?php

include 'connection.inc.php';
include 'functions.php';
$_SESSION["isAdmin"] = $user_data["isAdmin"];
$_SESSION["id"] = $user_data["id"];

$date = date("F j, Y, g:i a");
print_r($dates);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  $priority = $_GET['priority'];
  $assign = $_GET['users'];
  $subject = $_GET['subject'];
  $content = $_GET['content'];
  $author = $user_info['id'];

  if (!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
    $query = "insert into tickets (subject, content, author, assigned_to, priority, post_date) 
        values ('$subject', '$content', '$author', '$assign', '$priority', '$date')";
    mysqli_query($conn, $query);
    header("Location: ../profile.php?success=ticket&created");
  } else {

    echo "Invalid Info!";
  }
}