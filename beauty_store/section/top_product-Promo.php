
<section class="section-margin calc-60px">
      <div class="container">
     
        <div class="section-intro pb-60px">
          <h2>meilleur <span class="section-intro__style">produit promo</span></h2>
        </div>
        <div class="row">

        <?php 
                            $query = "SELECT * FROM products WHERE promo_product > 0";
                            $load_products_query = mysqli_query($connection,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {

                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_price = $row['product_price']; 
                            $product_image = $row['product_image']; 
                            $product_desc = $row['product_desc'];

                          
                            
            $promo_product = $row['promo_product'];
            $promo_pri = $promo_product *( $product_price/100);
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
    
    <div class="price">$<?php echo $product_priceFinal ?> <span class="old-price">$<?php echo $product_price ?></span></div>
  </div>

</div>
<?php
                            }
                        ?>


</div>
</section>