<?php 
session_start();
$_SESSION['status'];
$session_id = $_SESSION['id'];
$session_checkout = $_SESSION['checkout'];
$total = 0;

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
require('../components/secondary_navbar.php');
?>

<!-- Order Section -->
<section class="row mt-3 mb-2 ">
  <div class="d-flex justify-content-center">
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
      <p class="divider fw-bold">Checkout Summary</p>
      <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>
  <?php 
    if($session_checkout == 'cart'){ ?>



      <div class="offset-2 col-8 shadow rounded-2">

      <div class="row">
        <p class="divider fw-bold text-center">My Bag</p>

        <?php
        $cartquery = "SELECT * FROM cart WHERE cart_user_id = '$session_id'";
        $cartsql = mysqli_query($connection,$cartquery);
        while($row = mysqli_fetch_assoc($cartsql)){ 
        $total = $total + $row['cart_product_subtotal'];
        ?>
        <div class="<?=$_SESSION['columnclass']?>">
        <div class="col-12 ms-4">
          <div class="row me-5 mb-2 ps-2 primarybg">
            <div class="col-3">
              <img src="../product_image/<?=$row['cart_product_profile']?>" class="cart_image my-2 pe-2" style="height:50px;" alt="">
            </div>
            <div class="col-9 mt-1">
              <span class="features-description fw-bold"><?=$row['cart_product_name']?></span><br>
              <small class="features-description">Price :  &#8369; <?=$row['cart_product_price']?></small>
              <small class="ps-5 features-description">&times;  <?=$row['cart_product_quantity']?></small>
          </div>
        </div>
        </div>
        </div>
        <?php } ?>

      </div>
      </div>
      <div class="row mt-3 shadow rounded-2 bg-white">
        <div class="col-10">
          <p class="divider fw-bold ps-5 pt-2">Total Amount Payable</p>
        </div>
        <div class="col-2">
          <p class="divider fw-bold ps-5 pt-2">&#8369; <?=$total?></p>
        </div>
  
      </div>
  
      <div class="row mt-3 shadow rounded-2 bg-white">
        <div class="col-10">
        <p class="divider fw-bold ps-5 pt-2">Shipping Fee</p>
        </div>
        <div class="col-2">
          <p class="divider fw-bold ps-5 pt-2">&#8369; 40</p>
        </div>
  
      </div>
  
      <div class="row mt-3 shadow rounded-2 bg-white">
        <div class="col-10">
        <p class="divider fw-bold ps-5 pt-2">Total </p>
        </div>
        <div class="col-2">
          <p class="divider fw-bold ps-5 pt-2">&#8369; <?=$total + 40 ?></p>
        </div>
  
      </div>

  <?php  } else {?>
  <div class="offset-2 col-8 shadow rounded-2">

    <div class="row">
      <p class="divider fw-bold text-center">My Bag</p>
      <div class="<?=$_SESSION['columnclass']?>">
      <div class="col-12 ms-4">
        <div class="row me-5 mb-2 ps-2 primarybg">
          <div class="col-3">
            <img src="../product_image/<?=$_SESSION['choosenpicture']?>" class="cart_image my-2 pe-2" alt="">
          </div>
          <div class="col-9 mt-1">
            <span class="features-description fw-bold"><?=$_SESSION['chosen_product_name']?></span><br>
            <small class="features-description">Price :  &#8369; <?=$_SESSION['sizeprice']?></small>
            <small class="ps-5 features-description">&times;  <?=$_SESSION['chosenquantity']?></small>
        </div>
      </div>
      </div>
      </div>
    </div>
    </div>
    <div class="row mt-3 shadow rounded-2 bg-white">
      <div class="col-10">
        <p class="divider fw-bold ps-5 pt-2">Total Amount Payable</p>
      </div>
      <div class="col-2">
        <p class="divider fw-bold ps-5 pt-2">&#8369; <?=$_SESSION['totalpayable']?></p>
      </div>

    </div>

    <div class="row mt-3 shadow rounded-2 bg-white">
      <div class="col-10">
      <p class="divider fw-bold ps-5 pt-2">Shipping Fee</p>
      </div>
      <div class="col-2">
        <p class="divider fw-bold ps-5 pt-2">&#8369; 40</p>
      </div>

    </div>

    <div class="row mt-3 shadow rounded-2 bg-white">
      <div class="col-10">
      <p class="divider fw-bold ps-5 pt-2">Total </p>
      </div>
      <div class="col-2">
        <p class="divider fw-bold ps-5 pt-2">&#8369; <?=$_SESSION['totalpayable'] + 40 ?></p>
      </div>

    </div>

    <?php } ?>

    <div class="offset-2 col-8 shadow rounded-2 mt-3 mb-3">
    <div class="row shadow">
      <p class="divider fw-bold text-center">Billing Details</p>
      <div class="col-6">
        <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold">Customer Name</label>
          <input type="text" id="Customer_Name" class="form-control" placeholder="Customer Name"/>
          <small class="form-helper ms-1 text-danger helper0" style="display:none;">Customer Name is required*</small>
        </div>
      </div>

      <div class="col-6">
        <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold">Customer Address</label>
          <input type="text" id="Customer_Address" class="form-control" placeholder="Customer Address"/>
          <small class="form-helper ms-1 text-danger helper1" style="display:none;">Customer Address is required*</small>
        </div>
      </div>

      <div class="col-6">
      <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold">Customer Number</label>
          <input type="text" id="Customer_Number" class="form-control" placeholder="Customer Number"/>
          <small class="form-helper ms-1 text-danger helper2" style="display:none;">Customer Number is required*</small>
        </div>
      </div>

      <div class="col-6">
        <div class="form mb-2">
          <div class="form-group">
          <label class="form-label ms-1 features-description fw-bold">Payment Method</label>
            <select id="my-select" class="form-control" name="">
              <option value="COD">Cash On Delivery</option>
              <option value="Online">PAYMAYA</option>

            </select>
          </div>
        </div>
      </div>

      <div class="col-6 mb-2">
        <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold">Customer Email</label>
          <input type="text" id="Customer_Email" class="form-control" placeholder="Customer Email"/>
          <small class="form-helper ms-1 text-danger helper3" style="display:none;">Customer Email is required*</small>
        </div>
      </div>

      <div class="col-12">
      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100" id="placeorder"> <i class="fas fa-location-dot"></i> Place Order</button>
      <input type="hidden" class="session_checkout" value="<?=$session_checkout?>">
      <input type="hidden" class="user_id" value="<?=$session_id?>">
      </div>

      <div class="col-12">
      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-3 w-100"> <i class="fas fa-circle-arrow-left"></i> Back to Shop</button>
      </div>
    </div>
    </div>

</section>

<!-- End Order Section -->

<?php
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/successmodal.php');
require('../modals/logout.php');
require('../partials/footer.html');

?>
<script src="../javascript/checkout.js"></script>
