<?php

include 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
  header('location: login.php');
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $type = $_POST['type'];
  $timings = $_POST['timings'];
  $current_date = date("Y-m-d");

  $query = "INSERT INTO lab_appointments (name,email,phone,type,timings,date) VALUES ('$name','$email','$phone','$type','$timings','$current_date')";
  $res = mysqli_query($con, $query);
  if (!$res) {
    die("Error in the query");
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
        <h1>Laboratory Tests</h1>
        <p> <a href="index.html">Home</a> > Laboratory Tests</p>
      </div>
    </div>
  </section>


  <section class="appointment">
    <div class="container mt-5 mb-5">
      <h3>Book Your Test Slots</h3>
      <form action="" method="POST" class="row">
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Name" required>
            <label for="floatingName">Patient Name*</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
            <label for="floatingInput">Email</label>
          </div>

          <div class="form-floating mb-3">
            <input type="phoneNumber" name="phone" class="form-control" id="floatingPhone" placeholder="Phone" required>
            <label for="floatingPhone">Phone*</label>
          </div>


          <div class="mb-3">
            <select class="form-select" name="timings" id="floatingSelect" aria-label="Floating label select example" required>
              <option value="">Select Timings</option>
              <option value="09:00-12:00 (Morning)">09:00-12:00 (Morning)</option>
              <option value="12:00-03:00 (After Noon)">12:00-03:00 (After Noon)</option>
              <option value="03:00 - 08:00 (Evening)">03:00 - 08:00 (Evening)</option>

            </select>
          </div>





          <div class="mb-3">
            <select class="form-select" name="type" id="floatingSelect" aria-label="Floating label select example" required>
              <option selected>Select Test</option>

              <?php
              $s_query = "SELECT name FROM lab_test";
              $s_res = mysqli_query($con, $s_query);
              if (mysqli_num_rows($s_res) > 0) {
                while ($row = mysqli_fetch_assoc($s_res)) {
                  $test_name = $row['name'];
              ?>
                  <option value="<?php echo $test_name ?>"><?php echo $test_name ?></option>

              <?php
                }
              }
              ?>

            </select>
          </div>




          <button name="submit" class="btn mb-3" style="background-color:rgb(17, 17, 43) ; color: white;">Book Test</button>
        </div>


      </form>
    </div>



  </section>



  <!-- footer -->
  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>