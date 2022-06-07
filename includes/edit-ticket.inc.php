<?php
include_once 'functions.php';


$users = get_usernames($conn);
$tickets = get_tickets($conn);
$ticket = printResults($tickets);


$_SESSION["isAdmin"] = $user_data["isAdmin"];
$_SESSION["id"] = $user_data["id"];





foreach ($users as $user) {
  $user = '<option value="' . $user[0] . '">' . $user[1] . '</option>';
}





// if (!$_SESSION["isAdmin"]) {
//   printResults($tickets);
// } else {
//   printResults($tickets);
// }





$ticket_modal = '<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Modal title</h5>
          <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="includes/tickets.inc.php" method="GET">
            <select name="priority" id="">
              <option value="' . $ticket['priority'] . '">Choose Priority</option>
              <option value="high">High</option>
              <option value="medium">Medium</option>
              <option value="low">Low</option>
            </select>
            <select name="users">
              <option value="' . $ticket['assigned_to'] . '">Assign To</option>
              ' . $user . '
              
  </select>
  <br>
  <input type="text" name="subject" placeholder="Subject">
  <br>
  <textarea name="content" cols="60" rows="10">' .
  $ticket["content"] . '</textarea>
  <br>
  <button type="submit">Submit</button>
  </form>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
  </div>
  </div>
  </div>';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  include_once 'includes/connection.inc.php';
  $ticket_modal = edit_tickets($conn, $id);
  echo $ticket_modal;
}