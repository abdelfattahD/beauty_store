<?php include "db.php"; ?>

<?php session_start()


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->


<link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link rel="stylesheet" href="css/style.css">
<!--===============================================================================================-->
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
			<a class="list-group-item  stext-106 trans-04 cl5 bg2" href="confirm_user.php"> Confirm payment </a>
			<a class="list-group-item text-secondary stext-106 trans-04 " href="edit_account.php"> Settings </a>
            <a class="list-group-item text-secondary stext-106 trans-04" href="change_password.php"> Change password </a>
			<a class="list-group-item text-secondary stext-106 trans-04" href="logout.php"> Log out </a>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">
	<?php 
               
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "INSERT INTO payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) VALUES ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($connection,$insert_payment);
                        
                        $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($connection,$update_customer_order);
                        
                        $update_pending_order = "UPDATE pending_orders SET order_status='$complete' WHERE order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($connection,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('order_user.php','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
          <?php 
           if(isset($_GET['order_id'])){
    
            $order_id = $_GET['order_id'];
            
        }
			
			$get_order = "SELECT * FROM customer_orders WHERE order_id='$order_id'";
			$run_order = mysqli_query($connection,$get_order);

			$row_order = mysqli_fetch_array($run_order);
			$order_id = $row_order['order_id'];
			$due_amount = $row_order['due_amount'];
			$invoice_no = $row_order['invoice_no'];
          ?>
        <div class="card">
            <div class="card-body">
                <form class="row" action="confirm_user.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                        <h4 class="card-title">Please confirm your payment</h4>
                        <br> 
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Invoice NO </label>
                                <input type="text" class="form-control" value="<?php echo $invoice_no; ?>" name="invoice_no">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Amount Sent</label>
                                <input type="text" class="form-control" value="<?php echo $due_amount; ?>" name="amount_sent">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Select Payement Mode </label>
                            <select id="inputState" class="form-control" name="payment_mode">
                                <option> Choose...</option>
                                <option>Back Code</option>
                                <option>paypall / Payo</option>
                                <option selected="">wafa cash</option>
                                <option>Western Union</option>
                            </select>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Transaction/ Reference ID</label>
                            <input type="text" class="form-control" name="ref_no">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Omni Paisa/ East Paisa</label>
                            <input type="text" class="form-control" value="" name="code">
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                            <label>Payment Date</label>
                            <input type="date" class="form-control" value="" name="date">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        <br>
                        <button class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="confirm_payment">Confirm Payment</button>	

                        <br><br>

                    </div> <!-- col.// -->
                    
                </form>
                
                <br> 
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