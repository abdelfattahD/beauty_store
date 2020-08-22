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
<!--===============================================================================================-->

<!--===============================================================================================-->

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
<section class="section-pagetop p-tb-30">
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
		<nav class="list-group">
			<a class="list-group-item stext-106 trans-04 cl5 bg2 " href="account_user.php"> Account overview  </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="order_user.php"> My Orders </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="confirm_user.php"> Confirm payment </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="edit_account.php"> Settings </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">

		<article class="card mb-3">

			<?php 
			$user_session = $_SESSION['fname'];
			$client_id = $_SESSION['id'];
				
			$get_user = "SELECT * FROM users WHERE id='$client_id'";
			
			$run_user = mysqli_query($connection,$get_user);
			
			$row_user = mysqli_fetch_array($run_user);
			
			$user_id = $row_user['id'];
			$user_city = $row_user['ville'];
			$user_adress = $row_user['address'];
			
			?>
			<div class="card-body">
			        <?php include "section/profil_user.php"?>
					<hr>
					<p>
						<i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
						<br>
						 <?php echo $user_city; ?>, <?php echo $user_adress; ?>
						<a href="edit_account.php" class="btn-link"> Edit</a>
					</p>
			  
				

				<article class="card-group card-stat">
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">38</h4>
							<span>Orders</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">5</h4>
							<span>Wishlists</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">12</h4>
							<span>Awaiting delivery</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h4 class="title">50</h4>
							<span>Delivered items</span>
						</div>
					</figure>
				</article>
				

			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

		<article class="card  mb-3">
			<div class="card-body">
				<h5 class="card-title mb-4">Recent orders </h5>	
				
				<div class="row">
				
				<?php 
						
						
						
						$get_orders = "SELECT * FROM customer_orders WHERE customer_id='$client_id'";
				
						$run_orders = mysqli_query($connection,$get_orders);
						$i = 0;
					
						while($row_orders = mysqli_fetch_array($run_orders)){
							
							$order_id = $row_orders['order_id'];
							$due_amount = $row_orders['due_amount'];
							$image_pro = $row_orders['image_pro'];
							$title_pro = $row_orders['title_pro'];
							$qty = $row_orders['qty'];
							$size = $row_orders['size'];
							$color = $row_orders['color'];
							$order_status = $row_orders['order_status'];
							
							$i++;
							
							if($order_status=='pending'){
								
								$order_status = 'Unpaid';
								
							}else{
								
								$order_status = 'Paid';
								
							}
						?>
						<div class="col-md-6">
					<figure class="itemside  mb-3">
					
						<div class="aside"><img src="img/product/<?php echo $image_pro; ?>" class="border img-sm" width="30%" height="10%" ></div>
						<figcaption class="info">
							<time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
							<p><?php echo $title_pro; ?> </p>
							<span class="text-success">Order confirmed </span>
						</figcaption>
						
					</figure>
					</div> <!-- col.// -->
					<?php } ?>
				
				
			</div> <!-- row.// -->

			<a href="#" class="btn btn-outline-primary btn-block"> See all orders <i class="fa fa-chevron-down"></i>  </a>
			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
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