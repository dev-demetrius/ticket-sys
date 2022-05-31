<?php

  session_start();

  

  include 'includes/connection.inc.php';
  include 'includes/functions.php';

  $user_data = check_login($conn);
  $tickets = get_tickets($conn);
  $users = get_usernames($conn);
  $result = get_usernames($conn);



  $_SESSION['isAdmin'] = $user_data['isAdmin'];
  $_SESSION['name'] = $user_data['name'];
  $_SESSION['id'] = $user_data['id'];

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>Profile</title>
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <?php

    if(!$_SESSION['isAdmin']) {

      function forLoop($array){
        foreach ($array as $row) {
            if(is_array($row)){
                forLoop($row);
            }
            else{
                echo $row;
                echo "<br>";
            }
        }
    }
    
    forLoop($tickets);

      
    } else {
    
      function forLoop($array){
        foreach ($array as $row) {
            if(is_array($row)){
                forLoop($row);
            }
            else{
                echo $row;
                echo "<br>";
            }
        }
    }
    
    forLoop($tickets);
    }

  ?>

  <form action="includes/tickets.inc.php" method="post">
    <select name="priority" id="">
      <option value="">Choose Priority</option>
      <option value="high">High</option>
      <option value="medium">Medium</option>
      <option value="low">Low</option>
    </select>
    
    <select name="users" style="">
      <option value="">Assign To</option>
      <?php

        

        foreach($users as $user) {
          
            echo '<option value="'. $user[0] .'">'. $user[1] .'</option>';
    
        }

      ?>
    </select>
    <br>
    <input type="text" name="subject" placeholder="Subject">
    <br>
    <textarea name="content" cols="60" rows="10" ></textarea>
    <br>
    <button type="submit">Submit</button>

  </form>
  
</body>
</html>