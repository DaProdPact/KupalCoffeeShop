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
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])){
    $edit_id = $_POST['edit_id'];
    $edit_product = array();
    $edit_productquery = "SELECT * FROM `product` WHERE product_id = '$edit_id' "; 
    $edit_productsql = mysqli_query($connection,$edit_productquery);

    if(mysqli_num_rows($edit_productsql) > 0){
        while($row = mysqli_fetch_assoc($edit_productsql)){
            $edit_product[] = $row;
        }
        echo json_encode($edit_product);
    }
    else{
        echo 2;
    }
   }

   else if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_sprice = $_POST['update_sprice'];
    $update_mprice = $_POST['update_mprice'];
    $update_lprice = $_POST['update_lprice'];

    $update_productquery = " UPDATE `product` SET `product_name`='$update_name',`small_price`='$update_sprice',`medium_price`='$update_mprice',`large_price`='$update_lprice' WHERE product_id = '$update_id'"; 
    $update_productsql = mysqli_query($connection,$update_productquery);
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