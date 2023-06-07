<?php

include 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
  header('location: login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css"
    />
  </head>
  <body>
   

   <!-- header -->
   <?php include 'header.php' ?>

    <section class="contact-img">
      <div class="row">
        <div class="col-md-4">
          <h1>ENT</h1>
          <p>
            <a href="index.html">Home</a> > ENT
          </p>
        </div>
      </div>
    </section>

    <section class="department-category">
      <div class="container mb-5">
        <div class="row department-category-img-container mx-1 mt-5 mb-5">
          <div class="col-lg-6 p-4 col-12">
            <h2>About Our ENT Department</h2>
            <p class="text-wrap" style="text-align: justify;">
              Our ENT Department is providing expert services 24/7 to
              outpatients, inpatients, and emergency cases. This Department is
              known for having the most high-quality and advanced equipment to
              treat ENT conditions with nose, ears and throat. We are treating hundreds of patients through efficient surgery
              procedures of the ENT.
              
            </p>
          </div>
          <div class="col-lg-6 p-5 col-12">

            <div class="border rounded-4 p-4  text-center" style="background-color: rgb(42, 42, 84)">
               <img
              class="img-fluid "
              src="images/breathing.png"
              height="150px"
              width="150px"
              alt=""
              style="border-radius: 30px"
            />
            </div>
           
          </div>
        </div>
        <h2 class="text-center mb-4">Our ENT Doctors</h2>
        <div class="row">

        
        <?php

        $query = "SELECT * FROM doctors WHERE department = 'Ent'";
        $res = mysqli_query($con, $query);
        if (!$res) {
          die("Error occurred in the query");
        }

        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>

            <div class="col-lg-4 d-flex justify-content-sm-center justify-content-md-center">
              <div class="card m-1" style="width: 26rem">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $row['name'] ?></h3>
                  <p class="card-text"><?php echo $row['department'] ?></p>
                  <p class="card-text" style="font-size: large; font-weight: 600">
                    <?php echo $row['qualification'] ?>
                  </p>

                  <button class="btn btn-dark m-1"> <a href="doctor_profile.php?doctorId=<?php echo $row['id'] ?>"> View Profile</a></button>
                  <button class="btn btn-dark m-1"> <a href="appointment.php">Make an Appointment</a> </button>
                </div>
              </div>
            </div>

        <?php  }
        } else {
          echo "<h4 class='text-secondary'>No Doctor Available</h4>";
        }

        ?>

            
      </div>
    </section>

     <!-- footer -->
     <?php include 'footer.php' ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

  </body>
</html>
