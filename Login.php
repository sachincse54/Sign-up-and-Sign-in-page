<?php
@include 'config.php';
session_start();
if(isset($_POST['lsubmit'])){
    
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   $select = " SELECT * FROM users1 WHERE  username = '$username' && password = '$password'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['username'] = $username;
      header('location:welcome.php');
   }else{
      $error[] = 'Incorrect Username or password.';
   }

}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UNIQUE-LOGIN</title>
  
     <!-- Bootstrap CSS  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!-- Fontawesome Icon  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>

<section class="login margin">
  <div class="container">
    <div class="row">
        <h2>Sign In</h2>
          <div class="col-lg-12">
              <form action="" method="post">

                <?php
                if(isset($error)){
                foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
                      }
                    }
                ?>

                <input type="text" name="username" aria-label="name" placeholder="Username" required class="input-field">

                <input type="Password" name="password" aria-label="email" placeholder="Password" required class="input-field">

                <p class="forgot-text"><a href="forgetpassword.php">Forgot Password</a></p>

                <p class="not-member-text">Not a Member?<a href="register.php">Sign Up</a></p>

                    <button type="submit" class="btnn" name="lsubmit">
                      <span class="span">SIGN IN</span>
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