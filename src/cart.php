<?php
session_start();
include_once('header.php');
include_once('config.php');
?>
<style>
<?php include('style.css');?>
</style>
<?php
$myData=$data;
function addCart($data){
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart']=array();
    }
    foreach($data as $value)
    {
        if($value['id'] == $_GET['id'])
        {
            $exist=checkExistence($value['id']);
            if($exist!=true)
            {
                $cartdata=array(
                'id'=>$value['id'],
                'img'=>$value['img'],
                'price'=>$value['Price'],
                'quantity'=>1,
                'total'=>0
                );
            }
            $cartdata['total'] = $cartdata['quantity'] * $cartdata['Price'] ;
            array_push($_SESSION['cart'], $cartdata);
        }
    }
}
// header('Location:products.php');
function checkExistence($id){
    foreach($_SESSION['cart'] as $key=>$cData)
    {
        if($cData['id']==$id)
        {
            $_SESSION['cart'][$key]['quantity']++;
            $_SESSION['cart'][$key]['total']=$_SESSION['cart'][$key]['quantity'] * $_SESSION['cart'][$key]['price'];
        }
    }
}
addCart($myData);































// if(isset($_POST['addtocart']))
//     $_SESSION['cart'] = array();
//     $_SESSION['count']=count($_SESSION['cart']);
//     if($SESSION['count']==0){
//         echo $SESSION['count'];
//         $errormsg="<h3>Uhhooo!!! Your Cart is Empty</h3>";
//         echo $errormsg;
//     }
//     else{

//         echo $SESSION['cart'];
// }




















































?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
   
</body>
</html>