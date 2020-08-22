<?php include "db.php"; ?>

<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>beauty_store - Blog</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <?php include 'section/Header_Menu.php' ?>

	<!--================ End Header Menu Area =================-->


  <!-- ================ start banner area ================= -->	
  <section class="blog-banner-area" id="blog">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Our Blog</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ end banner area ================= -->


  <!--================Blog Categorie Area =================-->
  <section class="blog_categorie_area">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="categories_post">
                <img class="card-img rounded-0" src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                <div class="categories_details">
                    <div class="categories_text">
                        <a href="single-blog.html">
                            <h5>Social Life</h5>
                        </a>
                        <div class="border_line"></div>
                        <p>Enjoy your social life together</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
          <div class="categories_post">
            <img class="card-img rounded-0" src="img/blog/cat-post/cat-post-2.jpg" alt="post">
            <div class="categories_details">
              <div class="categories_text">
                <a href="single-blog.html">
                    <h5>Politics</h5>
                </a>
                <div class="border_line"></div>
                <p>Be a part of politics</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="categories_post">
                <img class="card-img rounded-0" src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                <div class="categories_details">
                    <div class="categories_text">
                        <a href="single-blog.html">
                            <h5>Food</h5>
                        </a>
                        <div class="border_line"></div>
                        <p>Let the food be finished</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog Categorie Area =================-->








  <!--================Blog Area =================-->

  




  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                  <?php 
               $per_page = 9;
              
               if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                $page = 1;
              }


              $start_from = ($page-1) * $per_page;
                            $query = "SELECT * FROM blog  ORDER BY 1 DESC LIMIT $start_from,$per_page";
                            $load_blogs_query = mysqli_query($connection,$query);

                          

                            if (!$load_blogs_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_blogs_query)) {
                              
                              $title_blog = $row['title_blog'];
                              $parg_blog = $row['parg_blog']; 
                              $blog_img = $row['blog_img']; 
                              $blog_date = $row['blog_date'];
                              $id_blog = $row['id_blog']
                              ?>



                      <article class="row blog_item">
                          <div class="col-md-3">
                              <div class="blog_info text-right">
                                  <div class="post_tag">
                                      <a href="#">Food,</a>
                                      <a class="active" href="#">Technology,</a>
                                      <a href="#">Politics,</a>
                                      <a href="#">Lifestyle</a>
                                  </div>
                                  <ul class="blog_meta list">
                                      <li>
                                          <a href="#">Mark wiens
                                              <i class="lnr lnr-user"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#"><?php echo $blog_date ?>
                                              <i class="lnr lnr-calendar-full"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">1.2M Views
                                              <i class="lnr lnr-eye"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">06 Comments
                                              <i class="lnr lnr-bubble"></i>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-md-9">
                              <div class="blog_post">
                                  <img src="img/blog/<?php echo $blog_img ?>" alt="<?php echo $blog_img ?>  width='555' height='280'">
                                  <div class="blog_details">
                                      <a href="single-blog.php?id_blog=<?php echo $id_blog ?>">
                                          <h2><?php echo $title_blog ?></h2>
                                      </a>
                                      <?php echo $parg_blog ?>
                                      <a class="button button-blog" href="single-blog.php?id_blog=<?php echo $id_blog ?>">View More</a>
                                  </div>
                              </div>
                          </div>
                      </article>

                      <?php
                         }
                        ?>


                      <div class="flex-c-m flex-w w-full p-t-45">
						<ul class="pagination">
						<?php 

						$view_blog = "SELECT * FROM blog";
						$result = mysqli_query($connection,$view_blog);
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
              <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                      <aside class="single_sidebar_widget search_widget">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search Posts">
                              <span class="input-group-btn">
                                  <button class="btn btn-default" type="button">
                                      <i class="lnr lnr-magnifier"></i>
                                  </button>
                              </span>
                          </div>
                          <!-- /input-group -->
                          <div class="br"></div>
                      </aside>
                      <aside class="single_sidebar_widget author_widget">
                          <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                          <h4>Charlie Barber</h4>
                          <p>Senior blog writer</p>
                          <div class="social_icon">
                              <a href="#">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#">
                                  <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#">
                                  <i class="fab fa-github"></i>
                              </a>
                              <a href="#">
                                <i class="fab fa-behance"></i>
                              </a>
                          </div>
                          <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                              have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                              detractors.
                          </p>
                          <div class="br"></div>
                      </aside>
                      <aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Popular Posts</h3>
                          <div class="media post_item">
                              <img src="img/blog/popular-post/post1.jpg" alt="post">
                              <div class="media-body">
                                  <a href="single-blog.html">
                                      <h3>Space The Final Frontier</h3>
                                  </a>
                                  <p>02 Hours ago</p>
                              </div>
                          </div>
                          <div class="media post_item">
                              <img src="img/blog/popular-post/post2.jpg" alt="post">
                              <div class="media-body">
                                  <a href="single-blog.html">
                                      <h3>The Amazing Hubble</h3>
                                  </a>
                                  <p>02 Hours ago</p>
                              </div>
                          </div>
                          <div class="media post_item">
                              <img src="img/blog/popular-post/post3.jpg" alt="post">
                              <div class="media-body">
                                  <a href="single-blog.html">
                                      <h3>Astronomy Or Astrology</h3>
                                  </a>
                                  <p>03 Hours ago</p>
                              </div>
                          </div>
                          <div class="media post_item">
                              <img src="img/blog/popular-post/post4.jpg" alt="post">
                              <div class="media-body">
                                  <a href="single-blog.html">
                                      <h3>Asteroids telescope</h3>
                                  </a>
                                  <p>01 Hours ago</p>
                              </div>
                          </div>
                          <div class="br"></div>
                      </aside>
                      <aside class="single_sidebar_widget ads_widget">
                          <a href="#">
                              <img class="img-fluid" src="img/blog/add.jpg" alt="">
                          </a>
                          <div class="br"></div>
                      </aside>
                      <aside class="single_sidebar_widget post_category_widget">
                          <h4 class="widget_title">Post Catgories</h4>
                          <ul class="list cat-list">
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Technology</p>
                                      <p>37</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Lifestyle</p>
                                      <p>24</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Fashion</p>
                                      <p>59</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Art</p>
                                      <p>29</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Food</p>
                                      <p>15</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Architecture</p>
                                      <p>09</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="d-flex justify-content-between">
                                      <p>Adventure</p>
                                      <p>44</p>
                                  </a>
                              </li>
                          </ul>
                          <div class="br"></div>
                      </aside>
                      <aside class="single-sidebar-widget newsletter_widget">
                          <h4 class="widget_title">Newsletter</h4>
                          <p>
                              Here, I focus on a range of items and features that we use in life without giving them a second thought.
                          </p>
                          <div class="form-group d-flex flex-row">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                          <i class="fa fa-envelope" aria-hidden="true"></i>
                                      </div>
                                  </div>
                                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
                                      onblur="this.placeholder = 'Enter email'">
                              </div>
                              <a href="#" class="bbtns">Subcribe</a>
                          </div>
                          <p class="text-bottom">You can unsubscribe at any time</p>
                          <div class="br"></div>
                      </aside>
                      <aside class="single-sidebar-widget tag_cloud_widget">
                          <h4 class="widget_title">Tag Clouds</h4>
                          <ul class="list">
                              <li>
                                  <a href="#">Technology</a>
                              </li>
                              <li>
                                  <a href="#">Fashion</a>
                              </li>
                              <li>
                                  <a href="#">Architecture</a>
                              </li>
                              <li>
                                  <a href="#">Fashion</a>
                              </li>
                              <li>
                                  <a href="#">Food</a>
                              </li>
                              <li>
                                  <a href="#">Technology</a>
                              </li>
                              <li>
                                  <a href="#">Lifestyle</a>
                              </li>
                              <li>
                                  <a href="#">Art</a>
                              </li>
                              <li>
                                  <a href="#">Adventure</a>
                              </li>
                              <li>
                                  <a href="#">Food</a>
                              </li>
                              <li>
                                  <a href="#">Lifestyle</a>
                              </li>
                              <li>
                                  <a href="#">Adventure</a>
                              </li>
                          </ul>
                      </aside>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->

  <!--================Instagram Area =================-->
  <section class="instagram_area">
    <div class="container box_1620">
      <div class="insta_btn">
        <a class="btn theme_btn" href="#">Follow us on instagram</a>
      </div>
      <div class="instagram_image row m0">
        <a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
      </div>
    </div>
  </section>
  <!--================End Instagram Area =================-->
  

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