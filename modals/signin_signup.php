<!-- Signup Section -->
<div class="modal fade" id="signup_modal" tabindex="-1" aria-labelledby="register_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primaryfont primarytext primarybg">
        <img src="../img/Cafelogo.png" class="logo m-0" alt="">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="fw-bold text-center primarytext">Welcome to Kupal's Cafe</h3>
        <p class="text-secondary text-center">Sign Up to create an account</p>

        <div class="alert alert-danger d-none fillup_fields" role="alert">
          Fill up all the fields
        </div>
      
            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold">Fullname</label>
              <input type="text" id="fullname" class="form-control" placeholder="Fullname"/>
              <small class="form-helper ms-1 text-danger helper0" style="display:none;">Fullname is required*</small>
            </div>

            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold" >Home Address</label>
              <input type="text" id="homeaddress" class="form-control" placeholder="Home Address" />
              <small class="form-helper ms-1 text-danger helper1" style="display:none;">Home Address is required*</small>
            </div>
            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold" >Contact Number</label>
              <input type="text" id="contact_number" class="form-control" placeholder="Contact Number" />
              <small class="form-helper ms-1 text-danger helper2" style="display:none;">Contact Number is required*</small>
            </div>

            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold">Email Address</label>
              <input type="text" id="email" class="form-control" placeholder="Email Address"/>
              <small class="form-helper ms-1 text-danger helper3" style="display:none;">Email Address is required*</small>
              <small class="form-helper ms-1 text-danger exist" style="display:none;">Email already exist*</small>
            </div>

            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold" >Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" />
              <small class="form-helper ms-1 text-danger helper4" style="display:none;">Password is required*</small>
              <small class="form-helper ms-1 text-danger confirmation" style="display:none;">Password doesn't match*</small>
            </div>

            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold" >Re-type Password</label>
              <input type="password" id="password_confirmation" class="form-control" placeholder="Re-type Password" />
              <small class="form-helper ms-1 text-danger helper5" style="display:none;">Re-type Password is required*</small> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn primarytext" data-mdb-dismiss="modal">Close</button>
          <button type="button" class="btn primarybg" id="signup_btn">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

<!-- End Signup Section -->

<!-- Signin Section -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="register_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primaryfont primarytext primarybg">
        <img src="../img/Cafelogo.png" class="logo m-0" alt="">
        <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <h3 class="fw-bold text-center primarytext">Welcome to Kupal's Cafe</h3>
        <p class="text-secondary text-center">Sign in your account</p>

        <div class="alert alert-danger invalid" role="alert" style="display:none;">
          Invalid Credentials
        </div>
      
        <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold">Email Address</label>
          <input type="text" id="email_login" class="form-control" placeholder="Email Address"/>
          <small class="form-helper ms-1 text-danger helper_login0" style="display:none;">Email is required*</small>
        </div>
     
        <div class="form mb-2">
          <label class="form-label ms-1 features-description fw-bold" >Password</label>
          <input type="password" id="password_login" class="form-control" placeholder="Password" />
          <small class="form-helper ms-1 text-danger helper_login1" style="display:none;">Password is required*</small>
        </div>

        <div class="row">
          <div class="col-7 col-md-6">
            <div class="form-check ms-md-2">
              <input
                class="form-check-input"
                type="checkbox"
                id="CheckRememberMe"
              />
              <label class="form-check-label" for="CheckRemberMe"
                >Remember Me</label
              >
            </div>
          </div>
          <div class="col-12 col-md-6 d-flex justify-content-end">
            <div>
              <span
                id="forgetpass"
                class="text-decoration-none"
                data-mdb-dismiss="modal"
                style="color: #544040;"

                >Forget Password?</span
              >
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn primarytext" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn primarybg" id="login_btn">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- End Signin Section -->


