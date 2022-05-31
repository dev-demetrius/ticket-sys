

<header class=" p-5 container">
  <div class="row">
    <img class="col-md-2" src="assets/images/ticket-logo" alt="" >
    <h1 class="col-md-7">Ticket Sys</h1>
    <?php
      if(isset($_SESSION['loggedin'])) {
        echo '<h3 class="col-md-3">'.$user_data['name'].'</h3>
          <h6 class="col-md-2 href="includes/logout.inc.php">Logout</h6>';
      }
    ?>
  </div>
</header>

