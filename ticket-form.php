<?php

session_start();
include 'includes/functions.php';


$id = $_GET['view'];
$_SESSION['view'] = $_GET['view'];
$_SESSION['ticket'] = $id;

function edit_tickets($conn, $id) {
  if (isset($_SESSION)) {
    $query = "select * from tickets where id ='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $tickets;
    }
  }
}


$ticket = edit_tickets($conn, $id);
$users = get_usernames($conn);







?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/side-nav.php'; ?>
  <div class="col-10 offset-2">
    <form id="content" class="d-flex flex-column justify-content-center me-4 p-2" action="includes/tickets.inc.php"
      method="GET">
      <h2 class="ps-2">Edit Ticket</h2>
      <div class=" d-flex justify-content-start align-items-center">
        <div class="d-flex justify-content-start align-items-center">
          <select class="form-control m-2" name="priority" id="">
            <option value="<?php echo $ticket[0]['priority']; ?>"><?php echo $ticket[0]['priority']; ?></option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
          </select>
          <select class="form-control m-2" name="assign">
            <option value="">Assign To</option>
            <?php
            foreach ($users as $user) {
              echo '<option value="' . $user[0] . '">' . $user[1] . '</option>';
            }
            ?>
          </select>
          <br>
        </div>
      </div>
      <input class="form-control m-2" type="text" name="subject" placeholder=""
        value="<?php echo $ticket[0]['subject']; ?>">

      <br>
      <textarea class="form-control m-2" name="content" cols="60"
        rows="10"><?php echo $ticket[0]['content']; ?></textarea>
      <br>
      <button id="btn" class="btn btn-primary m-2" type="submit">Submit</button>
      <?php
      if ($ticket[0]['status'] == "open") {
        echo '      <button id="btn" class="btn btn-danger m-2" type="submit" name="close_ticket" value="close">Close Ticket</button>
        ';
      }
      ?>

    </form>
  </div>

  <?php include 'includes/ticket-modal.php'; ?>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

</html>


</div>