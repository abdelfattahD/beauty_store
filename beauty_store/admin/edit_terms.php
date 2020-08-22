<?php 
session_start();
include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $term_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM terms WHERE term_id = $term_id ";
$load_term_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_term_query)){
$tm_id = $row['term_id'];
$tm_title = $row['term_title'];
$tm_link = $row['term_link'];
$tm_desc = $row['term_desc'];

}

if (isset($_POST['edit_blog'])) {
    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];

    $term_title = mysqli_real_escape_string($db,$term_title);
    $term_link = mysqli_real_escape_string($db,$term_link);
    $term_desc = mysqli_real_escape_string($db,$term_desc);

    $query = "UPDATE terms SET term_title = '$term_title' ,term_link ='$term_link', term_desc = '$term_desc' WHERE term_id = '$term_id' ";
    $edit_term_query = mysqli_query($db,$query);

    if (!$edit_term_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_term_query){
        echo " <script>alert('blog has been edit successfully')</script>";
        echo " <script>window.open('view_terms.php','_self')</script>";
    }
    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Terms
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_terms.php?edit=<?php echo $term_id; ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Term Title</label>
                        <input type="text" value = "<?php echo $tm_title; ?>" class="form-control" name="term_title">
                    </div>

                    <div class="form-group">
                        <label for="title">Term Link</label>
                        <input type="text" value = "<?php echo $tm_link; ?>" class="form-control" name="term_link">
                    </div>

                    
                    <div class="form-group">
                        <label for="blog_desc">Term Description</label>
                        <textarea class="form-control" name="term_desc" id="" cols="30" rows="5"><?php echo $tm_desc; ?></textarea>
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_term" value="Edit term">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>