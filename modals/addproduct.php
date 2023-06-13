<div class="modal fade" id="addproduct_modal" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content" id="addproduct_modal">
        <div class="modal-body">
        <div class="row">
        <form method="post" action="../database/admin_product_connection.php" enctype="multipart/form-data">
            <div class="mb-3">
            <span class="features-description fw-bold me-3">Product Image</span><br>
              <input type="file" name="uploadfile" />
            </div>
            <div class="form mb-2">
              <label class="form-label ms-1 features-description fw-bold">Product Name</label>

              <input type="text" name="product_name" class="form-control" placeholder="Product Name"/>
            </div>
            <div class="form mb-2">
            <label class="form-label ms-1 features-description fw-bold">Small Price</label>

              <input type="text" name="product_sprice" class="form-control" placeholder="Small Price"/>
            </div>
            <div class="form mb-2">
            <label class="form-label ms-1 features-description fw-bold">Medium Price</label>

              <input type="text" name="product_mprice" class="form-control" placeholder="Medium Price"/>
            </div>
            <div class="form mb-2">
            <label class="form-label ms-1 features-description fw-bold">Large Price</label>

              <input type="text" name="product_lprice" class="form-control" placeholder="Large Price"/>
            </div>

            <div class="row mt-4">
              <div class="offset-5 col-7">
                <button type="submit" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100" name="uploadfilesub" value="upload">  Add Product</button>
              </div>
     
            </div>
          </form>
        </div>
        </div>
    </div>
  </div>
</div>
