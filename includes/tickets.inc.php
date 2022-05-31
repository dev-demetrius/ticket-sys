<?php

  include 'connection.inc.php';
  include 'functions.php';

  $user_info = check_login($conn);

  $date = date("F j, Y, g:i a");
  $dates = date("F j, Y \a\t g:ia");
  print_r($dates);

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $priority = $_POST['priority'];
    $assign = $_POST['users'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $author = $user_info['id'];

    if(!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
        $query = "insert into tickets (subject, content, author, assigned_to, priority, post_date) 
        values ('$subject', '$content', '$author', '$assign', '$priority', '$date')";
        mysqli_query($conn, $query);

        header("Location: ../login.php");
        die;
    } else {

        echo "Invalid Info!";

    }
  }

