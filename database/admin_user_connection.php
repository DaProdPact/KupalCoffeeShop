<?php 
require('../database/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['getuser'])){
    $user = array();
    $userquery = "SELECT * FROM `user_account` "; 
    $usersql = mysqli_query($connection,$userquery);

    if(mysqli_num_rows($usersql) > 0){
        while($row = mysqli_fetch_assoc($usersql)){
            $user[] = $row;
        }
        echo json_encode($user);
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
    $approve_productquery = "SELECT * FROM `user_account` WHERE user_id = '$approve_id' "; 
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
   else if(isset($_POST['status'])){
    $approve_id = $_POST['approve_id'];
    $status = $_POST['status'];

    $approvequery = " UPDATE `user_account` SET `user_status`='$status' WHERE user_id = '$approve_id'"; 
    $approvesql = mysqli_query($connection,$approvequery);
    echo 1;

   }




}