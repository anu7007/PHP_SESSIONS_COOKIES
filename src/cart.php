<?php
    session_start();
    include_once ("config.php");
    header("location: products.php");
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    //Getting Product
    foreach ($_POST as $k => $p)
    {
        break;
    }

    switch ($p)
    {            
        case "Add To Cart":
            addToCart();
            break;
        
        case "editCart":
            edit();
            break;
    }

    function addToCart()
    {
        global $k, $p;
        if ( (isset($_SESSION['cart'])) && $p=='Add To Cart') 
        {
            $ifExists=0;
            foreach($_SESSION['cart'] as $key => $product)
            {
                if ($product['product'] == $k)
                {
                    $ifExists = 1;
                    $_SESSION['cart'][$key]['Quantity'] += 1;
                    break;
                }
            }
            if ($ifExists == 0)
            {
                $_SESSION['cart'][] = array("product" => $k, "Quantity" => 1);
            }
        }
        else
        {
            $_SESSION['cart'][] = array("product" => $k, "Quantity" => 1);
        }

        valueCheck();
    }

    function edit()
    {
        $cnt=0;
        foreach ($_POST as $k => $p)
        {
            if ($cnt==0)
                $id=$k;
            if ($cnt == 1)
                break;
            $cnt++;
        }

      
        foreach($_SESSION['cart'] as $key => $product)
        {
            if ($product['product'] == $id)
            {
                $_SESSION['cart'][$key]['Quantity'] = $p;
            }
        }

        valueCheck();
    }

    function valueCheck()
    { 
       foreach ($_POST as $k => $p)
        {
            break;
        }
        foreach($_SESSION['cart'] as $key => $product)
        {
            if ($_SESSION['cart'][$key]['Quantity'] == 0)
            {
                //Deleting the Product from the Cart Array
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>