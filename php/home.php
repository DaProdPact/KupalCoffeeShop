<?php 
session_start();
$_SESSION['status'];
$session_id = $_SESSION['id'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
require('../components/secondary_navbar.php');
?>
<!-- Home Section -->
<div class="row bg-image primaryhome">
  <div class="col-6">
    <section class="row my-5" data-aos="fade-right" data-aos-duration="2000">
      <div class="col-8 bg-white bg-opacity-75 offset-2 border border-2 border-dark">
        <p class="quotes text-center">
          " Coffee always sounds like a brilliant idea. "
        </p>
        <p class="quotes text-start ps-5">
          ~ Unknown
        </p>

        <?php
        if($_SESSION['status'] == 'notyetlogin'){?>
        <button class="btn primary-btn text-white w-75 my-3 ms-5 nav-item productcheckpoint">SEE OUR MENU</button>
        <?php } else { ?>
        <a href="product.php"><button class="btn primary-btn text-white w-75 my-3 ms-5 nav-item">SEE OUR MENU</button></a>
        <?php } ?>
      </div>
    </section>
  </div>
  <div class="col-6">
    
  </div>
</div>
<!-- End Home Section -->

<!-- Feature Section -->

<section class="row mt-3 hoverprimary">
  <div class="d-flex justify-content-center title">
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
    <p class="divider fw-bold">Kupal's Cafe</p>
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>

  <div class="row my-3 gap-3 ps-5 me-5">
    <div class="col-4 d-block-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
      <img src="../img/picture1.jpg" class="featues_picture" alt="">
      <h4 class="divider fw-bold mt-2 ms-2">REST , RELAX and REVIVE</h4> 
      <p class="ps-2 features-description">
        At Kupal cafe, people come from all around to rest, relax and revive with good coffee, good company and great food!
      </p>
    </div>
    <div class="col-4 d-block-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
      <img src="../img/picture2.jpg" class="featues_picture" alt="">
      <h4 class="divider fw-bold mt-2 ms-2">DID SOMEONE SAY "COFFEE" !</h4> 
      <p class="ps-2 features-description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium fugiat voluptates cupiditate obcaecati, nulla eos debitis, impedit qui architecto consectetur.
      </p>
      <p class="ps-2 features-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, odio?</p>
      </div>
    <div class="col-3" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500">
      <img src="../img/picture3.png" class="schedule" alt="">
    </div>
  </div>
</section>

<!-- End Feature Section -->

<!-- About Section -->

<section class="row mt-3 mb-5 primarybg py-3" data-aos="fade-right" data-aos-duration="2000">

  <div class="col-5">
    <img src="../img/about_images.jpg" class="about_image ms-5 rounded-3" alt="">
  </div>
  <div class="col-6">
  <div class="d-flex justify-content-center">
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
    <p class="divider fw-bold">About</p>
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>
  <p class="ps-2 features-description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium fugiat voluptates cupiditate obcaecati, nulla eos debitis, impedit qui architecto consectetur.lorem5 
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis, architecto odio! Modi culpa at enim minus consectetur, cumque repellendus dignissimos ratione temporibus consequatur quis quae. Placeat, quidem! Ullam accusamus commodi, doloremque eveniet, dignissimos nisi expedita reiciendis blanditiis ipsam dolor veritatis autem id minus. Eos beatae vero consequuntur reprehenderit et odio?
   </p>
  </div>
</section>

<!-- End About Section -->

<!-- Best Seller Section -->

<section class="row mt-3 mb-5">
<div class="d-flex justify-content-center" data-aos="fade-left" data-aos-duration="2000" >
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
    <p class="divider fw-bold">Best Seller</p>
    <img src="../img/coffee_icon.png" class="cafe_icon" alt="">
  </div>
  <?php
$animationloop = 100;
$bestseller = "SELECT * FROM product LIMIT 3";
$bestsellersql = mysqli_query($connection,$bestseller);
while($row = mysqli_fetch_array($bestsellersql)){
$animationloop;
?>
  <div class="col-4 px-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="<?=$animationloop?>">
  <div class="card">
      <div class="card-body">
        <img src="../product_image/<?=$row['product_picture']?>" class="featues_picture" alt="">
        <div class="row">
          <div class="col-12">
            <p class="item_name fw-bold mt-2 ms-1"><?=$row['product_name']?></p>
          </div>
        </div>
        <div class="row">
        <?php if($_SESSION['status'] == 'notyetlogin'){?>
        <button class="btn primary-btn text-white mt-3 nav-item productcheckpoint">Go to Show Now !</button>
        <?php } 
        else { ?>
        <a href="product.php"><button class="btn primary-btn text-white mt-3 nav-item w-100">Go to Show Now !</button></a>
        <?php }?>
        </div>
      </div>
    </div>
  </div> 
<?php $animationloop = $animationloop + 200;
} ?>
</section>
<!-- End Best Seller Section -->

<!-- Footer Section -->
<section>
  <div class="row  bg-image bg-footer">
  <div class="mask pt-2">
    <div class="row pt-2">
      <div class="col-1 ps-5">
      <img src="../img/Cafelogo.png" class="logo" alt="">
      </div>
      <div class="col-4">
      <h3 class="primarytext text-white my-1">Kupal's Cafe</h3>
      </div>
    </div>

    <div class="row mt-2 ms-3">
      <div class="col-4 ps-3 pt-3">
        <p class="text-white fw-bold">ABOUT US</p>
        <p class="text-white">About us</p>
        <p class="text-white">Our Difference</p>
        <p class="text-white">Community Matters</p>
      </div>

      <div class="col-4 ps-3 pt-3">
        <p class="text-white fw-bold">SERVICES</p>
        <p class="text-white">Order</p>
        <p class="text-white">Help Center</p>
        <p class="text-white">Shipping</p>
      </div>

      <div class="col-4 ps-3 pt-3">
      <p class="text-white fw-bold">CONTACT US ON : </p>
      <div class="contact_icon d-flex gap-2">
        <i class="fab fa-facebook bg-white p-1 rounded-5 features-description icons"></i>
        <i class="fab fa-facebook-messenger bg-white p-1 rounded-5 features-description icons"></i>
        <i class="fab fa-twitter bg-white p-1 rounded-5 features-description icons"></i>
        <i class="fab fa-instagram bg-white p-1 rounded-5 features-description icons"></i>
        <i class="fas fa-at bg-white p-1 rounded-5 features-description icons"></i>
      </div>      
      </div>
    </div>

    <div class="row pt-3">
      <hr class="text-white">
      <p class="text-white text-center footer-text">Created by : Arjhen DC Madlangsakay</p>
    </div>
    </div>

  </div>
</section>
<!-- End Footer Section -->




<?php
require('../modals/successmodal.php');
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/checkpoint.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>