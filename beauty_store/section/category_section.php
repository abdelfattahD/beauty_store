
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
				
			'Category_title' => $row['Category_title'],
      'Id' => sub_categories($row['Id']),
      
      'Id_categories' => $row['Id'],
		);
	}
	
	return $categories;
}


function sub_categories($id)
{	
	include "db.php";

	
	$sql = "SELECT * FROM sou_category  WHERE Id = $id ";
	$result = $connection->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc())
	{
		$categories[] = array(

      'Id' => ($row['Id']),
			
      'Sou_Category_title' => ($row['Sou_Category_title']),
      'Id_Sou_categories' => $row['Sou_Category_id'],
		);
	}
	return $categories;
}
?>


<?php
function viewsubcat($categories)
{
	$html = '<ul class="subc_list"> ';


	if (is_array($categories) || is_object($categories))
{
  // If yes, then foreach() will iterate over it.
  foreach($categories as $category){

    $Sou_categoryId=$category['Id_Sou_categories'];
    $categoryId=$category['Id'];


	$html .= '<li  id="list-home" role="tabpanel" aria-labelledby="'.$categoryId.'">&nbsp &nbsp &nbsp &nbsp<a href="category.php?sub_ctgry='. $Sou_categoryId.'">'.$category['Sou_Category_title'].'</a></li>';
	
	
}

	
	}
	$html .= '</ul>';
	
	return $html;
}
?>
<?php
if (isset($_POST['submit'])) {


}?>

<section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head" >Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="category_section.php"  method="post"  >

                <?php $categories = categories(); ?>

<?php

foreach($categories as $category){


$categoryId=$category['Id_categories'];
  
	?>

<ul class="catg_list"><a   href="category.php?item_ctgry=<?php echo $categoryId ?>" class=" list-group-item-action active" id="<?php echo $categoryId ?>-list" ><?php echo $category['Category_title'] ?></a> 
                           
                                 <?php 
                                 $item_ctgry_stok;

if (isset($_GET['item_ctgry'])) {
 $item_ctgry = $_GET['item_ctgry'];  
                          


			if(( ! empty($category['Id'])) && ($item_ctgry == $categoryId  ) ){
				echo viewsubcat($category['Id']);
      } 
      echo" <ul>	";
		?>
<?php } 

}?>


                </form>
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">Product Filters</div>
            <div class="common-filter">
              <div class="head">Brands</div>
              <form action="#">
                <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Color</div>
              <form action="#">
                <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                      Leather<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                      with red<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Price</div>
              <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                  <div class="price">Price:</div>
                  <span>$</span>
                  <div id="lower-value"></div>
                  <div class="to">to</div>
                  <span>$</span>
                  <div id="upper-value"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <?php include 'Filter_Bar.php' ?>


          <!-- End Filter Bar -->
          <!-- Start all product Seller -->
          <?php include 'all_product.php' ?>

          <!-- End all product Seller -->
        </div>
      </div>
    </div>
  </section>