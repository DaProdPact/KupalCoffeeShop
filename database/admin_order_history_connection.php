<?php 
require('../database/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getorder'])){
    $order = array();
    $orderquery = "SELECT * FROM `order`"; 
    $ordersql = mysqli_query($connection,$orderquery);

    if(mysqli_num_rows($ordersql) > 0){
        while($row = mysqli_fetch_assoc($ordersql)){
            $order[] = $row;
        }
        echo json_encode($order);
    }
    else{
        echo 2;
    }
    }
}
