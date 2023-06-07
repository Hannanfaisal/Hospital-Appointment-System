<?php

include 'connection.php';

// session_start();

$logout = false;

if (isset($_SESSION['email'])) {
  $logout = true;
}


?>



<nav class="navbar sticky-top navbar-expand-lg" style="width: 100%; background-color: rgb(17, 17, 43)">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#"><img src="images/logo20.png" width="65px" height="65px" alt="" />
      Clinix Care</a>
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Departments
          </a>
          <ul class="dropdown-menu" style="background-color: rgb(42, 42, 84)">
            <li>
              <a class="dropdown-item" href="medicine.php">General Medicine</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="surgery.php">Surgery</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="orthopedics.php">Orthopedics</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="cardiology.php">Cardiology</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="ent.php">ENT</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="neurology.php">Neurology</a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="aboutUs.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>

      <?php if ($logout) { ?>
        <button type="button" onclick="" class="btn btn-outline-light mx-1">
          <a href="logout.php">LOGOUT</a>
        </button>
      <?php } else { ?>
       
        <button type="button" onclick="" class="btn btn-outline-light mx-1">
          <a href="login.php">LOGIN</a>
        </button>

      <?php } ?>



      <button type="button" onclick="" class="btn btn-danger mx-1">
        <a href="appointment.php">Book Appointment</a>
      </button>
    </div>
  </div>
</nav>