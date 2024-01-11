<?php
@include 'config.php';
session_start();

if(isset($_POST['fps1submit'])){
    
   $username = mysqli_real_escape_string($conn, $_POST['fusername']);
   $pass = md5($_POST['fpassword']);
   $cpass = md5($_POST['fcpassword']);
   $select = " SELECT * FROM users1 WHERE  username = '$username'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      if($pass != $cpass){
        $error[] = 'Password not mathched!';
      }

      else{
       $update = mysqli_query($conn, "UPDATE users1 SET password='$pass' WHERE username='$username'");
       mysqli_query($conn, $update);
       header('location:forgot_success_msg.php');
      }
    }  
   else{
      $error[] = 'User not exist !!';
   }

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UNIQUE-FORGOT PASS</title>
  
   <!-- Bootstrap CSS  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!-- Fontawesome Icon  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>

<section class="forgot margin">
  <div class="container">
    <div class="row">
        <h2>Recover Your Password</h2>
      <div class="col-lg-12">
        <form action="" method="post">

          <?php
          if(isset($error)){
          foreach($error as $error){
          echo '<span class="error-msg">'.$error.'</span>';
                }
              }
          ?>

          <input type="text" name="fusername" aria-label="name" placeholder="Username" required class="input-field">

          <input type="Password" name="fpassword" aria-label="fpassword" placeholder="New Password" required class="input-field">

          <input type="Password" name="fcpassword" aria-label="fcpassword" placeholder="Confirm New Password" required class="input-field">

                         
          <button type="submit" class="btnn" name="fps1submit">
            <span class="span">UPDATE</span>
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