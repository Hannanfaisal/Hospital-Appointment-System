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
  $subject = $_POST['subject'];
  $message = $_POST['message'];


  $query = "INSERT INTO contact (name,email,phone,subject,message) Values ('$name','$email','$phone','$subject','$message')";

  $res = mysqli_query($con, $query);

  if (!$res) {
    die('Error occurred in the query');
  } else {
    echo "<div class='bg-dark text-white p-2' >Your response submitted, we will contact you in short time</div>";
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
        <h1> About Us</h1>
        <p> <a href="index.html">Home</a> > About Us</p>
      </div>
    </div>
  </section>


  <section class="contact">
    <div class="container mt-5 mb-5">
      <h3>Leave Us Message</h3>
      <div class="row mt-3">
        <div class="col-md-6">
          <form action="" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name" required>
              <label for="floatingName">Name</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" required>
              <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="phoneNumber" class="form-control" name="phone" id="floatingPhone" placeholder="Phone" required>
              <label for="floatingPhone">Phone</label>
            </div>

            <div class="mb-3">
              <select class="form-select" name="subject" id="floatingSelect" aria-label="Floating label select example" required>
                <option value="">Choose Subject</option>
                <option value="Emergency">Emergency</option>
                <option value="Complaint">Complaint</option>
                <option value="Feedback">Feedback</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px" required></textarea>
              <label for="floatingTextarea2">Message</label>
            </div>
            <button name="submit" class="btn mb-3" style="background-color:rgb(17, 17, 43) ; color: white;">Submit</button>

          </form>
        </div>

        <div class="col-md-6">

          <div class="border rounded pt-4 justify-content-center d-flex bg-light ">
            <div>
              <p> <span class="fw-bold text-primary"><i class="fa-solid fa-envelope mx-1"></i>Email Address:</span> 70110843@student.uol.edu.pk</p>
              <p><span class="fw-bold text-success"><i class="fa-solid fa-phone mx-1"></i> Phone No:</span> 03370408845 </p>
              <p><span class="fw-bold text-danger"><i class="fa-solid fa-home mx-1"></i> Location:</span> University of Lahore, Lahore </p>


              <div class="contact-map-img-container mt-4" style="width: 400px;  height: 300px;">
                <a href="https://www.google.com/maps/place/The+University+Of+Lahore+Teaching+Hospital/@31.3892325,74.2388675,17z/data=!4m6!3m5!1s0x39190014a51dca51:0xfc118b857dfb75e9!8m2!3d31.3893125!4d74.2404375!16s%2Fg%2F11cjh_tdn8"> <img class="img-fluid rounded" src="images/map.png" alt=""></a>
              </div>
            </div>

          </div>

        </div>





      </div>




    </div>

  </section>





  <!-- footer -->
  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>