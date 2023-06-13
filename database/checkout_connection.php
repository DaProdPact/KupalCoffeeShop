<?php 
require('../database/database.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){   
  if(isset($_POST['placeorder'])){
    $session_checkout = $_POST['session_checkout'];

    if($session_checkout == 'buynow'){
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

    $audit_trailquery = "INSERT INTO `audit_trail`( `audit_description`, `audit_pname`, `audit_ppicture`, `audit_customer`, `audit_customer_id`, `audit_seen`,`audit_access`) VALUES ('ordered the ','$chosen_product_name','$choosenpicture','$Customer_Name','$userid','unseen','admin')";
    $audit_trailsql = mysqli_query($connection,$audit_trailquery);


    echo 1;

    }
    else {
      $userid = $_POST['userid'];
      $Customer_Name = $_POST['Customer_Name']; 
      $Customer_Address = $_POST['Customer_Address'];
      $Customer_Number = $_POST['Customer_Number'];
      $Customer_Email = $_POST['Customer_Email'];
      $payment_method = $_POST['payment_method'];

      $cartquery = "SELECT * FROM `cart` WHERE cart_user_id = '$userid'";
      $cartsql = mysqli_query($connection,$cartquery);
      while($row = mysqli_fetch_assoc($cartsql)){

        $productname = $row['cart_product_name'];
        $product_profile = $row['cart_product_profile'];
        $product_price = $row['cart_product_price'];
        $product_subtotal= $row['cart_product_subtotal'];
        $cart_size= $row['cart_size'];
        $product_quantity= $row['cart_product_quantity'];

        $placeorderquery = "INSERT INTO `order`(`order_product_profile`, `order_product_name`, `order_product_price`, `order_product_subtotal`,`order_size`, `order_product_quantity`,`order_customer_fullname`, `order_customer_address`, `order_customer_number`,`order_customer_email`, `order_payment_method`, `order_user_id`, `order_status`, `order_paid`) VALUES ('$product_profile','$productname','$product_price','$product_subtotal','$cart_size','$product_quantity','$Customer_Name','$Customer_Address','$Customer_Number','$Customer_Email','$payment_method','$userid','Pending','not paid')";
        $placeordersql = mysqli_query($connection,$placeorderquery);


        $audit_trailquery = "INSERT INTO `audit_trail`( `audit_description`, `audit_pname`, `audit_ppicture`, `audit_customer`, `audit_customer_id`, `audit_seen`,`audit_access`) VALUES ('ordered the ','$productname','$product_profile','$Customer_Name','$userid','unseen','admin')";
        $audit_trailsql = mysqli_query($connection,$audit_trailquery);


      }
      $deletecartquery = "DELETE FROM `cart` WHERE cart_user_id = '$userid'";
      $deletecartsql = mysqli_query($connection,$deletecartquery);
      echo 1;
  


    }
  }

}  