<?php

include 'connection.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
  header('location:login.php');
}


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $type = $_POST['type'];
  $fee = $_POST['fee'];


  $query = "INSERT INTO lab_test (type,name,fee) Values ('$type','$name','$fee')";

  $res = mysqli_query($con, $query);

  if (!$res) {
    die('Error occurred in the query');
  } else {
  }
}


if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($con, "DELETE FROM lab_test WHERE id = '$delete_id'") or die('query failed');
  header('location:admin_lab_tests.php');
}


if (isset($_POST['update'])) {
  $updateId = $_GET['updateId'];
  $update_name = $_POST['update_name'];
  $update_type = $_POST['update_type'];
  $update_fee = $_POST['update_fee'];
  $query = "UPDATE lab_test SET name='$update_name', type='$update_type',fee='$update_fee' WHERE id='$updateId'";
  $res = mysqli_query($con, $query);
  if (!$res) {
    die("Error in the query");
  }
  // header('location: admin_lab_tests.php');
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
          <span><i class="fa-sharp fa-solid fa-microscope"></i></span> Laboratory Tests
        </h1>

        <div class="row border  p-3 m-2 bg-light">
          <div class="col-md-12">
            <h4> <span id="add-doctor"><i class="fa-solid fa-add fa-1x"></i> </span> Add Laboratory Test</h4>
            <form action="" method="POST" id="add-doctor-form">


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputTestName" class="col-form-label">Test Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" id="inputTestName" name="name" class="form-control" required>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputTestCType" class="col-form-label">Test Type</label>
                </div>
                <div class="col-md-9">
                  <select class="form-select" name="type" id="inputTestType">
                    <option vlaue="">Select Type</option>
                    <option value="Blood">Blood</option>
                    <option value="Urine">Urine</option>
                    <option value="PCR">PCR</option>
                  </select>
                </div>
              </div>



              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputTestFee" class="col-form-label">Test Fee</label>
                </div>
                <div class="col-md-9">
                  <input class="form-control" type="number" id="inputTestFee" name="fee" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-12 justify-content-center d-flex">
                  <button class="btn btn-dark" name="submit" style="width: 150px;">ADD</button>
                </div>

              </div>


            </form>

          </div>

        </div>


        <div class="row border  p-3 m-2 bg-light">
          <h4>Lab Test's List</h4>

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
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>


                  <?php

                  $query = "SELECT * FROM lab_test";
                  $res = mysqli_query($con, $query);
                  if (!$res) {
                    die("Error in the query");
                  }
                  if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                      $uid = $row['id'];
                  ?>
                      <tr>
                        <th scope="row"><?php echo $uid ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['fee'] ?></td>
                        <td>
                          <button type="button" class="btn btn-danger"> <a href="admin_lab_tests.php?delete=<?php echo $uid ?>"><i class="fa-solid fa-trash"></i></a> </button>
                          <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#staticUpdationBackdrop"><a href="admin_lab_tests.php?updateId=<?php echo $uid ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                        </td>
                      </tr>



                  <?php }
                  } else {
                    echo "<h4 class='text-secondary'>No Tests Available</h4>";
                  }

                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>



        <div class="row border  p-3 m-2 bg-light">
          <h4>Lab Test's Appointment List</h4>

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
                    <th scope="col">Test Name</th>
                    <th scope="col">Test Type</th>
                    <th scope="col">Timings</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone</th>

                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM lab_appointments";
                  $res = mysqli_query($con, $query);

                  if (!$res) {
                    die("Error in the query");
                  }

                  if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>

                      <tr>

                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td>Blood</td>
                        <td><?php echo $row['timings'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>

                      </tr>

                      <!-- Modal for updation-->
                      <div class="modal" id="staticUpdationBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-body">

                              <div class="row border  p-3 m-2 bg-light">
                                <div class="col-md-12">
                                  <h4> <span id="add-doctor"><i class="fa-regular fa-pen-to-square"></i> </span> Edit Lab Test</h4>
                                  <form action="" method="POST" id="add-doctor-form">


                                    <div class="row align-items-center mb-2">
                                      <div class="col-md-3">
                                        <label for="inputTestName" class="col-form-label">Test Name</label>
                                      </div>
                                      <div class="col-md-9">
                                        <input type="text" id="inputTestName" name="update_name" value="<?php echo $row['name'] ?>" class="form-control" required>
                                      </div>
                                    </div>


                                    <div class="row align-items-center mb-2">
                                      <div class="col-md-3">
                                        <label for="inputTestCType" class="col-form-label">Test Type</label>
                                      </div>
                                      <div class="col-md-9">
                                        <select class="form-select" name="update_type" id="inputTestType">
                                          <option>Select Type</option>
                                          <option value="1">Blood</option>
                                          <option value="2">Urine</option>
                                          <option value="3">PCR</option>
                                        </select>
                                      </div>
                                    </div>



                                    <div class="row align-items-center mb-2">
                                      <div class="col-md-3">
                                        <label for="inputTestFee" class="col-form-label">Test Fee</label>
                                      </div>
                                      <div class="col-md-9">
                                        <input type="number" class="form-control" id="inputTestFee" name="update_fee" value="<?php echo $row['fee'] ?>" required>
                                      </div>
                                    </div>

                                    <div class="row align-items-center mb-2">
                                      <div class="col-md-12 justify-content-end d-flex">
                                        <button type="button" class="btn btn-dark mx-1" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" name="update" style="width: 100px;">UPDATE</button>
                                      </div>

                                    </div>


                                  </form>

                                </div>

                              </div>

                            </div>
                          </div>

                        </div>
                      </div>


                  <?php  }
                  } else {
                    echo "<h4 class='text-secondary'>No Lab Appointments Available</h4>";
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