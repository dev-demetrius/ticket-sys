<?php
session_start();

include_once 'includes/functions.php';


$user = check_login($conn);


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
  <title>Document</title>
</head>

<body>

  <body class="">

    <?php include "includes/header.php"; ?>
    <?php include "includes/side-nav.php"; ?>

    <div class="col-10  offset-2 me-6">







      <form id="content"
        class="d-lg-flex flex-lg-column justify-content-center border border-light border-2 shadow-lg p-3 mb-5 bg-body rounded  m-4 p-2"
        action="includes/signup.inc.php" method="get">

        <div class="d-sm-flex ">
          <div class="input-group mt-3 me-1">
            <span class="input-group-text">Name</span>
            <input type="text" aria-label="First name" class="form-control" name="name"
              value="<?php echo $user['name'] ?>">
          </div>
          <div class="input-group mt-3 me-1">
            <span class="input-group-text">User</span>
            <input type="text" aria-label="User Name" class="form-control" name="user_name"
              value="<?php echo $user['uid'] ?>">
          </div>
        </div>

        <div class="d-sm-flex w-100 ">
          <div class="input-group mt-3 me-1 ">
            <div class="input-group-text">@</div>
            <input type="text" aria-label="email" class="form-control" name="email"
              value="<?php echo $user['email'] ?>">
          </div>
          <div class="input-group mt-3 me-1">
            <span class="input-group-text">Pwd</span>
            <input type="password" aria-label="password" class="form-control" name="password"
              value="<?php echo $user['pwd'] ?>">
          </div>
        </div>
        <button id="btn" class="btn btn-primary mt-3 me-1">Save Changes</button>
    </div>
    </form>

    <?php include 'includes/ticket-modal.php '; ?>




  </body>
  <script src="./assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>

</html>