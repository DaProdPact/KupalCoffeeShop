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

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="col-5">
            <span class="features-description ms-1">Quantity : x2</span>
          </div>
        </div>
        <div class="row">
          <p class="product_name fw-bold ms-1">Subtotal : $6</p>
        </div>

        <div class="row">
          <p class="product_name fw-bold ms-1">Status : In Progress</p>
        </div>


        <div class="row">
        <button type="button" class="buttonhover text-white py-1 rounded-2 primary-btn">Order Detail</button>
        </div>
      </div>
    </div>
  </div>


</section>

<!-- End Order Section -->



<?php
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/order_detail.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>