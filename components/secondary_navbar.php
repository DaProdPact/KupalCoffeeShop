<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarCenteredExample"
      aria-controls="navbarCenteredExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="100">
          <a class="nav-link primarytext" href="home.php"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Home</a>
        </li>

        <?php
        if($_SESSION['status'] == 'notyetlogin'){?>
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="500">
          <a class="nav-link primarytext productcheckpoint"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Our Menu</a>
        </li>
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="1000">
          <a class="nav-link primarytext productcheckpoint"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Order</a>
        </li>
        <?php } 
        else { ?>
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="500">
          <a class="nav-link primarytext" href="product.php"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Our Menu</a>
        </li>
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="1000">
          <a class="nav-link primarytext" href="order.php"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Order</a>
        </li>
        <?php } ?>
        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="1500">
          <a class="nav-link primarytext" href="#"><i class="fas fa-mug-hot fa-flip-horizontal"></i> News</a>
        </li>

        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="2000">
          <a class="nav-link primarytext" href="#"><i class="fas fa-mug-hot fa-flip-horizontal"></i> About</a>
        </li>

        <li class="nav-item" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="2500">
          <a class="nav-link primarytext" href="#"><i class="fas fa-mug-hot fa-flip-horizontal"></i> Contact Us</a>
        </li>
   
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>