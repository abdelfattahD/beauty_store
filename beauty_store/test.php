
<?php include "db.php" ?>




<?php 
function categories()
{
	
	include "db.php";
	$sql = "SELECT * FROM categories ";
	$result = $connection->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc())
	{
		$categories[] = array(

			'Id' => $row['Id'],
			'Category_image' => $row['Category_image'],


			
			'Category_title' => $row['Category_title'],
			'Id' => sub_categories($row['Id']),
		);
	}
	
	return $categories;
}


function sub_categories($id)
{	
	include "db.php";

	
	$sql = "SELECT Sou_Category_title FROM sou_category  WHERE Id = $id ";
	$result = $connection->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc())
	{
		$categories[] = array(
			
			'Sou_Category_title' => ($row['Sou_Category_title']),
		);
	}
	return $categories;
}
?>


<?php
function viewsubcat($categories)
{
	$html = '<td class="sub-category"><ul> ';


	if (is_array($categories) || is_object($categories))
{
  // If yes, then foreach() will iterate over it.
  foreach($categories as $category){

	$html .= '<li>'.$category['Sou_Category_title'].'</li>';
	
	
}

	
	}
	$html .= '</ul></td>';
	
	return $html;
}
?>
 <table class="table table-bordered table-hover">
 <thead>
                    <tr>
                
                        
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>souCatigores</th>
                        
                        <th>Edit</th>
                        <th>archive</th>
                    </tr>
                </thead>

<?php $categories = categories(); ?>

<?php foreach($categories as $category){
	?>


		


		
	<tr>
                               <td><?php echo $category['Category_title'] ?></td>
                               <td><img class= 'img-responsive' src='img/<?php echo $category['Category_image'] ?>' alt='' width='100' height='100'></td>
		<?php 
			if( ! empty($category['Id'])){
				echo viewsubcat($category['Id']);
			} 
		?>

<td><a href='edit_product.php?edit='>Edit</a></td>
<td><a href='edit_product.php?edit='>Edit</a></td>


	</tr>
<?php } ?>

