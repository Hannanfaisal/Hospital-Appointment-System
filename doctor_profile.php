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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css" />
</head>

<body>


  <!-- header -->
  <?php include 'header.php' ?>

  <section class="contact-img">
    <div class="row">
      <div class="col-md-4">
        <h1>DOCTOR'S PROFILE</h1>
        <p>
          <a href="index.html">Home</a> > Doctor's Profile
        </p>
      </div>
    </div>
  </section>


  <section class="doctor-profile">
    <div class="container mt-5 mb-5">
      <div class="row">

        <?php

        $doctorId = $_GET['doctorId'];
        $query = "SELECT * FROM doctors WHERE id = '$doctorId'";
        $res = mysqli_query($con, $query);
        if (!$res) {
          die("Error in the query");
        }

        $row = mysqli_fetch_assoc($res);
        ?>

        <div class="col-md-4 ">
          <div class="card text-center bg-light" style="width: 22rem;">
            <div>
              <img class="img-fluid" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>" width="300px" height="300px" alt="">
            </div>

            <div class="card-body">
              <h2><?php echo $row['name'] ?></h2>
              <h6><?php echo $row['specialization'] ?></h6>
              <h5><?php echo $row['qualification'] ?></h5>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <h3>Biography:</h3>
          <p><?php echo $row['description'] ?></p>

          <h3>Education:</h3>
          <Table class="table bg-light">
            <tr>
              <th>Institute</th>
              <th>Degree</th>
              <th>Year</th>
            </tr>
            <tr>
              <td><?php echo $row['institution'] ?></td>
              <td><?php echo $row['degree_1'] ?></td>
              <td>1980</td>
            </tr>

          </Table>
        </div>
      </div>
    </div>
  </section>


  <!-- footer -->
  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>