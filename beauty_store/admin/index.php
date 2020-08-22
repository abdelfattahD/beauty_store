<?php include "db.php"; ?>


<?php

session_start();
if (isset($_SESSION['id_admin'])) {
    $fname = $_SESSION['Fname_admin'];
    $lname = $_SESSION['lname_admin'];

    $full_name = $fname . " " . $lname;
?>


<?php include "admin_header.php" ?>



              <!-- /.container-fluid -->
              <?php include "dashbord.php" ?>

        

    <?php include "admin_footer.php" ?>
    <?php

}
else {
    header("location:admin.php");
    

}

?>