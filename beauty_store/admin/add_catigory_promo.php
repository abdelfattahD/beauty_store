
<?php
session_start();
 include "admin_header.php"
?>

<?php 

if (isset($_POST['add_Promo'])) {
    $coupon_price = $_POST['Promo_price'];
    $coupon_limit = $_POST['Promo_limit'];
    $Category_id = $_POST['Category_id'];
  

    $query = "UPDATE categories SET promo_categorie = '$coupon_price' ,promo_Dline ='$coupon_limit' WHERE Id = $Category_id ";
    $edit_product_query = mysqli_query($db,$query);
    header("location:Promo_categories.php");


    if (!$edit_product_query) {
        die("QUERY FAILED". mysqli_error($db));
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        add Promo categories
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_catigory_promo.php" method="post" >    
     
     
             <div class="form-group">
                        <label for="title"> Select categorie </label>
                        <select name="Category_id" class="form-control" required>
                        
                        <option selected disabled> Select categorie For Coupon </option>
                        <?php 
                        $get_pro = "SELECT * FROM categories";
                        $run_pro = mysqli_query($db, $get_pro);
                        while($row_pro = mysqli_fetch_array($run_pro)){
                            $Category_id = $row_pro['Id'];
                            $Category_title = $row_pro['Category_title'];
                            echo "<option value='$Category_id'> $Category_title </option> ";
                        }
                        
                        ?>
                        </select>
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
   
