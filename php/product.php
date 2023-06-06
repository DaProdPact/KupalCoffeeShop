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

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/black_coffee.jpeg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Black Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/capucino_coffee.png" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Capucino Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/black_coffee.jpeg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Black Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/capucino_coffee.png" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Capucino Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/black_coffee.jpeg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Black Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
        <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/capucino_coffee.png" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Capucino Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 px-3 mb-3">

  <div class="card">
      <div class="card-body">
        <img src="../img/americano_coffee.jpg" class="product_picture" alt="">
        <div class="row">
          <div class="col-7">
            <p class="product_name fw-bold mt-2 ms-1">Americano Coffee</p>
          </div>
          <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
          <i class="fas fa-cart-shopping features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
          <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <span class="features-description ms-1">Price : $2</span>
          </div>
          <div class="offset-2 col-3">
            <input type="number" id="quantity" class="form-control" value="1" />
          </div>
        </div>
      <div class="row">
        <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn">Buy Now !</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- End Menu Section -->


<?php
require('../modals/signin_signup.php');
require('../modals/message.php');
require('../modals/product_view.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>