<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	
	   <!-- Bootstrap CSS  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!-- Fontawesome Icon  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Custom CSS -->
	   <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>

<section class="welcome margin">
	<div class="container">
		<div class="row">
                 
		  <div class="col-lg-12">
        <div class="hhh">
          <h2 class="align-middle">Welcome</h2>
          <p><span><?php echo $_SESSION['username']; ?></span></p>
                       
          <a href="logout.php" class="btnnn" style="text-decoration: none; background-color: orangered;">
                <span class="span">LOGOUT</span>
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
          </a>
        </div>
			</div>

		</div>
	</div>
</section>


      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>