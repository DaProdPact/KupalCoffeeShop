<?php 
require('../database/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getorder'])){
    $order = array();
    $orderquery = "SELECT * FROM `order` WHERE order_status = 'Pending'"; 
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
    if(isset($_POST['approve'])){
    $approve_id = $_POST['approve_id'];
    $approve_product = array();
    $approve_productquery = "SELECT * FROM `order` WHERE order_id = '$approve_id' "; 
    $approve_productsql = mysqli_query($connection,$approve_productquery);

    if(mysqli_num_rows($approve_productsql) > 0){
        while($row = mysqli_fetch_assoc($approve_productsql)){
            $approve_product[] = $row;
        }
        echo json_encode($approve_product);
    }
    else{
        echo 2;
    }
   }

   else if(isset($_POST['approve_id'])){
    $approve_id = $_POST['approve_id'];
    $user = $_POST['user'];
    $ocname = $_POST['ocname'];
    $opname = $_POST['opname'];
    $product_img = $_POST['product_img'];

    $approve_productquery = " UPDATE `order` SET `order_status`='In Progress' WHERE order_id = '$approve_id'"; 
    $approve_productsql = mysqli_query($connection,$approve_productquery);

    $audit_trailquery = "INSERT INTO `audit_trail`( `audit_description`, `audit_pname`, `audit_ppicture`, `audit_customer`, `audit_customer_id`, `audit_seen`,`audit_access`) VALUES ('in Progress','$opname','$product_img','$ocname','$user','unseen','customer')";
    $audit_trailsql = mysqli_query($connection,$audit_trailquery);  


    echo 1;

   }
   else if(isset($_POST['uploadfilesub'])){
    $product_name = $_POST['product_name'];
    $product_sprice = $_POST['product_sprice'];
    $product_mprice = $_POST['product_mprice'];
    $product_lprice = $_POST['product_lprice'];
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = '../product_image/';
    move_uploaded_file($filetmpname,$folder.$filename);
    
    $query = "INSERT INTO `product`(`product_name`, `product_picture`, `small_price`, `medium_price`, `large_price`) VALUES ('$product_name','$filename','$product_sprice','$product_mprice','$product_lprice')";
    $sql = mysqli_query($connection,$query);
    
    echo '<script type="text/javascript">';
    echo 'window.location.href="../admin/adminproduct.php";';
    echo '</script>';


    }

    else if(isset($_POST['remove'])){
        $delete_id = $_POST['delete_id'];
    
        $delete_productquery = "DELETE FROM `product` WHERE product_id = '$delete_id' "; 
        $delete_productsql = mysqli_query($connection,$delete_productquery);
        echo 1;

    }



}