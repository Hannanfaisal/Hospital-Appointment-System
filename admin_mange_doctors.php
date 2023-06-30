<?php

include 'connection.php';

session_start();

if (!isset($_SESSION['admin_email'])) {
  header('location:login.php');
}



if (isset($_POST['submit'])) {

  $name = $_POST['d_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $department = $_POST['department'];
  $specialization = $_POST['specialization'];
  $qualification = $_POST['qualification'];
  $timing = $_POST['timing'];
  $fee = $_POST['fee'];
  $description = $_POST['description'];
  $institution = $_POST['institution'];
  $degree_1 = $_POST['degree_1'];


  if (!empty($_FILES["image"]["name"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

      $query = "INSERT INTO doctors (name,email,phone,image,department,specialization,qualification,timing,fee,description,institution,degree_1) Values ('$name','$email','$phone','" . $imgContent . "','$department','$specialization','$qualification','$timing','$fee','$description','$institution','$degree_1')";

      $res = mysqli_query($con, $query);

      if (!$res) {
        die('Error occurred in the query');
      } else {
      }
    }
  }
}



if (isset($_POST['updation'])) {
  $updateId = $_POST['updateId'];

  $update_name = $_POST['update_name'];
  $update_email = $_POST['update_email'];
  $update_phone = $_POST['update_phone'];
  $update_image = $_POST['update_image'];
  $update_department = $_POST['update_department'];
  $update_specialization = $_POST['update_specialization'];
  $update_qualification = $_POST['update_qualification'];
  $update_timing = $_POST['update_timing'];
  $update_fee = $_POST['update_fee'];


  $query = "UPDATE doctors SET name='$update_name',email='$update_email',phone='$update_phone',image='$update_image',department='$update_department',specialization='$update_specialization',qualification='$update_qualification',timing='$update_timing',fee='$update_fee' WHERE id='$updateId'";

  $res = mysqli_query($con, $query);

  if (!$res) {
    die('Error occurred in the query');
  } else {
    header('location:admin_mange_doctors.php');
  }
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
          <span><i class="fa-solid fa-user-doctor"></i> </span>Manage Doctors
        </h1>

        <div class="row border  p-3 m-2 bg-light">
          <div class="col-md-12">
            <h4> <span id="add-doctor"><i class="fa-solid fa-add fa-1x"></i> </span> Add Doctor</h4>

            <form action="" method="POST" id="add-doctor-form" enctype="multipart/form-data">


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputName" class="col-form-label">Doctor's Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="d_name" id="inputName" class="form-control" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputEmail" class="col-form-label">Email Address</label>
                </div>
                <div class="col-md-9">
                  <input type="email" name="email" id="inputEmail" class="form-control" required>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputPhone" class="col-form-label">Phone Number</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="phone" id="inputPhone" class="form-control" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputImage" class="col-form-label">Upload Image</label>
                </div>
                <div class="col-md-9">
                  <input class="form-control" name="image" type="file" id="inputImage" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputDepartment" class="col-form-label">Department</label>
                </div>
                <div class="col-md-9">
                  <select class="form-select" name="department" id="inputDepartment" aria-label="Floating label select example" required>
                    <option value="">Select Department</option>
                    <option value="General Medicine">General Medicine</option>
                    <option value="Surgery">Surgery</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="ENT">ENT</option>
                    <option value="Neurology">Neurology</option>
                  </select>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputSpecialization" class="col-form-label">Specialization</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="specialization" id="inputSpecialization" class="form-control" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputQualification" class="col-form-label">Qualification</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="qualification" id="inputQualification" class="form-control" required>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputTimings" class="col-form-label">Timings</label>
                </div>
                <div class="col-md-9">
                  <select class="form-select" name="timing" id="inputTimings" aria-label="Floating label select example" required>
                    <option value="">Select Timing</option>
                    <option value="08AM - 02PM (Morning)">08AM - 02PM (Morning)</option>
                    <option value="06PM - 12AM (Evening">06PM - 12AM (Evening)</option>

                  </select>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputFee" class="col-form-label">Fee</label>
                </div>
                <div class="col-md-9">
                  <input type="number" name="fee" id="inputFee" class="form-control" required>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputFee" class="col-form-label">Description</label>
                </div>
                <div class="col-md-9">
                  <textarea class="form-control" name="description" rows="7"></textarea>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-3">
                  <label for="inputFee" class="col-form-label">Institution and Degree</label>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="institution" placeholder="Institution">
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="degree_1" placeholder="Degree">
                    </div>
                  </div>
                </div>
              </div>


              <div class="row align-items-center mb-2">
                <div class="col-md-12 justify-content-center d-flex">

                  <input class="btn btn-primary" value="ADD" type="submit" name="submit" style="width: 100px;">
                </div>

              </div>


            </form>



          </div>

        </div>


        <div class="row border  p-3 m-2 bg-light">
          <h4>Doctor's List</h4>
          <div class="col-12 justify-content-end d-flex">
            <div class="row align-items-center mb-2">
              <div class="col-md-12 ">
                <form method="POST" action="">
                  
                  <input type="text" id="inputSearch" name="search" class="form-control" placeholder="Search">
                  <button class="btn btn-primary btn-sm" type="submit" name="go">Go</button>
                
                </form>
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
                    <th scope="col">Department</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  if (isset($_POST['go'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM doctors WHERE name lIKE '%$search%' or specialization LIKE '$search%' or department LIKE '$search%'";
                  } else {
                    $query = "SELECT * FROM doctors";
                  }



                  $res = mysqli_query($con, $query);
                  if (!$res) {
                    die("Error in the query");
                  }
                  if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>

                      <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['department'] ?></td>
                        <td><?php echo $row['specialization'] ?></td>
                        <td><?php echo $row['timing'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['fee'] ?></td>
                        <td>

                          <button type="button" class="btn btn-danger"> <a href="delete.php?deleteId=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a> </button>

                          <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#staticUpdationBackdrop"><i class="fa-regular fa-pen-to-square"></i><a href="admin_mange_doctors.php?updateId=<?php echo $row['id'] ?>"></a></button>
                        </td>

                        <!-- Modal for updation-->
                        <div class="modal" id="staticUpdationBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">

                                <div class="row border  p-3 m-2 bg-light">
                                  <div class="col-md-12">
                                    <h4> <span id="add-doctor"><i class="fa-regular fa-pen-to-square"></i></span> Edit Doctor</h4>
                                    <form action="" method="POST" id="add-doctor-form">


                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputName" class="col-form-label">Doctor's Name</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" name="update_name" value="<?php echo $row['name'] ?>" id="inputName" class="form-control" required>
                                        </div>
                                      </div>

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputEmail" class="col-form-label">Email Address</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="email" name="update_email" value="<?php echo $row['email'] ?>" id="inputEmail" class="form-control" required>
                                        </div>
                                      </div>


                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputPhone" class="col-form-label">Phone Number</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" name="update_phone" value="<?php echo $row['phone'] ?>" id="inputPhone" class="form-control" required>
                                        </div>
                                      </div>

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputImage" class="col-form-label">Upload Image</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input class="form-control" name="update_image" value="<?php echo base64_encode($row['image']) ?>" type="file" id="inputImage" required>
                                        </div>
                                      </div>

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputDepartment" class="col-form-label">Department</label>
                                        </div>
                                        <div class="col-md-9">
                                          <select class="form-select" name="update_department" id="inputDepartment" aria-label="Floating label select example" required>
                                            <option value=" ">Select Department</option>
                                            <option value="General Medicine">General Medicine</option>
                                            <option value="Surgery">Surgery</option>
                                            <option value="Orthopedics">Orthopedics</option>
                                            <option value="Cardiology">Cardiology</option>
                                            <option value="ENT">ENT</option>
                                            <option value="Neurology">Neurology</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputSpecialization" class="col-form-label">Specialization</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" name="update_specialization" value="<?php echo $row['specialization'] ?>" id="inputSpecialization" class="form-control" required>
                                        </div>
                                      </div>

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputQualification" class="col-form-label">Qualification</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" name="update_qualification" value="<?php echo $row['qualification'] ?>" id="inputQualification" class="form-control" required>
                                        </div>
                                      </div>


                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputTimings" class="col-form-label">Timings</label>
                                        </div>
                                        <div class="col-md-9">
                                          <select class="form-select" name="update_timing" value="<?php echo $row['timings'] ?>" id="inputTimings" aria-label="Floating label select example" required>
                                            <option value="">Select Timing</option>
                                            <option value="08AM - 02PM (Morning)">08AM - 02PM (Morning)</option>
                                            <option value="06PM - 12AM (Evening">06PM - 12AM (Evening)</option>

                                          </select>
                                        </div>
                                      </div>


                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-3">
                                          <label for="inputFee" class="col-form-label">Fee</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="number" name="update_fee" value="<?php echo $row['fee'] ?>" id="inputFee" class="form-control" required>
                                        </div>
                                      </div>

                                      <input type="hidden" name="updateId" value="<?php echo $row['id'] ?>">

                                      <div class="row align-items-center mb-2">
                                        <div class="col-md-12 justify-content-end d-flex">
                                          <button type="button" class="btn btn-dark mx-1" data-bs-dismiss="modal">Close</button>
                                          <input type="submit" class="btn btn-primary" value="UPDATE" name="updation" style="width: 100px;">
                                        </div>

                                      </div>


                                    </form>

                                  </div>

                                </div>

                              </div>
                            </div>

                          </div>
                        </div>
                      </tr>



                  <?php  }
                  } else {
                    echo "<h4 class='text-secondary'>No Doctors Available</h4>";
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