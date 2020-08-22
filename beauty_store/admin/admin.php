<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

<?php
    session_start();
    $messageL = "";
if (isset($_POST['submit'])) {
  

    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $email = mysqli_real_escape_string($db,$email);
    // $password = mysqli_real_escape_string($db,$password);
   
    $query = "SELECT * FROM adminusers WHERE email_admin = '{$email}'";
    $login_query = mysqli_query($db,$query);


    if (!$login_query) {
        die("QUERY FAILED" . mysqli_error($db));
    }

    while($row = mysqli_fetch_assoc($login_query)){
        $db_id = $row['id_admin'];
        $db_email = $row['email_admin'];
        $hash = $row['password_admin'];
        $db_fname = $row['Fname_admin'];
        $db_lname = $row['lname_admin'];
       
    } 
    // $password = md5($password);
    $row_count = mysqli_num_rows($login_query);
    if ($row_count < 1) {
        $messageL = "<div class='alert alert-danger'>this email does not exist, try again or <a href='register.php'>register</a> </div>";
    }else {
        if ($password=== $hash) {
            $messageL = "<div class='alert alert-success'>Welcome $db_fname </div>";
            $_SESSION['id_admin'] = $db_id;
            $_SESSION['Fname_admin'] = $db_fname;
            $_SESSION['lname_admin'] = $db_lname;
            $messageL =  "<div class='alert alert-danger'>correct</div>";



           header('Location: index.php');
        } else{
            $messageL =  "<div class='alert alert-danger'>$hash your password $password in incorrect id :$db_id</div>";
        }
    }
    

}
?>  

    
    <div class="container4">
        <div class="header3">
            <h2>Admin account</h2>
        </div>
        <form action="admin.php" method="POST" class="form3" id="forme">
            <div class="form3-control">
                <label for="">email </label>
                <input type="email" placeholder="hello@florin.pop" name="email" id="email">
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            
            <div class="form3-control">
                <label for="">password </label>
                <input type="password" placeholder="password" name="password" id="password">
                <i class="fa fa-check-circle"></i>
                <i class="fa fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="btn">
            <input type="submit" id="submit" name="submit" class="btn2" >
            </div>
            <div id="add_err2"><?php echo $messageL ?></div>
        </form>
      
    </div>


    


</body>
</html>
