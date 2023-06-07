<?php
include 'connection.php';

if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  $select_query = "SELECT USER_EMAIL FROM USERS WHERE USER_EMAIL = '$email' ";
  $excecute_select_query =  mysqli_query($con, $select_query);
  $record = mysqli_fetch_assoc($excecute_select_query);



  if ($record['user_email'] == $email) {

    echo "<div class='bg-danger text-white text-center p-2'><h4>Email is already registered</h4></div>";
  } else {
    $register_query = "INSERT INTO USERS (USER_NAME,USER_EMAIL,USER_PASSWORD) VALUES ('$name','$email','$password')";

    if (strlen($password) >= 10) {


      if ($cpassword == $password) {
        $excecute_register_query =  mysqli_query($con, $register_query);

        if ($excecute_register_query) {
          header('location: login.php');
        } else {
          echo "<div class='bg-danger text-white text-center p-2'><h4>User registeration failed</h4></div>";
        }
      } else {
        echo "<div class='bg-danger text-white text-center p-2'><h4>Password does not matches</h4></div>";
      }
    } else {
      echo "<div class='bg-danger text-white text-center p-2'><h4>Password should be ateast 10 characters long</h4></div>";
    }
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


  <section class="login">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12 d-flex p-5 justify-content-center">
          <div class="login-form  p-4 " style="text-align: center; border-radius: 5px; background-color: whitesmoke;">
            <h2>SIGN UP</h2>
            <form action="" method="POST">



              <div class="form-floating mb-3">
                <input type="text" required class="form-control" name="name" id="floatingNameInput" placeholder="Username" style="width: 320px;">
                <label for="floatingNameInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" style="width: 320px;">
                <label for="floatingInput">Email address</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" required class="form-control" name="password" id="floatingPassword" placeholder="Password" style="width: 320px;">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating">
                <input type="password" required class="form-control" name="cpassword" id="floatingPassword" placeholder="Password" style="width: 320px;">
                <label for="floatingPassword">Confirm Password</label>
              </div>
              <div class="login-button mt-3 justify-content-center d-flex" ">
                         <button type=" submit" class="btn" name="signup" style="width: 320px;">SIGN UP</button>
              </div>

            </form>

            <p class="mt-2">Already have an account? <span style="text-decoration: underline;"> <a href="login.php" style="font-weight: bold; color: rgb(13, 23, 70); ">LOGIN</a> </span></p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer -->
  <?php include 'footer.php' ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
  </script>
  </body > 
  </html>