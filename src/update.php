<?php
  
    session_start();

    function randomInputUpdate()
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['id']== $_GET['id'])
            {
                $_SESSION['cart'][$key]['quantity']=$_GET['quantity'];
                $_SESSION['cart'][$key]['total']=$_SESSION['cart'][$key]['quantity']*$_SESSION['cart'][$key]['price'];
            }
        }
        header("Location:products.php");
    }
    randomInputUpdate();
?>