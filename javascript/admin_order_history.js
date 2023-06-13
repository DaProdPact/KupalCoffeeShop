$(document).ready(function(){
  let getorder = 'getorder'
  $.ajax({ 
    url: "../database/admin_order_history_connection.php",
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
        <td> ${order.order_status}</td>


       </tr>`
      }
      $("#table_body").html(rows);
    }


    }
  })



})