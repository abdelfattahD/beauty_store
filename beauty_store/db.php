<?php 

    $connection = mysqli_connect('Localhost','root','','beauty_store');

    if($connection->connect_error){
		die("Connection failed: ".$connection->connect_error);
	}


	$query = "UPDATE categories SET promo_categorie = '0' WHERE promo_Dline < DATE_ADD(NOW(),INTERVAL -2 HOUR)";
$poromo_update = mysqli_query($connection,$query);

    if (!$poromo_update) {
        die("QUERY FAILED". mysqli_error($connection));
    }

	
	return $connection;

	
	


?>


