<?php 
require('../database/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getproduct'])){
    $product = array();
    $productquery = "SELECT * FROM `product`"; 
    $productsql = mysqli_query($connection,$productquery);

    if(mysqli_num_rows($productsql) > 0){
        while($row = mysqli_fetch_assoc($productsql)){
            $product[] = $row;
        }
        echo json_encode($product);
    }
    else{
        echo 2;
    }
    }
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['buynowcheckout'])){
        session_start();
        $_SESSION['chosen_product_name'] = $_POST['chosen_product_name'];
        $_SESSION['choosenpicture'] = $_POST['choosenpicture'];
        $_SESSION['sizeprice'] = $_POST['sizeprice'];
        $_SESSION['chosenquantity'] = $_POST['chosenquantity'];
        $_SESSION['totalpayable'] = $_POST['totalpayable'];
        $_SESSION['product_size'] = $_POST['product_size'];
        $_SESSION['columnclass'] = 'offset-4 col-4';
        echo 1;
    }
}


?>