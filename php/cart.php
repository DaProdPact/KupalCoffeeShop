<?php 
session_start();
$_SESSION['status'];
$session_id = $_SESSION['id'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
require('../components/secondary_navbar.php');
?>

<!-- Item Cart Section -->
<section class="row mt-3 mb-2 ">
  <div class="d-flex justify-content-center">
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
      <p class="divider fw-bold">Product Added in Cart</p>
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>

  <div class="row" id="cart_container">

  </div>
</section>

<!-- End Item Cart Section -->

<!-- End Total in Cart Section -->

<div class="row">
<div class="offset-2 col-8 mb-3">

<div class="card primarybg">
    <div class="card-body">
      <div class="row">
          <p class="divider fw-bold mt-2 ms-1 text-center">Total Amount Payable : &#8369; <span class="totalpayable"></span> </p>
      </div>
      <div class="row">
      <button type="button" class="buttonhover text-white py-1 rounded-2 primary-btn mb-2 text-center" id="proceed">Proceed to Checkout</button>
      <button type="button" class="buttonhover text-white py-1 rounded-2 primary-btn mb-2">Remove all in the Cart</button>

      </div>
    </div>
  </div>
</div>
</div>

<!-- End Total in Cart Section -->

<?php
require('../modals/signin_signup.php');
require('../modals/validation.php');
require('../modals/successmodal.php');
require('../modals/message.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>
<script src="../javascript/cart.js"></script>
