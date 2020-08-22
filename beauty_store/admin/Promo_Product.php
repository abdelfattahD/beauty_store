<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Product List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Description</th>
                        <th>Info</th>
                        <th>Price</th>
                        <th>promo product</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM products  WHERE product_archif = '0' AND promo_product > 0" ;
                            $load_products_query = mysqli_query($db,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_image'];
                                $product_desc = $row['product_desc'];
                                $product_info = $row['product_info'];
                                $product_price = $row['product_price'];
                               $product_date = $row['product_date'];
                               $promo_product = $row['promo_product'];



                                echo "<tr>";
                                echo "<td>$product_id</td>";
                                echo "<td>$product_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/$product_image' alt='' width='100' height='100'></td>";
                                echo "<td>$product_desc</td>";
                                echo "<td>$product_info</td>";
                                echo "<td>$product_price</td>";
                                echo "<td>$promo_product %</td>";

                                echo "<td>$product_date</td>";
                                echo "<td> <a href='edit_product.php?edit=$product_id'>Edit</a></td>";
                                echo "<td><a href='view_products.php?delete=$product_id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_product_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE products SET product_archif = '1' WHERE product_id = $deleted_product_id";
                                $edit_product_query = mysqli_query($db,$query_UPDATE);

                                header('Location: view_products.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>