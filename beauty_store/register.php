
<?php include "db.php"; ?>
<?php
session_start();
$welcome = $_SESSION['welcome'];


?>

<?php

$message = "";

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordc = $_POST['confirmPassword'];

    $fname = mysqli_real_escape_string($connection,$fname);
    $lname = mysqli_real_escape_string($connection,$lname);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);

    
    

    $search_query = "SELECT * FROM users WHERE Email = '$email'";
    $search_result = mysqli_query($connection,$search_query);
    
    if (strlen($fname)<2){

        $message = "<div class='alert alert-danger'>your first name is too short</div>";

    }else if (strlen($lname)<2){

        $message = "<div class='alert alert-danger'>your last name is too short</div>";

    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $message = "<div class='alert alert-danger'>your email format is invalid</div>";

    }else if (mysqli_num_rows($search_result) > 0) {

        $message = "<div class='alert alert-danger'>your email already exists, please login</div>";

    }else if (!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){

        $message = "<div class='alert alert-danger'>your password should have at least a capital, a lower a number, a special caracter and should be longer than 6 caracters</div>";

    }else if ($passwordc !== $password ){

        $message = "<div class='alert alert-danger'>your password should  be same of password confrmed</div>";

    }
    else{
	
		$password = password_hash($password, PASSWORD_DEFAULT);
       
    $query = "INSERT INTO users(Fname,Lname,Email,Password) VALUES ('{$fname}','{$lname}','{$email}','{$password}')";
    $register_query = mysqli_query($connection,$query);
  $message = "<div class='alert alert-success'>registration submitted</div>";
  echo " <script>alert('You has been registred successfully')</script>";
    header("Location: login.php");
    if (!$register_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    }

}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>beauty_store - Login</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--================ Start Header Menu Area =================-->
	<?php include 'section/Header_Menu.php' ?>

	<!--================ End Header Menu Area =================-->
  
  <!-- ================ start banner area ================= -->	
  <?php include 'section/start_banner_Register.php' ?>

	<!-- ================ end banner area ================= -->
  
  <!--================Register Box Area =================--> 
  <?php include 'section/Register_Box.php' ?>

	<!--================End Register Box Area =================-->



  <!--================ Start footer Area  =================-->	
  <?php include 'section/footer.php' ?>

	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>