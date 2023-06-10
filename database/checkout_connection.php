<?php 
require('../database/database.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){   
  if(isset($_POST['placeorder'])){
    
    $userid = $_POST['userid'];
    $Customer_Name = $_POST['Customer_Name']; 
    $Customer_Address = $_POST['Customer_Address'];
    $Customer_Number = $_POST['Customer_Number'];
    $Customer_Email = $_POST['Customer_Email'];
    $payment_method = $_POST['payment_method'];

    $chosen_product_name = $_SESSION['chosen_product_name'];
    $choosenpicture = $_SESSION['choosenpicture']; 
    $sizeprice = $_SESSION['sizeprice']; 
    $chosenquantity = $_SESSION['chosenquantity']; 
    $totalpayable = $_SESSION['totalpayable'];
    $product_size = $_SESSION['product_size'];


    $placeorderquery = "INSERT INTO `order`(`order_product_profile`, `order_product_name`, `order_product_price`, `order_product_subtotal`,`order_size`, `order_product_quantity`,`order_customer_fullname`, `order_customer_address`, `order_customer_number`,`order_customer_email`, `order_payment_method`, `order_user_id`, `order_status`, `order_paid`) VALUES ('$choosenpicture','$chosen_product_name','$sizeprice','$totalpayable','$product_size','$chosenquantity','$Customer_Name','$Customer_Address','$Customer_Number','$Customer_Email','$payment_method','$userid','Pending','not paid')";
    $placeordersql = mysqli_query($connection,$placeorderquery);
    echo 1;
  }

}  