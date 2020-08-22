
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">

            <?php 
               $per_page = 9;
              
               if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }

            if (isset($_GET['item_ctgry'])) {
                $item_ctgry = $_GET['item_ctgry'];
            
             $start_from = ($page-1) * $per_page;

              $query = "SELECT * FROM products  LEFT JOIN categories ON products.product_CategoryId = categories.Id  WHERE product_CategoryId =$item_ctgry AND product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page ";   
              $load_products_query = mysqli_query($connection,$query);


            }
            elseif  (isset($_GET['sub_ctgry'])) {
              $sub_ctgry = $_GET['sub_ctgry'];
            
             $start_from = ($page-1) * $per_page;

              $query = "SELECT * FROM products  LEFT JOIN sou_category ON products.Sou_CategoryId = sou_category.Id  WHERE Sou_CategoryId =$sub_ctgry AND product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page ";   
              $load_products_query = mysqli_query($connection,$query);

            }
            
            
            else{
             

              $start_from = ($page-1) * $per_page;
                            $query = "SELECT * FROM products  LEFT JOIN categories ON products.product_CategoryId = categories.Id  WHERE product_archif=0 ORDER BY 1 DESC LIMIT $start_from,$per_page";
                            $load_products_query = mysqli_query($connection,$query);

                          }

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                              $product_id = $row['product_id'];
                              $product_title = $row['product_title'];
                              $product_price = $row['product_price']; 
                              $product_image = $row['product_image']; 
                              $product_desc = $row['product_desc'];
                              $promo_categorie = $row['promo_categorie'];
                              $promo_product = $row['promo_product'];

   
                              
              $promo_pri = $promo_product *( $product_price/100);
              $product_priceFinal = $product_price - $promo_pri ;

              $promo_pri = $promo_categorie *( $product_price/100);
              $product_priceFinal = $product_price - $promo_pri ;
								
                                ?>
             <div class="block">

<div class="top">
  <ul>
    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    <li><span class="converse"><a href = "single-product.php?item=<?php echo $product_id ?>"  data-dismiss="modal"><?php echo $product_title ?></a></span></li>
    <li><a href = "cart.php?item=<?php echo $product_id ?>" ><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
  </ul>
</div>

<div class="middle">
<a href = "single-product.php?item=<?php echo $product_id ?>"  data-dismiss="modal"> <img src="img/product/<?php echo $product_image ?>" alt="<?php echo $product_image ?>" > </a>
</div>

<div class="bottom">
  <div class="heading"><?php echo $product_desc ?></div>
  <div class="info"><?php echo $product_desc ?></div>

  <?php
        if ($promo_pri > 0) {

                        ?>

  
  <div class="price">$<?php echo $product_priceFinal ?> <span class="old-price">$<?php echo $product_price ?></span></div>
  <?php
       }else{ 
                        ?>
      <div class="price">$<?php echo $product_price ?> </div>


<?php
}
                        ?>


</div>

</div>
              <?php
                            }
                        ?>
			 </ul>
			
             
            </div>
          </section>

          <!-- Load more -->
				<div class="flex-c-m flex-w w-full p-t-45">
						<ul class="pagination">
						<?php 

						$view_products = "SELECT * FROM products";
						$result = mysqli_query($connection,$view_products);
						$total_records = mysqli_num_rows($result);
						$total_page = ceil($total_records /$per_page);

						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=1'>".'First page'."</a>
							</li>
						";

						for ($i=1; $i <= $total_page; $i++) { 
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=".$i."'>".$i."</a>
							</li>
						";

						}
						echo"
							<li class='page-item'>
								<a class='page-link cl5 bg2 hov-btn1 p-lr-15' href='category.php?page=$total_page'>".'Last page'."</a>
							</li>
						";

							
						
						
						?>

						<!-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
							Load More
						</a> -->
						</ul>
				</div>

				
			</div>
		</div>
	</div>