$(document).ready(function(){
  let getorder = 'getorder'
  $.ajax({ 
    url: "../database/admin_order_manage_connection.php",
    method: "GET",
    data:{
      getorder:getorder,
    },
    success:function(response){
      console.log(response)
      if(response == 2){
        let rows = "";
        rows +=`
        <tr class="font-size:11px; font-weight:bold;">
        <td colspan="7" class="text-center">
          No Order Request
       </td>

       </tr>`
       $("#table_body").html(rows);
      }
      
      else{
      let orders = JSON.parse(response);
   
      let rows = "";
      for (order of orders){
        rows +=`
        <tr class="table-active" font-size:11px; font-weight:bold;">
        <td class="fw-bold"> ${order.order_customer_fullname}</td>

        <td>
          <img src="../product_image/${order.order_product_profile}" class="cart_image" style="height: 25px;" alt="">
        </td>

        <td>  ${order.order_product_name}</td>
        <td> &#8369; ${order.order_product_subtotal}</td>
        <td> ${order.order_size}</td>
        <td> ${order.order_product_quantity}</td>

        <td class="d-flex gap-2" value="view">
        <i class="fab fa-get-pocket text-primary p-0 approve_data" id="${order.order_id}" style="font-size:25px;"></i>
       </td>

       </tr>`
      }
      $("#table_body").html(rows);
      $('.approve_data').on('click',function(){
        var approve_id = $(this).attr('id')
        console.log(approve_id)
        let approve = 'approve'
        $.ajax({
          url: "../database/admin_order_connection.php",
          method: "post",
          data:{
            approve:approve,
            approve_id:approve_id,
          },
          success:function(response){
            console.log(response)
            $('#view_modal').modal('show')
            let approve_orders = JSON.parse(response);
   
            let rows = "";
            for (approve_order of approve_orders){
              rows +=
              `<div class="modal-body">
              <div class="row">
                <div class="col-5 primarytext">
                <img src="../product_image/${approve_order.order_product_profile}" id="${approve_order.order_product_profile}" class="border-0 product_picture product_img" alt="">
                <small class="features-description">Price : &#8369;${approve_order.order_product_price} &times; ${approve_order.order_product_quantity}</small> <br>
                <span class="features-description fw-bold mb-3 opname">${approve_order.order_product_name}</span><br> <br>
                <span class="text-white secondarybg px-5 py-1 rounded-3 mt-3">Total Amount Payable : &#8369;${approve_order.order_product_subtotal}</span><br>
      
      
                </div>
                <div class="col-7">
                  <span class="features-description fw-bold">Billing Address</span><br>
                  <small class="features-description"><span class="fw-bold ocname" id="${approve_order.order_customer_fullname}"><i class="far fa-circle-user"></i> Name : </span> ${approve_order.order_customer_fullname}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-phone"></i> Contact Number : </span> ${approve_order.order_customer_number} </small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-at"></i> Email Address : </span>${approve_order.order_customer_email}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-location-dot"></i> Location : </span> ${approve_order.order_customer_address}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-people-arrows"></i> Status : </span> ${approve_order.order_status}</small> <br>
                  
                  <div class="row form">
                  <div class="form-group mb-5 mt-2">
                    <select id="status" class="form-control" name="">
                      <option value="${approve_order.order_status}" class="text-secondary">Choose Status</option>
                      <option value="In Progress">In Progress</option>
                      <option value="To Deliver">To Deliver</option>
                      <option value="Cancel">Cancel Order</option>
                    </select>
                </div>

                    <div class="offset-7 col-5">
                      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100 approve_order" id="${approve_order.order_id}"> Update Status</button>
                      <input type="hidden" class="user_id" id="${approve_order.order_user_id}">
                  
                    </div>
                  </div>
                </div>
              </div>
              </div>`
            }
            $("#order_detail_content").html(rows);


            $('.approve_order').on('click',function(){
              var status = $('#status').val()
              var approve_id = $(this).attr('id')
              var user = $('.user_id').attr('id')
              var ocname = $('.ocname').attr('id')
              var opname = $('.opname').text()
              var product_img = $('.product_img').attr('id')
  
              console.log(status)
              console.log(user)
              console.log(ocname)
              console.log(opname)
              console.log(product_img)


              $.ajax({
                url: "../database/admin_order_manage_connection.php",
                method: "post",
                data:{
                  approve_id:approve_id,
                  status:status,
                  user:user,
                  ocname:ocname,
                  opname:opname,
                  product_img:product_img
                },
                success:function(response){
                  console.log(response)
                  $('#view_modal').modal('hide')
                  $('#success_modal').modal('show')
                  $('#successmodal').text('Update Status Successfully')
                  setTimeout(
                    function() 
                    {
                      window.location.href = "admin_manage_order.php";
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