<?php

 

    //function to calculate the grandTotal
    function calculateGrandTotal()
    {
        $total=0;
		if(isset($_SESSION['cart']))
        {
           foreach($_SESSION['cart'] as $value)
			{
                $total+=$value['total'];
			}
		echo "Grand Total : ".$total;
		}
    }

    //function to display product dynamically
    function displayDynamic($data)
    {
        foreach($data as $in=>$val)
		{
		    echo '<div id="product-'.$val['id'].'" class="product">';
			echo $val['img'];
			echo '<h3 class="title"><a href="#">Product '.$val['id'].'</a></h3>';
			echo '<span>Price: $'.$val['Price'].'</span>';
			echo '<a class="add-to-cart" href="cart.php?id='.$val['id'].'">Add To Cart</a>';
			echo '</div>';
		}
    }

    //function to display the cart data
    function displayCart()
    {
        if(isset($_SESSION['cart']))
		{
            foreach($_SESSION['cart'] as $cartData)
            {
                echo '<tr>';
				echo '<td>'.$cartData['id'].'</td>';
				echo '<td>'.$cartData['img'].'</td>';
			    echo '<td>'.$cartData['price'].'</td>';
				echo '<td><form action="update.php" method="GET">
				<input type="number" id="hide" name="id" value="'.$cartData['id'].'">
				<input type="number" name="quantity" value="'.$cartData['quantity'].'"><input type="submit" value="Update"></form></td>';
				echo '<td>'.$cartData['total'].'</td>';
				echo '<td><a href="remove.php?id='.$cartData['id'].'">X</a></td>';
				echo '</tr>';
			}
		}
    }
?>