<?php
header("location: php/home.php");
session_start();
$_SESSION['status'] = 'notyetlogin';
$_SESSION['id'] = 0;



?>