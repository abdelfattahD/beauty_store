        <center>
        <?php 
            $client_id = $_SESSION['id'];

         $get_user = "SELECT * FROM users WHERE id='$client_id'";
        $run_user = mysqli_query($connection,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_img = $row_user['user_img'];
        $user_name = $row_user['Fname'];
        $user_email = $row_user['Email'];
        if(!isset($_SESSION['fname'])){

        }else{
            echo"
            <figure class='icontext'>
                <div class='icon'>
                    <img class='rounded-circle img-sm border' src='img/users/$user_img' width='30%' height='30%'>
                </div>
                <div class='text'>
                    <strong> $user_name </strong> <br> 
                    <p class='mb-2'> $user_email   </p>
                </div>
            </figure>
            ";
        }
        ?>

            
        </center>
		
        