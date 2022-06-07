<header>
  <div class="d-flex justify-content-between border-bottom border-light border-3 p-2">
    <div class="d-flex">
      <?php $image_url = 'assets/images/ticket-logo.svg'; ?>
      <img class="h-auto" src="<?php echo $image_url; ?>" alt="">
      <h1 class=" pt-2">Ticket Sys</h1>
    </div>
    <?php 
      if(isset($_SESSION['loggedin'])) {
        echo '<div class="d-flex justify-content-end"><h3 class="p-2">'.$user_data['name'].'</h3>
          <a class="p-3" href="includes/logout.inc.php">Logout</a></div>
          <hr>';
      }
    ?>
  </div>
</header>