<?php 
session_start();
include "admin_header.php"
 ?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Terms & Conditions
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th> 
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM terms" ;
                            $load_term_query = mysqli_query($db,$query);

                            if (!$load_term_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_term_query)) {
                                $term_id = $row['term_id'];
                                $term_title = $row['term_title'];
                                $term_desc = $row['term_desc'];

                                echo "<tr>";
                                echo "<td>$term_id</td>";
                                echo "<td>$term_title</td>";
                                echo "<td>$term_desc</td>";
                                echo "<td> <a href='edit_terms.php?edit=$term_id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_terms.php?delete=$term_id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_term_id = $_GET['delete'];

                                $delete_query = "DELETE FROM terms WHERE term_id = '$deleted_term_id'";
                                $deleted_term_query = mysqli_query($db,$delete_query);

                                header('Location: view_terms.php');
                            } 

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>