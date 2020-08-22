<!-- Slide1 -->
<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<!-- <div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-02.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							
							<a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div> -->
				<?php 
								global $connection;

								$get_cate = "SELECT * FROM slide";
								$run_cate = mysqli_query($connection, $get_cate);
								while($row_cate=mysqli_fetch_array($run_cate)){
									$id_slide = $row_cate['id_slide'];
									$title_slide = $row_cate['title_slide'];
									$image_slide = $row_cate['image_slide'];
									$desc_slide = $row_cate['desc_slide'];
							
									?>

				<div class="item-slick1 item2-slick1" style="background-image: url(img/slide/<?php echo $image_slide;?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
						<?php echo $title_slide;?>	
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						<?php echo $desc_slide;?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							
									<?php echo"
									
										<a href='product.php?cat=$id_slide' class='flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4'>
											show product					
										</a>
									
									
									";?>
								 
								
							
						</div>
					</div>
				</div>
				<?php 
				 }
				 ?>

				<!-- <div class="item-slick1 item3-slick1" style="background-image: url(images/master-slide-04.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							kids Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							
							<a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</section>