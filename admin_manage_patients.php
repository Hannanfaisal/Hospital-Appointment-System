<?php
include 'connection.php';

session_start();

if (!isset($_SESSION['admin_email'])) {
  header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clinix Care - Admin Panel
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="admin_style.css">

  <script src="js/jquery-3.6.4.min.js"></script>




</head>

<body>
  <div class="main d-flex">
  <div class="sidebar d-lg-block" id="sidebar">
    <h3 class="text-white p-4 "><img src="images/logo20.png" width="65px" height="65px" alt="" /> Clinix Care</h3>
    <div class="mt-4">
        <hr>
        <a class="active" href="admin_home.php">
            <span> <i class="fa-solid fa-cubes"></i></span>Dashboard</a>
        <a href="admin_mange_doctors.php"><span><i class="fa-solid fa-user-doctor "></i></span> Manage
            Doctors</a>
        <a href="admin_manage_patients.php"><span><i class="fa-solid fa-users"></i></span>Manage Patients</a>
        <a href="admin_appointments.php"><span><i class="fa-regular fa-calendar-check "></i></span>All
            Appointments</a>
        <a href="admin_lab_tests.php"><span> <i class="fa-sharp fa-solid fa-microscope"></i></span>Laboratory
            tests</a>

        <hr>
        <a class="logout" href="logout.php"><span><i class="fa-solid fa-right-from-bracket"></i></span> Logout</a>
    </div>
</div>

    <div class="content">
      <!-- navbar -->
      <nav class="navbar sticky-top navbar-expand-lg" style="width: 100%; background-color: rgb(17, 17, 43);">
        <div class="container-fluid">
          <div class="d-block d-lg-none ">

            <a class="navbar-brand  text-white mx-3" href="#"><img src="images/logo20.png" width="65px" height="65px" alt=""> Clinix Care</a>
            <button onclick="" class="btn btn-light" id="btn-toggle-sidebar"><span style="color: rgb(17, 17, 43);"><i class="fa-sharp fa-solid fa-bars"></i></button>

          </div>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
    
        </div>
      </nav>


      <div class="container ">

        <h1 class="mx-2 mt-5">
          <span><i class="fa-solid fa-users"></i> </span>Manage Patients
        </h1>




        <div class="row border  p-3 m-2 bg-light">
          <h4>Patient's List</h4>

          <div class="col-12 justify-content-end d-flex">
            <div class="row align-items-center mb-2">
              <div class="col-md-12">
                <input type="text" id="inputSearch" class="form-control" placeholder="Search">
              </div>
            </div>
          </div>

          <div class="col-12">

            <div class="table-responsive">
              <table class="table align-middle table-sm border bg-white">
                <thead>
                  <tr class="bg-light">
                    <th scope="col">#</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone</th>
                    
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM appointments";
                  $res = mysqli_query($con, $query);
                  if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {

                  ?>
                      <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                       
                      </tr>

                  <?php
                    }
                  } else {
                    echo "<h4 class='text-secondary'>No Patient Available</h4>";
                  }
                  ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>

  <!-- bootstrap js -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

  <script>
    $('#btn-toggle-sidebar').click(function() {
      $('#sidebar').toggle();
    })


    $('.sidebar a').click(function() {
      $('.sidebar .active').removeClass('active');
      $(this).addClass('active');
    })


    $('#add-doctor-form').hide();

    $('#add-doctor').click(function() {
      $('#add-doctor-form').toggle();
    })
  </script>

</body>





</html>