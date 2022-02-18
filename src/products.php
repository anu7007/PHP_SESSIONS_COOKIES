<?php
	session_start();
	include_once ("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<style>
		<?php include('style.css')?>
		</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div id="main">
		<div id="products">
			<?php
				foreach ($products as $product)
				{
					$html = "<form action='cart.php' method='POST'>
								<div id=".$product["id"]." class='product'>
									<img src='images/".$product["image"]."'>
									<h3 class='title'>
										<a href='#'>
											Product - ".$product["id"]."
										</a>
									</h3>
									<span>
										Price: ".$product['price']."
									</span>
									<input type='submit' class='add-to-cart' name=".$product["id"]." value='Add To Cart'/>
								</div>
							</form>";
					echo $html;
				}
			?>
		</div>

		<div id="cart">
			<?php
				if (isset($_SESSION['cart']))
				{
					$html = "<h2>My Cart</h2>
							<table>
							<tr>
								<th>ID</th><th>Product</th><th>Quantity</th><th>Price</th><th>Delete</th>
							</tr>";
					echo ($html);

					//Variables to calculate Price
					$grandTotal = 0;
					$quant = 0;
					$itemPrice = 0;

					foreach ($_SESSION['cart'] as $key => $product)
					{
						$tmp = searchID($product['product'],$products);

						//Calculating Quantiy
						$quant += $_SESSION['cart'][$key]['Quantity'];
						
						//individual item price multiplied with quantity
						$itemPrice = $products[$tmp]['price'] * $_SESSION['cart'][$key]['Quantity'];

						//Grand total
						$grandTotal += $itemPrice;

						
						$html = "<form action='cart.php' method='POST'>
									<tr class='".$_SESSION['cart'][$key]['product']."'>
										<td>
											".$_SESSION['cart'][$key]['product']."
										</td>
										<td>
											<img src='images/".$products[$tmp]['image']."' width='50px' height='50px'>
										</td>
										<td>
											<input type='text' value='editCart' name=".$products[$tmp]['id']." style='display: none;'/>
											<input type = 'number' id=".$products[$tmp]['id']." onchange='form.submit()' class='inp' value=".$_SESSION['cart'][$key]['Quantity']." name='val'>
										</td>
										<td>
											".$products[$tmp]['price']."
										</td>
										<td id='rmv'>
											<a href='del.php?id=".$products[$tmp]['id']."&action=del' value='deleteProduct' name=".$products[$tmp]['id']." onchange='form.submit()' <i class='fa fa-trash'></i></a>
										</td>
									</tr>
								</form>";
						echo $html;
					}
				//Grand total, No of items, Empty cart added at the bottom of the table
				$html = "
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
								Total Items: ".$quant."
							</td>
							<td>
								Grand Total<br>$".$grandTotal."
							</td>
							<td>
								<h3><a class='emptyCart' href='clear.php'>Empty Cart</a></h3>
							</td>
						</tr>
					</table>";
				echo $html;
				}				
			?>
		</div>
	</div>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Disclaimers</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>