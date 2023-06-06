
<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light primarybg">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="../img/Cafelogo.png" class="logo" alt="">
        <h3 class="primarytext my-1">Kupal's Cafe</h3>
      </a>
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <div class="dropdown">
        <a class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
          <a class="divider" href="#">
            <h3 class="primarytext my-1 ps-2"> <i class="fas fa-cart-arrow-down"></i> Cart</h3>
          </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <div class="row me-5 mb-2">
              <div class="col-5">
                <img src="../img/Cafelogo.png" class="cart_image" alt="">
              </div>
              <div class="col-6">
                <span class="features-description fw-bold">Americano Coffee</span><br>
                <small class="features-description">Price : $2</small>
                <small class="ps-5 features-description">x3</small>


              </div>
              </div>
              <div class="row me-5 mb-2">
              <div class="col-5">
                <img src="../img/Cafelogo.png" class="cart_image" alt="">
              </div>
              <div class="col-6">
                <span class="features-description pe-2 fw-bold">Americano Coffee</span><br>
                <small class="features-description pe-2">Price : $2</small>
                <small class="ps-5 features-description pe-2">x3</small>


              </div>
              </div>

              
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="cart.php"> <i class="fas fa-arrow-right-from-bracket"></i> Go to Cart</a>
          </li>
        </ul>
      </div>
      <!-- Notifications -->
      <div class="dropdown">
        <a
          class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <i class="fas fa-circle-user text-dark"></i>

        
        </a>

        
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >

        <?php 
        if($_SESSION['status'] == 'notyetlogin'){ ?>
        <li>
          <div class="text-center m-1 border-bottom">
            <i class="fas fa-circle-user text-dark no-user"></i>
            <p class="m-1">No User Account</p>
          </div>
        </li>
        <li>
          <a class="dropdown-item" id="signup" data-mdb-target="" data-mdb-toggle="modal"> Sign Up</a>
        </li>
        <li>
          <a class="dropdown-item" id="login" data-mdb-target="" data-mdb-toggle="modal"> Login</a>
        </li>
        <?php } 
        else { ?> 
        <li>
          <div class="text-center m-1 border-bottom">
            <i class="fas fa-circle-user text-dark no-user"></i>
            <?php
            $userquery = "SELECT * FROM user_account WHERE user_id='$session_id'";
            $usersql = mysqli_query($connection,$userquery);
            
            while($row = mysqli_fetch_array($usersql)){
            ?>
            <p class="m-1"><?=$row['user_fullname']?></p>
            <?php } ?>
          </div>
        </li>
        <li>
          <a class="dropdown-item" id="profile" data-mdb-target="" data-mdb-toggle="modal"> Profile</a>
        </li>
        <li>
          <a class="dropdown-item" id="logout" data-mdb-target="" data-mdb-toggle="modal"> Logout</a>
        </li>
        <?php }?>
      



        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->