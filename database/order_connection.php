<?php 
require('../database/database.php');
session_start();
$session_id = $_SESSION['id'];
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getorder'])){
    $order = array();
    $orderquery = "SELECT * FROM `order` WHERE order_user_id = '$session_id' && order_status != 'Cancel' "; 
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
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['order_detail'])){
    $order_id = $_POST['order_id'];
    $order_detail = array();
    $order_detailquery = "SELECT * FROM `order` WHERE order_id = '$order_id' "; 
    $order_detailsql = mysqli_query($connection,$order_detailquery);

    if(mysqli_num_rows($order_detailsql) > 0){
        while($row = mysqli_fetch_assoc($order_detailsql)){
            $order_detail[] = $row;
        }
        echo json_encode($order_detail);
    }
    else{
        echo 2;
    }
  }
  else if(isset($_POST['cancel'])){
    $cancel_orderid = $_POST['cancel_orderid'];
    $ordercanelquery = "UPDATE `order` SET order_status = 'Cancel' WHERE order_id = '$cancel_orderid' "; 
    $ordercanelsql = mysqli_query($connection,$ordercanelquery);
    echo 1;

  }
}