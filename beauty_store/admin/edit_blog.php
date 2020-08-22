<?php 
session_start();
include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM blog WHERE id_blog = $pro_id ";
$load_blog_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_blog_query)){
$b_id = $row['id_blog'];
$b_title = $row['title_blog'];
$b_date = $row['blog_date'];
$b_desc = $row['parg_blog'];

}

if (isset($_POST['edit_blog'])) {
    $blog_title = $_POST['blog_title'];
    $blog_img = $_FILES['blog_img']['name'];
    $temp_name = $_FILES['blog_img']['tmp_name'];
    $blog_date = $_POST['blog_date'];
    $blog_desc = $_POST['blog_desc'];
    
    move_uploaded_file($temp_name, "../images/blog/$blog_img");

    $blog_title = mysqli_real_escape_string($db,$blog_title);
    $blog_img = mysqli_real_escape_string($db,$blog_img);
    $blog_desc = mysqli_real_escape_string($db,$blog_desc);

    $query = "UPDATE blog SET title_blog = '$blog_title' ,blog_img ='$blog_img',blog_date ='$blog_date', parg_blog = '$blog_desc' WHERE id_blog = $b_id ";
    $edit_blog_query = mysqli_query($db,$query);

    if (!$edit_blog_query) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_blog_query){
        echo " <script>alert('blog has been edit successfully')</script>";
        echo " <script>window.open('view_blog.php','_self')</script>";
    }
    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit blog
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_blog.php?edit=<?php echo $b_id; ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" value = "<?php echo $b_title; ?>" class="form-control" name="blog_title">
                    </div>
      
                    <div class="form-group">
                        <label for="blog_image">Blog Image 1</label>
                        <input type="file" value = "<?php echo $b_image; ?>"  name="blog_img" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Blog Date</label>
                        <input type="date" value = "<?php echo $b_date; ?>" class="form-control" name="blog_date">
                    </div>

                    
                    <div class="form-group">
                        <label for="blog_desc">Blog Description</label>
                        <textarea class="form-control" name="blog_desc" id="" cols="30" rows="5"><?php echo $b_desc; ?></textarea>
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_blog" value="Edit blog">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->


            <script src="js/tinymce/tinymce.min.js" ></script>
            <script>tinymce.init({selector: 'textarea'});</script> 
        

    <?php include "admin_footer.php" ?>