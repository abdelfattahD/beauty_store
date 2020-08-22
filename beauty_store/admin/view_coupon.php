<?php 
session_start();
include "admin_header.php"
 ?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Coupon List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Coupon Title</th>
                        <th>Product Title</th>
                        <th>pourcentage réduction</th>
                        <th>Code</th>
                        <th>Limit</th>
                        <th>Used</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM coupons  WHERE coupon_type = '0'" ;
                            $load_coupon_query = mysqli_query($db,$query);

                            if (!$load_coupon_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_coupon_query)) {
                                $coupon_id = $row['coupon_id'];
                                $coupon_pro_id = $row['product_id'];
                                $coupon_title = $row['coupon_title'];
                                $coupon_price = $row['coupon_price'];
                                $coupon_code = $row['coupon_code'];
                                $coupon_limit = $row['coupon_limit'];
                                $coupon_used = $row['coupon_used'];

                                $get_product = "SELECT * FROM products  WHERE product_id = '$coupon_pro_id'" ;
                                $run_product = mysqli_query($db,$get_product);
                                $row_product = mysqli_fetch_array($run_product);

                                $product_title = $row_product['product_title'];

                                echo "<tr>";
                                echo "<td>$coupon_id</td>";
                                echo "<td>$coupon_title</td>";
                                echo "<td>$product_title</td>";
                                echo "<td>$coupon_price</td>";
                                echo "<td>$coupon_code</td>";
                                echo "<td>$coupon_limit</td>";
                                echo "<td>$coupon_used</td>";
                                echo "<td> <a href='edit_coupon.php?edit=$coupon_id '><i class='fa fa-pencil'>Edit</i></a></td>";
                                echo "<td><a href='view_coupon.php?delete=$coupon_id '><i class='fa fa-trash'>Delete</i></a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_coupon_id = $_GET['delete'];

                                $delete_query = "DELETE FROM coupons WHERE coupon_id = '$deleted_coupon_id'";
                                $deleted_coupon_query = mysqli_query($db,$delete_query);

                                header('Location: view_coupon.php');
                            }  

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>