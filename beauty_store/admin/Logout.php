
<?php session_start() ?>

<?php 
    $_SESSION['id_admin'] = null;
    $_SESSION['Fname_admin'] = null;
    $_SESSION['lname_admin'] = null;
   


    header('Location: index.php');
?>