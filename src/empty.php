<?php
    session_start();

    //function to empty the cart
    function emptyCart()
    {
        if(isset($_SESSION['cart']))
        { 
            unset($_SESSION['cart']);
        }
        header('Location:products.php');
    }

    emptyCart();
?>