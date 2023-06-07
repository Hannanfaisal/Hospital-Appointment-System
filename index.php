<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Clinix Care</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css" />
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>

  <!-- header -->
  <?php include 'header.php' ?>


  <div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img-fluid" src="images/team7.png" width="100%" height="500px" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <div class="img2">
          <img class="img" src="images/medical (Card (Landscape)).png" class="d-block w-100" alt="..." />
        </div>
      </div>
      <div class="carousel-item">
        <img class="img-fluid" src="images/team3.png" width="100%" height="500px" class="d-block w-100" alt="..." />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section class="about">
    <div class="container mt-5">
      <div class="row text-center">
        <div class="col-lg-6">
          <img class="img-fluid" width="600px" height="400px" src="images/aboutUs.jpg" alt="" style="border-radius: 20px" />
        </div>
        <div class="col-lg-6 py-0">
          <h1 class="text-center" style="color: rgb(17, 17, 43)">About Us</h1>
          <p style="text-align: justify;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
            sit reprehenderit, explicabo minima quaerat quae assumenda,
            recusandae soluta quam amet molestias quis neque nobis dolorum
            ipsum praesentium incidunt Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quod accusamus ipsum earum magni vitae labore
            quam hic velit omnis dicta? Esse voluptatibus quis fuga corporis
            minima, similique reiciendis aperiam culpa! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis sapiente, fuga repellat nostrum quisquam iure quidem, perferendis officia laborum at ea possimus ex consequuntur doloribus nobis quae natus, repudiandae labore!
          </p>
          <h5 class="text-lg-start text-center">
            <a style="color: rgb(17, 17, 43)" href="aboutUs.php">Read More</a>
          </h5>
        </div>
      </div>
    </div>
  </section>


  <section class="doctors">
    <div class="container mt-5 text-center">
      <h1>Our Doctors</h1>
      <hr style="margin: auto; border-width: 4px; width: 12%" />
      <div class="row mt-5 justify-content-center">


        <?php

        include 'connection.php';

        $query = "SELECT * FROM doctors";
        $res = mysqli_query($con, $query);
        if (!$res) {
          die("Error in the query");
        }
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>

            <div class="col-md-4 mb-2 d-flex justify-content-center">
              <div class="doctors-card card" style="
                background: rgb(255, 255, 255);
                width: 22rem;
                border-radius: 10px;
                border: 3px solid rgba(0, 0, 0, 0.07);
              ">
                <div class="card-body">
                  <img class="m-4 mx-auto img-fluid" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>" width="220px" height="220px" alt="" style="border-radius: 20px; background: rgb(250, 246, 246)" />




                  <h3><?php echo $row['name'] ?></h3>
                  <h5><?php echo $row['specialization'] ?></h5>
                </div>
                <div class="card-footer">
                  <a href="doctor_profile.php?doctorId=<?php echo $row['id'] ?>">
                    <h5 class="fw-bold">
                      View Profile
                      <i class="fa-solid fa-circle-arrow-right"></i>
                  </a>
                  </h5>
                </div>
              </div>
            </div>

        <?php  }
        } else {
          echo "<h5 class='text-secondary' >Currently, No Doctor Avaiable</h5>";
        }

        ?>

      </div>
    </div>
  </section>

  <section class="services">
    <div class="container text-center mt-5 mb-5">
      <h1>Our Services</h1>
      <hr style="margin: auto; border-width: 4px; width: 12%" />
      <div class="row mt-5 mb-2 justify-content-center">
        <div class="col-md-4 services-card">
          <a href="appointment.php">
            <i class="fa-regular fa-calendar-check fa-4x"></i>
            <h3>Book Appointment</h3>
          </a>
        </div>
        <div class="col-md-4 services-card">
          <a href="lab_test.php"> <i class="fa-sharp fa-solid fa-microscope fa-4x"></i>
            <h3>Laboratory Tests</h3>
          </a>
        </div>
        <div class="col-md-4 services-card">
          <a href="emergency.php"><i class="fa-solid fa-stethoscope fa-4x"></i>
            <h3>Emergency</h3>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="departments">
    <div class="container text-center mt-5 mb-5">
      <h1>Our Departments</h1>
      <hr style="margin: auto; border-width: 4px; width: 12%" />
      <div class="row mt-5 mb-2 justify-content-center">
        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/health.png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content">
              <a href="medicine.php">
                <h3>General Medicine <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/hospital (1).png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content">
              <a href="surgery.php">
                <h3>Surgery <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/spine.png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content ">
              <a href="orthopedics.php">
                <h3> Orthopedics <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/heart.png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content">
              <a href="cardiology.php">
                <h3>Cardiology <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/breathing.png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content">
              <a href="ent.php">
                <h3>ENT <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 departments-card d-flex px-0">
          <div class="card-img-container">
            <div class="card-img">
              <img src="images/neurology.png" alt="" />
            </div>
          </div>
          <div class="card-content-container">
            <div class="card-content">
              <a href="neurology.php">
                <h3>Neurology <span><i class="fa-solid fa-circle-arrow-right"></i> </span></h3>
              </a>
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