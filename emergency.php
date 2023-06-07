<?php

include 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
  header('location: login.php');
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
               <h1>Emergency</h1>
               <p> <a href="index.html" >Home</a> > Emergency</p>
            </div>
        </div>
 </section>


<section class="emergency ">
    <div class="container mt-5 mb-5">
        <div class="row m-4 justify-content-center">
            <div class="col-md-5 border border-dark justify-content-center d-flex p-5 text-center rounded mx-2  ">
                <div>
                <h3>
                    Emergency Cases
                </h3>
                <h5> <i class="fa-solid fa-phone-volume"></i> (042) 111-222-333</h5>
               </div>
            </div>
            <div class="col-md-5 border border-dark justify-content-center d-flex p-5 text-center rounded mx-2">
                <div>
                <h3>
                    Call Our Helpline
                </h3>
                <h5><i class="fa-solid fa-phone-volume"></i> (042) 555-223-874</h5>
               </div>
            </div>
        </div>

    

        <div class="row justify-content-center">
            <div class="col-8 border border-dark rounded  p-5">
                    <h2 class="text-center">Ambulance Service</h2>

                    <p class="text-center">Our hospital provides fast quick ambulance service 24/7 in all provinces. In case of any emergency please call
                        our ambulance service.
                    </p>
                    <h5 class="text-center"> <i class="fa-solid fa-phone-volume"></i> (042) 111-255-809</h5>
            </div>
        </div>

    </div>
</section>
      


    <!-- footer -->
    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>