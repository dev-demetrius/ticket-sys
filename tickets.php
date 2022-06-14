<?php

session_start();

include_once "includes/connection.inc.php";
include_once "includes/functions.php";


$user_data = check_login($conn);
$tickets = get_tickets($conn);
$users = get_usernames($conn);



print_r($_SESSION['id']);
print_r($_SESSION['name']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/index.css">
  <title>Profile</title>
</head>

<body class="d-flex-inline-flex">

  <?php include "includes/header.php"; ?>

  <div class="container-fluid vh-100">

    <div class="row">

      <?php include "includes/side-nav.php"; ?>
      <div class="col-9 offset-3 ms-auto me-5 mt-3" id="content-tickets">


        <?php echo printResults($tickets); ?>


      </div>
    </div>
  </div>

  <?php include 'includes/ticket-modal.php'; ?>


  <script src="assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</body>

</html>