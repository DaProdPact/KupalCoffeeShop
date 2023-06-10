<?php 
session_start();
$_SESSION['status'];
$session_id = $_SESSION['id'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
require('../components/secondary_navbar.php');
?>

<!-- Order Section -->
<section class="row mt-3 mb-2 ">
  <div class="d-flex justify-content-center">
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
      <p class="divider fw-bold">My Order</p>
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>

  <div class="row" id="order_container">
  </div>


</section>

<!-- End Order Section -->



<?php
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/order_detail.php');
require('../modals/successmodal.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>

<script src="../javascript/order.js"></script>

