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
    $registerquery = "INSERT INTO `user_account`(`user_fullname`, `user_home_address`, `user_contact_number`, `user_email`, `user_password`) VALUES ('$fullname','$homeaddress','$contact_number','$email',md5('$password'))";
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

  if($checksql->num_rows > 0 ){
    $data = $checksql->fetch_assoc();
    session_start();
    $_SESSION['id'] = $data['user_id'];
    $_SESSION['status'] = 'login';
    echo 1;
  }
  else{
    echo 2;
  }
}
?>