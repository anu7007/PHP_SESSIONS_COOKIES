<?php
    session_start();

    //function to remove the item from the cart
    function removeItem()
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['id'] == $_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
            }
        }
        header("Location:products.php");
    }
    //
    removeItem();

?>