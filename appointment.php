<?php

include 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
  header('location: login.php');
  exit();
}

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $doctor = $_POST['doctor'];
  $timings = $_POST['timings'];
  $current_date = date("Y-m-d");


  $query = "INSERT INTO appointments (name,email,phone, gender, doctor,timings,date) Values ('$name','$email','$phone','$gender','$doctor','$timings','$current_date')";

  $res = mysqli_query($con, $query);

  if (!$res) {
    die('Error occurred in the query');
  } else {
    echo "<div class='bg-dark text-white' p-2>Your Appointment Booked</div>";
  }
}





?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">

</head>

<body>


  <!-- header -->
  <?php include 'header.php' ?>



  <section class="contact-img">

    <div class="row">
      <div class="col-md-4">
        <h1>Appointment Form</h1>
        <p> <a href="index.html">Home</a> > Book Appointments</p>
      </div>
    </div>
  </section>


  <section class="appointment">
    <div class="container mt-5 mb-5">
      <h3>Fill Appointment Form</h3>
      <form class="row" method="POST" action="">
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name" required>
            <label for="floatingName">Patient Name*</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" required>
            <label for="floatingInput">Email*</label>
          </div>

          <div class="form-floating mb-3">
            <input type="phoneNumber" class="form-control" name="phone" id="floatingPhone" placeholder="Phone" required>
            <label for="floatingPhone">Phone*</label>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class=" mb-3">
                <div class="border p-2 rounded" style="width: 260px;">
                  <label for="gender">Select Gender*</label> <br>
                  <input type="radio" id="male" name="gender" value="Male" required>
                  <label for="male">Male</label><br>
                  <input type="radio" id="female" name="gender" value="Female" required>
                  <label for="female">Female</label><br>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class=" mb-3">
                <div class=" rounded" style="width: 250px;">

                  <select class="form-select" name="timings" id="selectTime">

                    <option value="">Select Time</option>
                    <option value="8AM To 2PM (Morning)">8AM To 2PM (Morning)</option>
                    <option value="6PM To 12AM (Evening)">6PM To 12AM (Evening)</option>
                  </select>
                </div>
              </div>
            </div>



          </div>



          <div class="mb-3">
            <select class="form-select" name="doctor" id="floatingSelect" aria-label="Floating label select example" required>
              <option value="">Select Doctor</option>
              <?php
              $s_query = "SELECT name FROM doctors";
              $s_res = mysqli_query($con, $s_query);
              if (mysqli_num_rows($s_res) > 0) {
                while ($row = mysqli_fetch_assoc($s_res)) {
                  $doctor_name = $row['name'];
              ?>
                  <option value="<?php echo $doctor_name ?>"><?php echo $doctor_name ?></option>

              <?php
                }
              }
              ?>
            </select>
          </div>


          <button type="submit" name="submit" class="btn mb-3" style="background-color:rgb(17, 17, 43) ; color: white;">Make an Appointment</button>
        </div>


      </form>
    </div>

  </section>





  <!-- footer -->
  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>