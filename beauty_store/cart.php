
<?php include "db.php" ?>
<?php


session_start();

if (isset($_SESSION['id'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $client_id = $_SESSION['id'];

    $full_name = $fname . " " . $lname;
?>


<?php 

    //getting the session id
    if (isset($_SESSION['id'])) {
        $client_id = $_SESSION['id'];
    }
    //getting the item id
    if (isset($_GET['item'])) {
        $item_id = $_GET['item'];
        //getting all items from cart table
    $cart_query = "SELECT * FROM cart WHERE item_id = $item_id AND client_id = $client_id";
    $cart_search_query = mysqli_query($connection,$cart_query);
    if (!$cart_search_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($cart_search_query)) {
        $item_title = $row['item_title'];
        $item_image = $row['item_image'];
        $item_price = $row['item_price'];
        $item_quantity = $row['item_quantity'];
    }
    $row_count = mysqli_num_rows($cart_search_query);

    if($row_count > 0){
        $update_query = "UPDATE cart SET item_quantity = item_quantity+1 WHERE item_id = $item_id AND client_id = $client_id";
        $update_item_query = mysqli_query($connection,$update_query);
        header('Location: cart.php');

    }else{
         //getting the item infos from products table
        $item_query = "SELECT * FROM products WHERE product_id = $item_id";
        $item_search_query = mysqli_query($connection,$item_query);

        while ($row = mysqli_fetch_array($item_search_query)) {
            $item_title = $row['product_title'];
            $item_image = $row['product_image'];
            $item_price = $row['product_price'];
            
        }

        if (!$item_search_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

         //adding the item to cart if it doesn't already exist
        $add_query = "INSERT INTO cart(client_id,item_id,item_title,item_image,item_price) VALUES ($client_id,$item_id,'$item_title','$item_image',$item_price)";
        $add_to_cart_query = mysqli_query($connection,$add_query);

        if (!$add_to_cart_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header('Location: cart.php');
    }
    } 
?>

<?php
						if (isset($_GET['remove'])) {
                                $removed_item_id = $_GET['remove'];

                                $remove_query = "DELETE FROM cart WHERE item_id = $removed_item_id AND client_id = $client_id";
                                $removed_item_query = mysqli_query($connection,$remove_query);

                                header('Location: cart.php');
                            }
                            if (isset($_GET['add'])) {
                                $added_item_id = $_GET['add'];

                                $add_item_query = "UPDATE cart SET item_quantity = item_quantity + 1 WHERE item_id = $added_item_id AND client_id = $client_id";
                                $added_item_query = mysqli_query($connection,$add_item_query);

                                header('Location: cart.php');
                            }

                            if (isset($_GET['reduce'])) {
                                $reduced_item_id = $_GET['reduce'];

                                $check_query = "SELECT * FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id ";
                                $check_quantity_query = mysqli_query($connection,$check_query);
                                $check_row = mysqli_fetch_array($check_quantity_query);
                                $quantity = $check_row['item_quantity'];

                                if ($quantity == 1 ) {
                                    $reduce_item_query = "DELETE FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($connection,$reduce_item_query);
                                }else{
                                    $reduce_item_query = "UPDATE cart SET item_quantity = item_quantity - 1 WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($connection,$reduce_item_query);
                                }

                                

                                header('Location: cart.php');
                            }
                        
						
                            
                        ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>beauty_store - Cart</title>
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
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  

  <!--================Cart Area =================-->


  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php 
                            	
                                $cart_query = "SELECT * FROM cart WHERE client_id = $client_id";
                                $cart_search_query = mysqli_query($connection,$cart_query);
                                $total_final= 0;
                            
    
                                while ($row = mysqli_fetch_array($cart_search_query)) {
                                    
                                    $cart_id = $row['item_id'];
                                    $item_title = $row['item_title'];
                                    $item_image = $row['item_image'];
                                    $item_price = $row['item_price'];
                                    $item_quantity = $row['item_quantity'];
                                    $total = $item_price * $item_quantity;
                                    
                                    
                            $total_final=$total_final+$total;
                                
    ?>
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="img/product/<?php echo $item_image ?>" alt="<?php echo $item_title ?> " width='100' height='100'>
                                      </div>
                                      <div class="media-body">
                                          <p><?php  echo $item_title ?></p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5><?php echo $item_price ?></h5>
                              </td>
                              <td>
                                  <div class="product_count">
                                  <a href='cart.php?reduce=<?php echo $cart_id ?>&user=<?php echo $client_id?>' class=" color1 flex-c-m size7 bg8 eff2">										
											<i class="fs-12 fa fa-minus" aria-hidden="true" name="reduce"></i>									
									</a>

									<input class="size8 m-text18 t-center num-product" type="number" id="num-product1"   name="num-product1" value="<?php echo $item_quantity ?>">

									<a href='cart.php?add=<?php echo $cart_id?>&user=<?php echo $client_id ?>' class=" color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true" name="add"></i>
									</a>
                                  </div>
                              </td>
                              <td>
                                  <h5>$<?php echo $total ?></h5>
                              </td>
                          </tr>
                          <?php
							}
							$_SESSION['contor'] = $contor;
                        ?>



                          
                          


<form action="cart.php" method="post" >    


                          <tr class="bottom_button">
                              <td>
                                  <a class="button" href="#">Update Cart</a>
                              </td>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="cupon_text d-flex align-items-center">
                                      <input type="text" name="code" placeholder="Coupon Code" >
                                      <button type="submit" class="primary-btn" href="#"   name="apply_coupon">Apply</button>
                                      <a class="button" href="#">Have a Coupon?</a>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <td>
                                  <h5>$<?php echo $total_final ?></h5>
                              </td>
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Shipping</h5>
                              </td>
                              <td>
                                  <div class="shipping_box">
                                      <ul class="list">
                                          <li><a href="#">Flat Rate: $5.00</a></li>
                                          <li><a href="#">Free Shipping</a></li>
                                          <li><a href="#">Flat Rate: $10.00</a></li>
                                          <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                      </ul>
                                      <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                      <select class="shipping_select">
                                          <option value="1">Bangladesh</option>
                                          <option value="2">India</option>
                                          <option value="4">Pakistan</option>
                                      </select>
                                      <select class="shipping_select">
                                          <option value="1">Select a State</option>
                                          <option value="2">Select a State</option>
                                          <option value="4">Select a State</option>
                                      </select>
                                      <input type="text" placeholder="Postcode/Zipcode">
                                      <a class="gray_btn" href="#">Update Details</a>
                                  </div>
                              </td>
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="gray_btn" href="category.php">Continue Shopping</a>
                                      <a class="primary-btn ml-2" href="payment_options.php">Proceed to checkout</a>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      </form>
  </section>
  <!--================End Cart Area =================-->


  <?php 
	if(isset($_POST['apply_coupon'])){
		$code = $_POST['code'];
		if($code == ""){

		}else{
			$get_coupons = "SELECT * FROM coupons WHERE coupon_code ='$code'";
			$run_coupons = mysqli_query($connection, $get_coupons);
            $check_coupons = mysqli_num_rows($run_coupons);
            

			if($check_coupons = "1"){
				$row_coupons = mysqli_fetch_array($run_coupons);
				$coupon_pro_id = $row_coupons['product_id'];
				$coupon_price = $row_coupons['coupon_price'];
				$coupon_limit = $row_coupons['coupon_limit'];
                $coupon_used = $row_coupons['coupon_used'];
                $coupon_type  = $row_coupons['coupon_type'];

                

				if($coupon_limit == $coupon_used){
				    echo " <script>alert('Your Coupon Already Expired')</script>";	
				}else{
                   




                   

					
                    if($coupon_type == "0"){
                        $get_cart = "SELECT * FROM cart WHERE item_id='$coupon_pro_id' AND client_id ='$client_id'";
                        $run_cart = mysqli_query($connection, $get_cart);
                        $check_cart = mysqli_num_rows($run_cart);



					if($check_cart = "1"){

                        
                        

                        
                           



                        $get_priceP = "SELECT * FROM cart WHERE item_id ='$coupon_pro_id'";
                        $run_get_priceP = mysqli_query($connection, $get_priceP);
                        $row_price = mysqli_fetch_array($run_get_priceP);
                        $product_price = $row_price['item_price'];


                        $pro_c_pri = $coupon_price *( $product_price/100);
                        $product_priceF = $product_price - $pro_c_pri ;




						$add_used = "UPDATE coupons SET coupon_used=coupon_used+1 WHERE coupon_code ='$code'";
						$run_used = mysqli_query($connection, $add_used);
						$update_cart = "UPDATE cart SET item_price='$product_priceF' WHERE item_id='$coupon_pro_id' AND client_id ='$client_id'";
						$run_update_cart = mysqli_query($connection, $update_cart);
						echo " <script>alert('Your Coupon Has Been Applied')</script>";
						echo " <script>window.open('cart.php','_self')</script>";
                    
                      }

                    }
                    
                    if($coupon_type = 1){


                        $get_cart =" SELECT * FROM cart LEFT JOIN products ON cart.item_id  = products.product_id   WHERE product_CategoryId ='$coupon_pro_id' AND client_id ='$client_id'";
                        $run_cart = mysqli_query($connection, $get_cart);
                        $check_cart = mysqli_num_rows($run_cart);



					 if($check_cart = "1"){
                         
                        $get_priceP = "SELECT * FROM cart LEFT JOIN products ON cart.item_id  = products.product_id   WHERE product_CategoryId ='$coupon_pro_id'";
                        $run_get_priceP = mysqli_query($connection, $get_priceP);


                        while ($row_price = mysqli_fetch_array($run_get_priceP)) {
                            $product_price = $row_price['item_price'];
                            $ctg_pro_id = $row_price['item_id'];


                        $pro_c_pri = $coupon_price *( $product_price/100);
                        $product_priceF = $product_price - $pro_c_pri ;




						
						$update_cart = "UPDATE cart SET item_price='$product_priceF' WHERE item_id='$ctg_pro_id' AND client_id ='$client_id'";
						$run_update_cart = mysqli_query($connection, $update_cart);
                        
                    }

                    $add_used = "UPDATE coupons SET coupon_used=coupon_used+1 WHERE coupon_code ='$code'";
						$run_used = mysqli_query($connection, $add_used);
                    echo " <script>alert('Your Coupon catigory Has Been Applied')</script>";
                        echo " <script>window.open('cart.php','_self')</script>";

                      }
                    
                    
                    }
                    
                    
                    
                    
                    else{
						echo " <script>alert('Your Coupon Didnt Match With your Product in your cart )</script>";
                     }
                    



                  
                }
                

                
			}else{
				echo " <script>alert('Your Coupon is Not Valid')</script>";
			}
		}
	}
	
	?>



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



<?php

}
else {
    header("location:login.php");
}

?>