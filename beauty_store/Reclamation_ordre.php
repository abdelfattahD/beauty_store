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
	<?php include "section/profil_nav.php"?> 

	</aside> <!-- col.// -->
	<main class="col-md-9">
	<?php 
               
                   
                    if(isset($_POST['confirm_reclamation'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        
                        
                        $Reclamation = $_POST['Reclamation'];
                        
                        
                        
                        $complete = "Complete";
                        
                        $insert_reclamation = "INSERT INTO reclamation (order_id,date_recl,reclamation) VALUES ('$update_id',NOW(),'$Reclamation')";
                        
                        $run_reclamation = mysqli_query($connection,$insert_reclamation);
                        
                        
                        
                        if($run_reclamation){
                            
                            echo "<script>alert('Thank You for reclamation, your reclamation will be completed within 24 hours work')</script>";
                            
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
			$image_pro = $row_order['image_pro'];
          ?>
        <div class="card">
            <div class="card-body">
                <form class="row" action="Reclamation_ordre.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                        <h4 class="card-title">Reclamation ordre</h4>
						<div class="col form-group">
                                <label>product </label>
								
					      <img src="img/product/<?php echo $image_pro; ?>" class="img-xs border" width="50" height="50">
				                               
				 </div> <!-- form-group end.// -->
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
                            


						<div class="col-lg-7">
                            <div  class="form-group" >
                                
								<input  class="form-control different-control w-100" name="Reclamation" id="subject" type="text" placeholder="Enter Reclamation">
                            </div> <!-- form-group end.// -->
                            
                        </div> <!-- form-row.// -->
                       

                        <br>
                        <br>
                        <button class="btn stext-101 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="confirm_reclamation">Confirm Reclamation</button>	

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