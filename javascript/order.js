$(document).ready(function() {


  let getorder = 'getorder'
  $.ajax({ 
    url: "../database/order_connection.php",
    method: "GET",
    data:{
      getorder:getorder,
    },
    success:function (res) {
      console.log(res);
      if(res == 2){
        // no order
      }
      else{
      let orders = JSON.parse(res);
      
      let rows = "";
      for (order of orders){

        rows += `<div class="col-3 mb-3">
        <div class="card">
            <div class="card-body">
              <img src="../product_image/${order.order_product_profile}" class="product_picture" alt="">
              <div class="row">
                <div class="col-7">
                  <p class="product_name fw-bold mt-2 ms-1">${order.order_product_name}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-7">
                  <span class="features-description ms-1">Price : &#8369; ${order.order_product_price}</span>
                </div>
                <div class="col-5">
                  <span class="features-description ms-1">Quantity : ${order.order_product_quantity}</span>
                </div>
              </div>

              <div class="row">
              <div class="col-7">
              <p class="product_name fw-bold ms-1">Subtotal : &#8369; ${order.order_product_subtotal}</p>
              </div>
              <div class="col-5">
                <p class="product_name fw-bold ms-1">Size : ${order.order_size}</p>
              </div>
            </div>

              <div class="row">
                <p class="product_name fw-bold ms-1">Status : ${order.order_status}</p>
              </div>
      
              <div class="row">
              <button type="button" class="buttonhover text-white py-1 rounded-2 primary-btn order_detail" id="${order.order_id}">Order Detail</button>
              </div>
            </div>
          </div>
        </div>`;
        }
        $("#order_container").html(rows);
        
        $('.order_detail').on('click',function(){
          var order_id = $(this).attr('id');
          console.log(order_id)
          var order_detail = 'order_detail'; 
          $.ajax({
            url: "../database/order_connection.php",
            method: "post",
            data:{
              order_detail:order_detail,
              order_id:order_id,
            },
            success:function(response){
              console.log(response)
              let user_order = "";
              let details = JSON.parse(response);
              for (detail of details){
              $('#view_modal').modal('show')
              user_order += `
              <div class="modal-body">
              <div class="row">
                <div class="col-5 primarytext">
                <img src="../product_image/${detail.order_product_profile}" class="border-0 product_picture" alt="">
                <small class="features-description">Price : &#8369;${detail.order_product_price} &times; ${detail.order_product_quantity}</small> <br>
                <span class="features-description fw-bold mb-3">${detail.order_product_name}</span><br> <br>
                <span class="text-white secondarybg px-5 py-1 rounded-3 mt-3">Total Amount Payable : &#8369;${detail.order_product_subtotal}</span><br>
      
      
                </div>
                <div class="col-7">
                  <span class="features-description fw-bold">Billing Address</span><br>
                  <small class="features-description"><span class="fw-bold"><i class="far fa-circle-user"></i> Name : </span> ${detail.order_customer_fullname}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-phone"></i> Contact Number : </span> ${detail.order_customer_number} </small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-at"></i> Email Address : </span>${detail.order_customer_email}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-location-dot"></i> Location : </span> ${detail.order_customer_address}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-people-arrows"></i> Status : </span> ${detail.order_status}</small> <br>
                  <div class="row mt-5">
                    <div class="offset-7 col-5">
                      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 cancel_order" id="${detail.order_id}"><i class="fas fa-ban pe-3"></i> Cancel Order</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>`;
            }
              $("#order_detail_content").html(user_order);
              $('.cancel_order').on('click',function(){
                var cancel_orderid = $(this).attr('id')
                console.log(cancel_orderid);
                let cancel = 'cancel'
                $.ajax({
                  url: "../database/order_connection.php",
                  method: "post",
                  data:{
                    cancel:cancel,
                    cancel_orderid:cancel_orderid,
                  },
                  success:function(response){
                    console.log(response)
                    $('#view_modal').modal('hide')
                    $('#success_modal').modal('show')
                    $('#successmodal').text('Cancel Successfully')
                    setTimeout(
                      function() 
                      {
                        window.location.href = "order.php";
                      }, 1000);
                  }
                })
              })
            }
          })

        })


        }
      }
    })
  })

  