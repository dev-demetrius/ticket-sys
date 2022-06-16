<?php
session_start();
include 'connection.inc.php';
include 'functions.php';
require '../vendor/autoload.php';
require '../vendor/phpmailer/src/phpmailer.php';
require '../vendor/phpmailer/src/smtp.php';
require '../vendor/phpmailer/src/exception.php';
require '../vendor/phpmailer/src/oauthtokenprovider.php';
require '../vendor/phpmailer/src/oauth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




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
  $to = $assign['email'];
  $to_name = $assign['name'];

  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function

  //Load Composer's autoloader


  //Create an instance; passing `true` enables exceptions


  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dem.jackson@yahoo.com';                     //SMTP username
    $mail->Password   = 'oemghopmsogqubgk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dem.jackson@yahoo.com', 'Mailer');
    $mail->addAddress($to, $to_name);     //Add a recipient               //Name is optional
    $mail->addReplyTo('dem.jackson@yahoo.com', 'Information');
    $mail->addCC('dem.jackson@yahoo.com');


    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "'.$subject.'";
    $mail->Body    = "'.$content.' <b>in bold!</b>'";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  if (!empty($priority) && !empty($assign) && !empty($subject) && !empty($content)) {
    $query = "insert into tickets (subject, content, author, assigned_to, priority, post_date) values ('$subject', '$content', '$author', '$assign', '$priority', $date)";
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
} else {
  //Error for Failed query
  header("Location: ../profile.php?ticket=failed");
  echo "Invalid Info!";
}