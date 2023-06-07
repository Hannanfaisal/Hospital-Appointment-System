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
               <h1> About Us</h1>
               <p> <a href="index.html" >Home</a> > About Us</p>
            </div>
        </div>
 </section>

       <section class="aboutUs-main"">
       <div class="container ">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2 id="sec">Our Mission</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident adipisci, magni eum quo perferendis rerum minus minima quidem, deserunt aliquid doloribus velit ut corrupti, neque consequatur alias dignissimos aut officia. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, eveniet soluta tempora sed nesciunt dolorem harum expedita quasi! Quod repellat sint sit aperiam laborum corporis pariatur iusto saepe distinctio. Voluptas.</p>
                <p>Minus quae assumenda voluptas. Corporis eius sed placeat. Minima maxime id repudiandae fuga, iure quis quia porro ipsam numquam sit eligendi voluptates dolore tempore praesentium? Tempore cupiditate sit soluta repellendus!
               .</p>
             <p>   Officia maxime architecto amet veritatis sequi quo, nemo maiores aliquid tempora placeat nihil reiciendis iure neque, culpa autem consequatur, quibusdam rem dolore inventore vero corrupti harum explicabo expedita! Qui, vitae. </p>
            </div>
            <div class="col-md-6">

                <video width="450px" height="450px" controls>
                    <source src="videos/video2.mp4" type="video/mp4" autoplay >
                </video>

               
            </div>
        </div>
        <div class="row mt-4">
            <h2 class="mb-4">Our Specialities</h2>
            <div class="col-md-4">
                <ul style=" list-style: square inside; font-weight: 500; font-size: large; color: rgb(62, 49, 49);  line-height: 35px;" >
                    <li>Foreign qualified doctors</li>
                    <li>Advanced technology</li>
                    <li> Luxury rooms</li>
                    <li>  Efficient Nursing Staff</li>
                      
                </ul>
            </div>
            <div class="col-md-4">
                <ul style=" list-style:square inside; font-weight: 500; font-size: large; color: rgb(62, 49, 49); line-height: 35px;">
                   
                      <li>  Research based treatments</li>
                      <li> Reliable surgical services</li> 
                     <li>    Highly Equipped OTs and Wards</li>
                     <li>   24/7 Emergency Services</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5 mt-4">
            <h2>Why People Choose Us?</h2>    
             <p style="text-align: justify;"> The Hospital has 24/7 Emergency Services, Specialized Departments, and interdisciplinary centres that offer timely and comprehensive treatment. The Hospital maintains its standards, ideals, and ethics by hiring the most competent and experienced Pakistan professionals. Besides, the management ensures treatment availability of the most complex pathologies in the current medical scenario.</p>
            </div>
        </div>

       </div>
       </section>


 
    


     <?php include 'footer.php' ?>


   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
 
    <script src="js/script.js"></script>

  


  </body>
</html>