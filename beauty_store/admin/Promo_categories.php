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
                       
                        <th>promo categorie</th>
                        <th>promo  Limit</th>

                        
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM categories  WHERE  promo_categorie > 0" ;
                            $load_products_query = mysqli_query($db,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $Category_id = $row['Id'];
                                $Category_title = $row['Category_title'];
                                $Category_image = $row['Category_image'];
                                $promo_categorie = $row['promo_categorie'];
                                $promo_limit = $row['promo_Dline'];

                             



                                echo "<tr>";
                                echo "<td>$Category_id</td>";
                                echo "<td>$Category_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/categories/$Category_image' alt='' width='100' height='100'></td>";
                             
                                echo "<td>$promo_categorie</td>";
                                echo "<td>$promo_limit</td>";

                               

                             
                                echo "<td> <a href='edit_CategoryPromo.php?edit=$Category_id'>Edit</a></td>";
                                echo "<td><a href='Promo_categories.php?delete=$Category_id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_product_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE categories SET promo_categorie = '0'  WHERE Id = $deleted_product_id";
                                $edit_product_query = mysqli_query($db,$query_UPDATE);

                                header('Location: Promo_categories.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>