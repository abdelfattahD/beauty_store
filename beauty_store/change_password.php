<?php include "db.php"; ?>

<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link rel="stylesheet" href="css/style.css">
</head>
<body class="animsition">
	
	<!-- Header -->
	<?php include 'section/Header_Menu.php' ?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop  p-tb-30">
<div class="container">
	<h2 class="title-page">My account</h2>
</div> <!-- container //  -->

</section>
<!-- ========================= SECTION PAGETOP END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
    <?php include "section/profil_user.php"?>
		<nav class="list-group">
            <a class="list-group-item text-secondary stext-106 trans-04" href="account_user.php"> Account overview  </a>
            <a class="list-group-item text-secondary stext-106 trans-04  " href="order_user.php"> My Orders </a>
            <a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
            <a class="list-group-item text-secondary stext-106 trans-04 " href="edit_account.php"> Settings </a>
			<a class="list-group-item  stext-106 trans-04 cl5 bg2" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="row" action="" method="post" >
                    <div class="col-md-9">
                    <br><br>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Your Old Password:</label>
                                <input type="password" class="form-control" name="old_pass" >
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Your New Password:</label>
                                <input type="password" class="form-control" name="new_pass" >
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Confirm Your New Password:</label>
                            <input type="password" class="form-control" name="new_pass_again" >
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <button name="change_pass" class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Save</button>

                        <br><br><br>

                    </div> <!-- col.// -->
                    
                </form>

                <?php 

                if(isset($_POST['change_pass'])){
                    
					$c_username = $_SESSION['fname'];
					$client_id = $_SESSION['id'];

                    
                    $c_old_pass = $_POST['old_pass'];
                    
                    $c_new_pass = $_POST['new_pass'];
                    
                    $c_new_pass_again = $_POST['new_pass_again'];
                   
                   
                    
                    $sel_c_old_pass = "SELECT * FROM users WHERE id='$client_id'";
                    
                    $run_c_old_pass = mysqli_query($connection,$sel_c_old_pass);
                    
					$check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
					
					$hash = $check_c_old_pass['Password'];
					$hash = substr( $hash, 0, 100 );

					if (password_verify($c_old_pass, $hash)) {

						if($c_new_pass!=$c_new_pass_again){
                        
							echo "<script>alert('Sorry, your new password did not match')</script>";
							
							exit();
							
						}
						$c_new_pass = password_hash($c_new_pass, PASSWORD_DEFAULT);
                    $update_c_pass = "UPDATE users SET Password='$c_new_pass' WHERE Fname='$c_username'";
                    
                    $run_c_pass = mysqli_query($connection,$update_c_pass);
                    
                    if($run_c_pass){
                        
                        echo "<script>alert('Your password has been updated')</script>";
                        
                        echo "<script>window.open('account_user.php','_self')</script>";
                        
                    }


					}                
                   else{
                        
                        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
                        
                        exit();
                        
                    }
                    
                   
                    
                    
                }

                ?>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->

        <br> <br> <br> <br> <br>

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


       	<!-- Footer -->
		   <?php include 'section/footer.php' ?>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>