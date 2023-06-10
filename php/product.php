<?php 
session_start();
$_SESSION['status'];
$session_id = $_SESSION['id'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
require('../components/secondary_navbar.php');
?>

<!-- Menu Section -->
<section class="row mt-3 mb-5 ">
<div class="d-flex justify-content-center">
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
    <p class="divider fw-bold">Our Menu</p>
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>

  <div class="row" id="product_container">
  </div>
</section>

<!-- End Menu Section -->


<?php
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/choose_size.php');
require('../modals/product_view.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>
<script src="../javascript/product.js"></script>
