<?php
session_start();
include_once('header.php');
// include('cart.php');
// include('images/');
$products = array(
	array("id"=>101,"name"=>"Basket Ball","image"=>"images/basketball.png","price"=>150),
	array("id"=>102,"name"=>"Football","image"=>"images/football.png","price"=>120),
	array("id"=>103,"name"=>"Soccer","image"=>"images/soccer.png","price"=>110),
	array("id"=>104,"name"=>"Table Tennis","image"=>"images/table-tennis.png","price"=>130),
	array("id"=>105,"name"=>"Tennis","image"=>"images/tennis.png","price"=>100)
);
?>
<style>
<?php include('style.css');?>
</style>

<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<?php
function displayProducts($products){?>
          <form action="cart.php" method="POST">
		    <div id="main">
			 
			 <div id="products">
				<?php 
				
				foreach($products as $product){
					echo '<div id="product" -'.$product['id'].'" class="product">';
					echo "<img src=".$product['image'].">";
					echo '<h3 class="title"><a href="#">Product '.$product['id'].'</a></h3>';
					echo '<span>Price: $'. $product['price'].'</span>';
					echo '<a class="add-to-cart" name="addtocart">Add To Cart</a>';
				}
				?>
		 </div>
		</div>
		<div>
		<?php		
}
// header('location:products.php');
	   displayProducts($products);
				
	//    function addToCart(){
	// 	echo "add to cart";
	
	
	// }

	 
include('footer.php');
?>
</body>
</html>