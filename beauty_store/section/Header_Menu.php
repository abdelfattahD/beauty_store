

<?php
$query = "SELECT COUNT(*) as total FROM `cart` ";
$shop_query = mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($shop_query);

$contor = $data['total'];



?>




<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""   width='100' height='60' ></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item active"><a class="nav-link" href="category.php">Shop</a></li>
              <li class="nav-item active"><a class="nav-link" href="promo.php">Promotion</a></li>
              <li class="nav-item active"><a class="nav-link" href="blog.php">blog</a></li>


             
              
							
              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>

            <ul class="nav-shop">
            
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><button></button></li>
              
              <?php 

                        if (isset($_SESSION['id'])) {
                          $welcome = $_SESSION['welcome']; 

                          echo " <li class='nav-item'><button><a  href='cart.php'><i class='ti-shopping-cart'></i><span class='nav-shop__circle'> $contor </span></a></button> </li>";
                          echo"<li class='nav-item'><a  href='account_user.php'> $welcome </a></li>";
                            
                            echo "<li class='nav-item'><a class='button button-header' href='Logout.php'>Log Out</a></li>";
                         

                           

                        }else{ 
                          echo "  <li class='nav-item'><button><a  href='cart.php'><i class='ti-shopping-cart'></i><span class='nav-shop__circle'>0</span></a></button> </li>";

                          
                          echo "<li class='nav-item'><a class='button button-header' href='login.php'>Login</a></li>"; }?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>