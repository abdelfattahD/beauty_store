<section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          
          <h2>meilleure  <span class="section-intro__style">promotion de catégorie</span></h2>
        </div>
                   
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
        <?php 
                            $query = "SELECT * FROM categories WHERE promo_categorie > 0";
                            $load_products_query = mysqli_query($connection,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $Category_id = $row['Id'];
                                $Category_title = $row['Category_title'];
                                $Category_image = $row['Category_image'];
                              
                                
								$promo_categorie = $row['promo_categorie'];
        ?>
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="img/categories/<?php echo $Category_image ?>" alt="<?php echo $Category_image ?>"width='263' height='280'>
              <ul class="card-product__imgOverlay">
                <li><button><i class="ti-search"></i></button></li>
                <li><button> <a href = "category.php?item_ctgry=<?php echo $Category_id ?>"  data-dismiss="modal"><i class="ti-shopping-cart"></a></i></button>
                <li><button><i class="ti-heart"></i></button></li>
              </ul>
            </div>
            <div class="card-body">
              
              <h4 class="card-product__title"><a href = "category.php?item_ctgry=<?php echo $Category_id ?>"  data-dismiss="modal"><?php echo $Category_title ?></a></h4>
              <p class="card-product__price">% <?php echo $promo_categorie ?></p>
            </div>
          </div>

          <?php
                            }
                        ?>

    </section>