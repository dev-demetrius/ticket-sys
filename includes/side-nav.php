<div id="side" class="col-2 p-1 bg-dark position-absolute text-sm-start vh-100">
  <div class="">
    <div class="d-flex justify-content-center">
      <button class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#modal"
        action="includes/tickets.inc.php" method="Get">
        Add Ticket
      </button>
    </div>
    <a href="./profile.php">
      <h6 class="p-4 text-primary text-center">Profile</h6>
    </a>
    <a href="./tickets.php">
      <h6 class="p-4 text-primary text-center">Tickets</h6>
    </a>

  </div>
</div>

<ul id="tabs" class="nav nav-tabs">
  <li class="nav-item">
    <button class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#modal"
      action="includes/tickets.inc.php" method="Get">Add Tickets</button>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tickets.php">Tickets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>