
<?php include "db.php"; ?>
<?php
session_start();



?>
<?php


$messageL = "";
if (isset($_POST['login'])) {


$email = $_POST['email'];
$password = $_POST['Password'];



$query = "SELECT * FROM users WHERE Email = '{$email}'";
$login_query = mysqli_query($connection,$query);

if (!$login_query) {
    die("QUERY FAILED" . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($login_query)){
    $db_id = $row['id'];
    $db_email = $row['Email'];
    $hash = $row['Password'];
    $db_fname = $row['Fname'];
    $db_lname = $row['Lname'];
   
} 
$row_count = mysqli_num_rows($login_query);
if ($row_count < 1) {
    $messageL = "<div class='alert alert-danger'>this email does not exist, try again or <a href='register.php'>register</a> </div>";;
}else {
    $hash = substr( $hash, 0, 100 );
    if (password_verify($password, $hash)) {
         $messageL = "<div class='alert '>Welcome $db_fname </div>";
        $_SESSION['id'] = $db_id;
        $_SESSION['fname'] = $db_fname;
  $_SESSION['lname'] = $db_lname;
  $_SESSION['welcome'] = $messageL;
  

  header("location:index.php");
  


    } else{
        $messageL =  "<div class='alert alert-danger'> your password in incorrect</div>";
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
  <?php include 'section/start_banner_login.php' ?>

	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================--> 
  <?php include 'section/Login_Box_section.php' ?>

	<!--================End Login Box Area =================-->



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