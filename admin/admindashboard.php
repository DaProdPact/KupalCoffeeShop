<?php 
session_start();
$_SESSION['status'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
?>

<div class="row" style="height:100vh;">
  <div class="col-2 dashboardbg">
  <?php require('./sidebar.php'); ?>
  </div>
  <div class="col-10">
    <div class="row ms-3 mt-3">
    <div class="col-5 rounded-3 ms-3 mb-3" style="background-color:#68563685;">
      <div class="pt-3 ps-3" role="alert">
        <p class="fw-bold" style="color:#544040; font-size:1.3rem;"><i class="fas fa-user-group"></i> User</p>
        <?php
          $usercountquery = "SELECT user_id,COUNT(user_id) FROM `user_account` WHERE user_status = 'active' ";
          $usercountsql = mysqli_query($connection,$usercountquery);
          while($usercount= mysqli_fetch_assoc($usercountsql)){ ?>
            <p class="fw-semibold ms-2" style="color:#544040;"> <?=$usercount['COUNT(user_id)']?></p>
          <?php } ?>
      </div>
    </div>
    <div class="col-5 rounded-3 ms-3 mb-3" style="background-color:#68563685;">
      <div class="pt-3 ps-3" role="alert">
        <p class="fw-bold" style="color:#544040; font-size:1.3rem;"><i class="fas fa-user-slash"></i> Restrict Account</p>
        <?php
          $restrictcountquery = "SELECT user_id,COUNT(user_id) FROM `user_account` WHERE user_status = 'restrict' ";
          $restrictcountsql = mysqli_query($connection,$restrictcountquery);
          while($restrictcount= mysqli_fetch_assoc($restrictcountsql)){ ?>
            <p class="fw-semibold ms-2" style="color:#544040;"> <?=$restrictcount['COUNT(user_id)']?></p>
          <?php } ?>
      </div>
    </div>
    <div class="col-5 rounded-3 ms-3 mb-3" style="background-color:#68563685;">
      <div class="pt-3 ps-3" role="alert">
        <p class="fw-bold" style="color:#544040; font-size:1.3rem;"><i class="fas fa-bag-shopping"></i> Order</p>
        <?php
          $ordercountquery = "SELECT order_id,COUNT(order_id) FROM `order` ";
          $ordercountsql = mysqli_query($connection,$ordercountquery);
          while($ordercount= mysqli_fetch_assoc($ordercountsql)){ ?>
            <p class="fw-semibold ms-2" style="color:#544040;"> <?=$ordercount['COUNT(order_id)']?></p>
          <?php } ?>
      </div>
    </div>

    <div class="col-5 rounded-3 ms-3 mb-3" style="background-color:#68563685;">
      <div class="pt-3 ps-3" role="alert">
        <p class="fw-bold" style="color:#544040; font-size:1.3rem;"><i class="fas fa-basket-shopping"></i> Product</p>
        <?php
          $productcountquery = "SELECT product_id,COUNT(product_id) FROM `product` ";
          $productcountsql = mysqli_query($connection,$productcountquery);
          while($productcount= mysqli_fetch_assoc($productcountsql)){ ?>
            <p class="fw-semibold ms-2" style="color:#544040;"> <?=$productcount['COUNT(product_id)']?></p>
          <?php } ?>
      </div>
    </div>



    </div>
  </div>
</div>





<?php
require('../modals/successmodal.php');
require('../modals/message.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>