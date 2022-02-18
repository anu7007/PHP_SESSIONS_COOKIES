<?php
	session_start();
	include_once ("config.php");
    header("location: products.php");

    //Getting Product
    $cnt=0;
    foreach ($_GET as $k => $p)
    {
        if ($cnt == 0)
            $id = $p;
        if ($cnt == 1)
            break;
        $cnt +=1;
    }

    switch ($p)
    {            
        case "del":
            deleteProduct();
            break;
    }
    
    //Delete Product from Cart
    function deleteProduct()
    {
        global $id, $p, $k;
        echo $id." ".$p." ".$k;
        //Traversing each Object in the Session array to match the Product ID
        foreach($_SESSION['cart'] as $key => $product)
        {
            print_r ($_SESSION['cart'][$key]);
            echo $key;
            if ($product['product'] == $id)
            {
                echo "36";
                //Deleting the Product from the Cart Array
                 unset($_SESSION['cart'][$key]);
            }
        }
    }
?>