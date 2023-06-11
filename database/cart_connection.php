<?php 
require('../database/database.php');
session_start();
$session_id = $_SESSION['id'];

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getcart'])){
    $cart = array();
    $cartquery = "SELECT * FROM `cart` WHERE cart_user_id = '$session_id' "; 
    $cartsql = mysqli_query($connection,$cartquery);

    if(mysqli_num_rows($cartsql) > 0){
        while($row = mysqli_fetch_assoc($cartsql)){
            $cart[] = $row;
        }
        echo json_encode($cart);
    }
    else{
        echo 2;
    }
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['paycart'])){
        $_SESSION['checkout'] = 'cart';
        $_SESSION['columnclass'] = 'col-4';

        echo 1;
    }
    else if(isset($_POST['remove'])){
       $removeid = $_POST['removeid'];
       $removequery = "DELETE FROM `cart` WHERE cart_id = '$removeid'";
       $removesql = mysqli_query($connection,$removequery); 
       echo 1;
    }

}
?>