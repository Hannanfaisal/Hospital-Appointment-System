<?php include 'connection.php';

session_start();

if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];


  $select_query = "SELECT * FROM USERS WHERE USER_EMAIL = '$email'";
  $execute_select_query = mysqli_query($con, $select_query);
  $record = mysqli_fetch_assoc($execute_select_query);

  $admin_email = 'admin1@gmail.com';
  $admin_password = '123456';

  if (($record['user_email'] == $admin_email) && ($record['user_password'] == $admin_password)) {
    $_SESSION['admin_email'] = $admin_email;
    header('location:admin_home.php');
    exit();
  }


  if (($record['user_email'] == $email) && ($record['user_password'] == $password)) {
    $_SESSION['email'] = $email;
    header('location: index.php');
    exit();
  } else {
    echo "<div class='bg-danger text-white text-center p-2'><h4>Enter a Valid Email or Password</h4></div>";
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
          <div class="login-form  p-4 " style=" text-align: center; border-radius: 5px; background-color: whitesmoke;">
            <h2>LOGIN</h2>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="email" required class="form-control" name="email" id="floatingInput" placeholder="name@example.com" style="width: 320px;">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" required class="form-control" name="password" id="floatingPassword" placeholder="Password" style="width: 320px;">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="login-button mt-3 justify-content-center d-flex" ">
                         <button type=" submit" class="btn" name="login" style="width: 320px;">LOGIN</button>
              </div>

            </form>

            <p class="mt-2">Create new Account? <span style="text-decoration: underline;"> <a href="signup.php" style="font-weight: bold; color: rgb(13, 23, 70); ">SIGN UP</a> </span></p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>