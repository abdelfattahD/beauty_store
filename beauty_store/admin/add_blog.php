<?php include "admin_header.php"?>
<?php include "db.php" ?>

<?php 

if (isset($_POST['add_blog'])) {
    $blog_title = $_POST['title_blog'];
    
    
    $parg_blog = $_POST['parg_blog'];
   
   
    
   
    $blog_img1 = $_FILES['blog_img1']['name'];
   
    $temp_name1 = $_FILES['blog_img1']['tmp_name'];


    move_uploaded_file($temp_name1, "../img/blog/$blog_img1");


    $add_blog = "INSERT INTO blog (title_blog,parg_blog,blog_img,blog_date) VALUES ('$blog_title','$parg_blog','$blog_img1',NOW())";
    $add_blog_query = mysqli_query($db,$add_blog);


    if($add_blog_query){
        
       
            echo " <script>alert('blog has been added successfully')</script>";
            echo " <script>window.open('add_blog.php','_self')</script>";
    }
    else{
        echo " <script>alert('blog erreur')</script>";
        echo " <script>window.open('add_blog.php','_self')</script>";
    }

}
?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a Blog  
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_blog.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" class="form-control" name="title_blog">
                    </div>
                   


                   
               <div class="form-group">     
                      
      
                    <div class="form-group">
                        <label for="blog_image">Blog Image </label>
                        <input type="file"  name="blog_img1" class="form-control">
                    </div>

                </div>

            

                    <div class="form-group">
                        <label for="parg_blog">Blog Paragraph</label>
                        <textarea class="form-control "name="parg_blog" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                   
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_blog" value="Add blog">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   
