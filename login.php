<?php







include("includes/functions.php");

$user_info = check_login($conn);




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Login</title>
  <link rel="stylesheet" href="assets/css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <div class="align-middle text-center">
    <form id="login" class="border border-light border-2 shadow-lg rounded p-2 m-5 mb-5" action="includes/login.inc.php"
      method="POST">
      <h4 class="mt-5 mb-5 text-center">Login</h4>
      <input class="border border-light border-2 rounded mt-4 mb-3" type="text" name="user_name"
        placeholder="Username"><br>
      <input class="border border-light border-2 rounded mt-2 mb-5" type="password" name="password"
        placeholder="Password"><br>

      <input class="btn btn-primary mt-2 mb-4 me-2" type="submit" value="Login">

      <a class="" href="signup.php">Signup</a>
    </form>


  </div>
  <?php include 'includes/footer.php'; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>