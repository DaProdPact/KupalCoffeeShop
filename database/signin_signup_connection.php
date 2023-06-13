<?php
require('../database/database.php');

if(isset($_POST['register'])){
  $fullname = $_POST['fullname'];
  $homeaddress = $_POST['homeaddress'];
  $contact_number = $_POST['contact_number'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $checkemail = "SELECT * FROM `user_account` WHERE user_email = '$email'";
  $checksql = mysqli_query($connection,$checkemail);
  if(mysqli_num_rows($checksql) == 1){
      echo 2;
  }
  else{
    $registerquery = "INSERT INTO `user_account`(`user_fullname`, `user_home_address`, `user_contact_number`, `user_email`, `user_password`,`user_status`) VALUES ('$fullname','$homeaddress','$contact_number','$email',md5('$password'),'active')";
    if(mysqli_query($connection,$registerquery)){
      echo 1;
    }
  }


}

else if(isset($_POST['login'])){
  $email_login = $_POST['email_login'];
  $password_login = trim(md5($_POST['password_login']));

  $checkuser = "SELECT * FROM user_account WHERE user_email='$email_login' AND user_password = '$password_login'";
  $checksql = mysqli_query($connection,$checkuser);

  $adminuser = "SELECT * FROM `admin` WHERE admin_username='$email_login' AND admin_password = '$password_login'";
  $adminsql = mysqli_query($connection,$adminuser);


  if($adminsql->num_rows > 0 ){
    $data = $adminsql->fetch_assoc();
    session_start();
    // $_SESSION['id'] = $data['user_id'];
    $_SESSION['status'] = 'admin';
    
    echo 0;
  }
  else{
  if($checksql->num_rows > 0 ){
    $data = $checksql->fetch_assoc();
    session_start();
    $restrict = $data['user_status'];
    if($restrict == 'restrict'){
      echo 3;
    }
    else{
    $_SESSION['id'] = $data['user_id'];
    $_SESSION['status'] = 'login';
    echo 1;
    }
  }
  else{
    echo 2;
  }
}
}
else if(isset($_POST['seen'])){
  $seen = $_POST['seen'];
  $checkseenuser = "UPDATE `audit_trail` SET `audit_seen`='seen' WHERE audit_customer_id = '$seen' && audit_access = 'customer' ";
  $checkseensql = mysqli_query($connection,$checkseenuser);

  echo 1;


}

else if(isset($_POST['adminseen'])){
  $checkseenuser = "UPDATE `audit_trail` SET `audit_seen`='seen' WHERE audit_access = 'admin' ";
  $checkseensql = mysqli_query($connection,$checkseenuser);

  echo 1;


}

?>