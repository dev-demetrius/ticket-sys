<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Add Ticket</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="m-2" action="includes/tickets.inc.php" method="GET">
          <select class="form-select form-select-lg mb-3" name="priority" aria-label=".form-select-lg example">
            <option value="">Choose Priority</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
          </select>
          <select class="form-select form-select-lg mb-3" name="users" aria-label=".form-select-lg example">
            <option value="">Assign To</option>
            <?php
            foreach ($users as $user) {
              echo '<option value="' . $user[0] . '">' . $user[1] . '</option>';
            }
            ?>

          </select>
          <br>
          <input class="form-control" type="text" name="subject" placeholder="Subject">
          <br>
          <div class="mb-3">
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <br>
          <button class="btn btn-primary m-2" type="submit">Submit</button>
        </form>



      </div>

    </div>
  </div>
</div>