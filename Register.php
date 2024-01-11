
<?php
@include 'config.php';
session_start();

if(isset($_POST['rsubmit'])){
    
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['pswd']);
   $cpass = md5($_POST['cpswd']);
   $select = " SELECT * FROM users1 WHERE username = '$username'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exist.';
   }
   else{
      if($pass != $cpass){
         $error[] = 'Password not mathched.';
      }else{
         $insert = "INSERT INTO users1(username, email, password) VALUES('$username','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UNIQUE-REGISTER</title>
  
     <!-- Bootstrap CSS  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!-- Fontawesome Icon  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>

<section class="Register margin">
  <div class="container">
    <div class="row">
        <h2>Sign Up</h2>
        <div class="col-lg-12">
            <form action="" method="post">

              <?php
                      if(isset($error)){
                      foreach($error as $error){
                      echo '<span class="error-msg">'.$error.'</span>';
                    }
                  }
              ?>

              <input type="text" name="username" aria-label="username" placeholder="Usename" required class="input-field">

              <input type="email" name="email" aria-label="email" placeholder="Email" required class="input-field">

              <input type="Password" name="pswd" aria-label="Password" placeholder="Password" required class="input-field">

              <input type="Password" name="cpswd" aria-label="cpassword" placeholder="Confirm Password" required class="input-field">

              <p class="alrdy-rgtrd-text">Already Registerd?<a href="login.php">Sign In</a></p>

              <button type="submit" name="rsubmit" class="btnn">
                <span class="span">SIGN UP</span>
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
              </button>

            </form>
        </div>

    </div>
  </div>
</section>


      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>