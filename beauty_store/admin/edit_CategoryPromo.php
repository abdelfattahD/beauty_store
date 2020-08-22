<?php
session_start();
 include "admin_header.php"
?>

<?php 
if (isset($_GET['edit'])) {
                                $edit_product_id = $_GET['edit'];

                                $query_UPDATE = "SELECT * FROM categories  WHERE Id = $edit_product_id";
                                $edit_Category_query = mysqli_query($db,$query_UPDATE);
                                $row = mysqli_fetch_array($edit_Category_query);

                                $Category_title = $row['Category_title'];
                                $promo_categorie = $row['promo_categorie'];
                                $promo_limit = $row['promo_Dline'];
                           

if (isset($_POST['add_Promo'])) {
    $coupon_price = $_POST['Promo_price'];
    $coupon_limit = $_POST['Promo_limit'];
   
  

    $query = "UPDATE categories SET promo_categorie = '$coupon_price' , promo_Dline ='$coupon_limit' WHERE Id =  $edit_product_id  ";
    $edit_product_query = mysqli_query($db,$query);
    header("location:Promo_categories.php");


    if (!$edit_product_query) {
        die("QUERY FAILED". mysqli_error($db));
    }

} }
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Edit Promo categories
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_CategoryPromo.php?edit=<?php echo $edit_product_id ?>" method="post" >    
     
     
             <div class="form-group">
             <h3 class="page-header">
                        categories : <?php echo $Category_title ?> 
                            
                           
                        </h3>
                        
                    </div>

                    <div class="form-group">
                        <label for="coupons_price">Promo pourcentage réduction %</label>
                        <input type="number" min="0" max="100" class="form-control" name="Promo_price">
                    </div>

                    <div class="form-group">
                        <label for="Promo_price">date Promo Limit</label>
                        <input type="date" class="form-control" name="Promo_limit" value="1">
                    </div>

                    

                   

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_Promo" value="Add Promo">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

