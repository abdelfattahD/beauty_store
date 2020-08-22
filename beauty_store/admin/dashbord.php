<?php 
        
   
    
    $get_products = "SELECT * FROM products";
    $run_products = mysqli_query($db,$get_products);
    $count_products = mysqli_num_rows($run_products);
    
    $get_customers = "SELECT * FROM users";
    $run_customers = mysqli_query($db,$get_customers);
    $count_customers = mysqli_num_rows($run_customers);
    
    $get_p_categories = "SELECT * FROM categories";
    $run_p_categories = mysqli_query($db,$get_p_categories);
    $count_p_categories = mysqli_num_rows($run_p_categories);
    
    $get_pending_orders = "SELECT * FROM pending_orders";
    $run_pending_orders = mysqli_query($db,$get_pending_orders);
    $count_pending_orders = mysqli_num_rows($run_pending_orders);

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li>
        </ol>
        
    </div>
</div>

<div class="row">
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_products; ?> </div>
                           
                        <div> Products </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="view_products.php">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_customers; ?> </div>
                           
                        <div> Customers </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="users.php">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span> 
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>
                           
                        <div> Product Categories </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="view_p_cat.php">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                           
                        <div> Orders </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="view_orders.php">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    <i class="fa fa-money fa-fw"></i> New Orders
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                          
                            <tr>
                           
                                <th> Order no: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Product ID: </th>
                                <th> Product Qty: </th>
                                <th> Product Size: </th>
                                <th> Product color: </th>
                                <th> Status: </th>
                            
                            </tr>
                            
                        </thead>
                        
                        <tbody>
                          
                            <?php 
                          
                                $i=0;
          
                                $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,5";
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    $order_id = $row_order['order_id'];
                                    $c_id = $row_order['customer_id'];
                                    $invoice_no = $row_order['invoice_no'];
                                    $product_id = $row_order['product_id'];
                                    $qty = $row_order['qty'];
                                    $size = $row_order['size'];
                                    $color = $row_order['color'];
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                            
                            ?>
                           
                            <tr>
                               
                                <td> <?php echo $order_id; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        $get_customer = "SELECT * FROM users WHERE id='$c_id'";
                                        $run_customer = mysqli_query($db,$get_customer);
                                        $row_customer = mysqli_fetch_array($run_customer);
                                        $customer_email = $row_customer['Email'];
                                        echo $customer_email;
                                    
                                    ?>
                                    
                                </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $product_id; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $color; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='pending'){
                                            
                                            echo $order_status='pending';
                                            
                                        }else{
                                            
                                            echo $order_status='Complete';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
                
                <div class="text-right">
                    
                    <a href="index.php?view_orders">
                        
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                        
                    </a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
            <?php 
             $admin_session = $_SESSION['username'];
             $get_admin = "SELECT * FROM register_admin WHERE username='$admin_session'";
             $run_admin = mysqli_query($db,$get_admin);
             $row_admin = mysqli_fetch_array($run_admin);
             $admin_id = $row_admin['id'];
             $admin_name = $row_admin['username'];
             $admin_email = $row_admin['email'];
             $admin_image = $row_admin['admin_img'];
             $admin_job = $row_admin['admin_job'];
            
            ?>
                <div class="mb-md thumb-info">

                    <img src="../images/admin/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded rounded-circle img-sm border img-responsive" width='60%' height='60%'>
                    
                    <div class="thumb-info-title">
                       
                        <span class="thumb-info-inner"> <i class="fa fa-user"></i> <?php echo $admin_name; ?> </span>
                        <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>
                        
                    </div>

                </div>
                
                <div class="mb-md">
                    <div class="widget-content-expanded">
                    <i class="fa fa-envelope"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                    </div>
                    
                    
                    
                </div>
                
            </div>
        </div>
    </div>
    
</div>


