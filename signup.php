<?php

session_start();





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Signup</title>
  <link rel="stylesheet" href="assets/css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <div class="align-middle text-center">
    <form class="p-2 mt-5" action="includes/signup.inc.php" method="POST">
      <input class="border border-light border-2 rounded mt-3 mb-2" type="text" name="name" placeholder="Name"><br>
      <input class="border border-light border-2 rounded mt-3 mb-2" type="text" name="email" placeholder="Email"><br>
      <input class="border border-light border-2 rounded mt-3 mb-2" type="text" name="user_name"
        placeholder="Username"><br>
      <input class="border border-light border-2 rounded mt-3 mb-2" type="password" name="password"
        placeholder="Password"><br>

      <button class="btn btn-primary mt-2" type="submit">SignUp</button>


    </form>
    <h7 class="text-center mt-2">* All fields Required</h7>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>

</html>