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
  <title>Document</title>
</head>

<body>

  <body class="d-flex-inline-flex overflow-hidden">

    <?php include "includes/header.php"; ?>

    <div class="container-fluid vh-100">

      <div class="row">

        <?php include "includes/side-nav.php"; ?>
        <div class="col-9 offset-3" id="main">


          <form class="me-3 w-75" action="" method="get">

            <div class="d-sm-flex flex-column mt-5">
              <div class="input-group m-3">
                <span class="input-group-text">Name</span>
                <input type="text" aria-label="First name" class="form-control" value="<?php echo $user['name'] ?>">
              </div>
              <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
              <div class="input-group m-3">
                <div class="input-group-text">@</div>
                <input type="text" aria-label="First name" class="form-control" value="<?php echo $user['email'] ?>">
              </div>

              <div class="input-group m-3">
                <span class="input-group-text">Pwd</span>
                <input type="text" aria-label="First name" class="form-control" value="<?php echo $user['pwd'] ?>">
              </div>
              <button class="btn btn-primary w-50 m-3">Save Changes</button>
            </div>
          </form>


        </div>
      </div>
    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>

</html>