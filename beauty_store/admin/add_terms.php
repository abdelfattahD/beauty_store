
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_term'])) {
    $term_title = $_POST['term_titl'];
    $term_link = $_POST['term_lin'];
    $term_desc = $_POST['term_descr'];

    $add_term = "INSERT INTO terms (term_title,term_link,term_desc) VALUES ('$term_title','$term_link','$term_desc')";
    $add_term_query = mysqli_query($db,$add_term);

    if($add_term_query){
        echo " <script>alert('term has been added successfully')</script>";
        echo " <script>window.open('add_terms.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Terms
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_terms.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="term_title">Terms Title</label>
                        <input type="text" class="form-control" name="term_titl">
                    </div>

                    <div class="form-group">
                        <label for="term_link">Terms Link </label>
                        <input type="text"  name="term_lin" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="term_desc">terms Description</label>
                        <textarea class="form-control "name="term_descr" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_term" value="Add term">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
