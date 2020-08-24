
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
    <?php include "section/profil_user.php"?> 
    <?php include "section/profil_nav.php"?> 

    
	</aside> <!-- col.// -->
	<main class="col-md-9">
            
		<article class="card mb-4">
        <?php 
		$user_session = $_SESSION['fname'];
		$client_id = $_SESSION['id'];

        
		$get_user = "SELECT * FROM users WHERE id='$client_id'";
        
        $run_user = mysqli_query($connection,$get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $user_id = $row_user['id'];
        $user_name = $row_user['Fname'];
        $user_email = $row_user['Email'];
        $user_city = $row_user['ville'];
        $user_adress = $row_user['address'];
        $user_contact = $row_user['numero'];
        
        $get_orders = "SELECT * FROM customer_orders WHERE customer_id='$client_id'";
        
        $run_orders = mysqli_query($connection,$get_orders);

        $row_orders = mysqli_fetch_array($run_orders);
        $invoice_no = $row_orders['invoice_no'];
        $order_date = substr($row_orders['order_date'],0,11);
        
        ?>
		<header class="card-header">
			
			<strong class="d-inline-block mr-3">Order ID: <?php echo $invoice_no; ?>  </strong>
			<span>Order Date: <?php echo $order_date; ?> </span>
		</header>
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-8">
					<h6 class="text-muted">Delivery to</h6>
					<p> <?php echo $user_name; ?><br>  
					Phone: <?php echo $user_contact; ?>, Email: <?php echo $user_email; ?> <br>
			    	Location: <?php echo $user_adress; ?> <br> 
			    	<?php echo $user_city; ?>
			 		</p>
				</div>
				<div class="col-md-4">
					<h6 class="text-muted">Payment</h6>
					
					<p>Subtotal: $356 <br>
					 Shipping fee:  $56 <br> 
					 <span class="b">Total:  $456 </span>
					</p>
				</div>
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<div class="table-responsive">
		<table class="table table-hover">
			<tbody>
            <?php 
            $get_orders = "SELECT * FROM customer_orders WHERE customer_id='$client_id' AND order_status = 'Complete' ";
        
			$run_orders = mysqli_query($connection,$get_orders);
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                $due_amount = $row_orders['due_amount'];
                $image_pro = $row_orders['image_pro'];
                $title_pro = $row_orders['title_pro'];
                $qty = $row_orders['qty'];
                $size = $row_orders['size'];
                $color = $row_orders['color'];
                $order_status = $row_orders['order_status'];
                
               
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
           

            <tr>
				<td width="65">
					<img src="img/product/<?php echo $image_pro; ?>" class="img-xs border" width="110%" height="120%">
				</td>
				<td> 
					<p class="title mb-0"><?php echo $title_pro; ?> </p>
					<var class="price text-muted"><?php echo $due_amount; ?> DH</var>
				</td>
				<td> <?php echo $size; ?> <br> <?php echo $color; ?> </td>
                <td> 
                    <p class="title mb-0"> <?php echo $qty.'Pièce'; ?> </p>
					<var class="price text-muted"> <?php echo $order_status; ?> </var>
				</td>
                
				<td width="250"> 
                    <a href="Reclamation_ordre.php?order_id=<?php echo $order_id; ?>" class="btn stext-101 cl2 bg8 bor13 hov-btn3 p-lr-15  pointer m-tb-10">Réclamation</a> 
					
				</td>
			</tr>
			<?php } ?>
			
		</tbody></table>
		</div> <!-- table-responsive .end// -->
        
		</article> <!-- card order-item .// -->

		
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