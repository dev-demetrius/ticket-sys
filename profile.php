<?php

  session_start();

  include 'includes/connection.inc.php';
  include 'includes/functions.php';

  $user_data = check_login($conn);
  $tickets = get_tickets($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>
<body>

  <?php

    if($user_data['id'] == $tickets['id']) {

        foreach($tickets as $x) {
          echo "<p>$x</p>";
        }

    }

  ?>
  
</body>
</html>