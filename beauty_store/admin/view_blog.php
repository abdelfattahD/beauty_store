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
                        <th>Date</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM blog  WHERE blog_archive = '0' " ;
                            $load_blogs_query = mysqli_query($db,$query);

                            if (!$load_blogs_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_blogs_query)) {
                                $id_blog = $row['id_blog'];

                                $title_blog = $row['title_blog'];
                              $parg_blog = $row['parg_blog']; 
                              $blog_img = $row['blog_img']; 
                              $blog_date = $row['blog_date'];

                                echo "<tr>";
                                echo "<td>$id_blog</td>";
                                echo "<td>$title_blog</td>";
                                echo "<td><img class= 'img-responsive' src='../img/blog/$blog_img' alt='' width='100' height='100'></td>";
                                echo "<td>$blog_date</td>";
                                echo "<td>$parg_blog</td>";
                               
                                
                                echo "<td> <a href='edit_blog.php?edit=$id_blog'>Edit</a></td>";
                                echo "<td><a href='view_blog.php?delete=$id_blog'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_blog_id = $_GET['delete'];

                                $query_UPDATE = "UPDATE blog SET blog_archive = '1' WHERE id_blog = $deleted_blog_id";
                                $edit_product_query = mysqli_query($db,$query_UPDATE);

                                header('Location: view_blog.php');
                            }


                           

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>