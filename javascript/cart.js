$(document).ready(function() {


  let getcart = 'getcart'
  $.ajax({ 
    url: "../database/cart_connection.php",
    method: "GET",
    data:{
      getcart:getcart,
    },
    success:function (res) {
      console.log(res);
      if(res == 2){
        // no item
        $('.cartpayable').hide();
        let rows = "";
        rows += `<div class="col-8 offset-2 px-3 mb-3">
        <div class="card" style="border:#DEB88B 10px double;">
            <div class="card-body">
              <p class="text-center fw-bold features-description" style="color:#DEB88B;">Your Cart is Empty</p>
            </div>
          </div>
        </div>`;
      $("#cart_container").html(rows);
      }
      else{
      var total = 0;
      var subtotal = 0;

      let carts = JSON.parse(res);
   
      let rows = "";
      for (cart of carts){
        subtotal = cart.cart_product_subtotal;
        total = parseInt(total)+parseInt(subtotal);
        rows += `<div class="col-3 px-3 mb-3">
        <div class="card">
            <div class="card-body">
              <img src="../product_image/${cart.cart_product_profile}" class="product_picture" alt="">
              <div class="row">
                <div class="col-7">
                  <p class="product_name fw-bold mt-2 ms-1">${cart.cart_product_name}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-7">
                  <span class="features-description ms-1">Price : &#8369; ${cart.cart_product_price}</span>
                </div>
                <div class="col-5">
                  <span class="features-description ms-1">Quantity : ${cart.cart_product_quantity}</span>
                </div>
              </div>
      
              <div class="row">
              <div class="col-7">
              <p class="product_name fw-bold ms-1">Subtotal : &#8369; ${cart.cart_product_subtotal}</p>
              </div>
              <div class="col-5">
                <p class="product_name fw-bold ms-1">Size : ${cart.cart_size}</p>
              </div>
            </div>
      
              <div class="row">
              <button type="button" class="buttonhover text-white py-1 rounded-2 primary-btn remove_incart" id="${cart.cart_id}">Remove to Cart</button>
              </div>
            </div>
          </div>
        </div>`;
      }
      $("#cart_container").html(rows);
      $('.totalpayable').text(total)
      $('#proceed').on('click',function(){
        let paycart = 'paycart';
        $.ajax({
          url: "../database/cart_connection.php",
          method: "post",
          data:{
            paycart:paycart,
          },
          success:function (res) {
            if(res == '1'){
              window.location.href = "checkout.php";
            }
          }
        })
      })
      $('.remove_incart').on('click',function(){
        var removeid = $(this).attr('id');
        $('#validation_modal').modal('show')
        let removemodal = "";
        removemodal += `<div class="modal-header primarybg features-description">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cart-shopping"></i> Remove to Cart</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p class="fw-bold">Do you really want to remove this item from your shopping cart?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn primarybg features-description fw-bold removeid">Remove to Cart</button>
          </div>`;

        $("#remove_container").html(removemodal);
        $('.removeid').on('click',function(){
          console.log(removeid);
          let remove = 'remove';
          $.ajax({
            url: "../database/cart_connection.php",
            method: "post",
            data:{
              remove:remove,
              removeid:removeid,
            },
            success:function (res) {
              if(res == '1'){
                $('#validation_modal').modal('hide')
                $('#success_modal').modal('show')
                $('#successmodal').text('Successfully Remove from Cart')
                setTimeout(
                  function(){
                    window.location.href = "cart.php";
                },1000)
              }
            }
          })
        })



      })

      $('#removeall').on('click',function(){
        console.log('a')
      $('#validation_modal').modal('show')
        let removeallmodal = "";
        removeallmodal += `<div class="modal-header primarybg features-description">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cart-shopping"></i> Remove all from Cart</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p class="fw-bold">Do you really want to remove all item from your shopping cart?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn primarybg features-description fw-bold removeallcart">Remove all from Cart</button>
          </div>`;

        $("#remove_container").html(removeallmodal);
        $('.removeallcart').on('click',function(){
          let removeall = 'removeall';
          $.ajax({
            url: "../database/cart_connection.php",
            method: "post",
            data:{
              removeall:removeall,
            },
            success:function (res) {
              if(res == '1'){
                $('#validation_modal').modal('hide')
                $('#success_modal').modal('show')
                $('#successmodal').text('Successfully Remove all from Cart')
                setTimeout(
                  function(){
                    window.location.href = "cart.php";
                },1000)
              }
            }
          })
        })
      })

    }
  }
})
})
