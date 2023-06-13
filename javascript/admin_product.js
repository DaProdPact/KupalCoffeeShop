$(document).ready(function(){
  let getproduct = 'getproduct'
  $.ajax({ 
    url: "../database/admin_product_connection.php",
    method: "GET",
    data:{
      getproduct:getproduct,
    },
    success:function(response){
      console.log(response)
      if(response == 2){
        // no item
      }
      else{
      let products = JSON.parse(response);
   
      let rows = "";
      for (product of products){
        rows +=`
        <tr class="table-active" font-size:11px; font-weight:bold;">

        <td>
          <img src="../product_image/${product.product_picture}" class="cart_image" style="height: 25px;" alt="">
        </td>

        <td>  ${product.product_name}</td>
        <td> &#8369; ${product.small_price}</td>
        <td> &#8369; ${product.medium_price}</td>
        <td> &#8369; ${product.large_price}</td>

        <td class="d-flex gap-2" value="view" id="${product.product_name}">
        <i class="fas fa-edit text-primary p-0 edit_data" id="${product.product_id}" style="font-size:25px;"></i>
        <i class="fas fa-trash text-danger p-0 delete_data" id="${product.product_id}" style="font-size:25px;"></i>
       </td>

       </tr>`
      }
      $("#table_body").html(rows);
      $('.delete_data').on('click',function(){
        var delete_id = $(this).attr('id')
        $('#validation_modal').modal('show') 
        let removemodal = "";
        removemodal += `<div class="modal-header primarybg features-description">
            <h5 class="modal-title fw-bold" id="exampleModalLabel"> Remove Product</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p class="fw-bold">Do you really want to remove this product ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn primarybg features-description fw-bold removeid">Remove Product</button>
          </div>`;

        $("#remove_container").html(removemodal);
        $('.removeid').on('click',function(){
          console.log(delete_id)
          let remove = 'remove'
          $.ajax({
            url: "../database/admin_product_connection.php",
            method: "post",
            data:{
              remove:remove,
              delete_id:delete_id,
            },
            success:function(response){
              $('#validation_modal').modal('hide')
              $('#success_modal').modal('show')
              $('#successmodal').text('Successfully Delete')
              
              setTimeout(
                function() 
                {
                  window.location.href = "adminproduct.php";
                }, 1000);
            }
          })
        })
      })
      $('.edit_data').on('click',function(){
        var edit_id = $(this).attr('id')
        console.log(edit_id)
        let edit = 'edit'
        $.ajax({
          url: "../database/admin_product_connection.php",
          method: "post",
          data:{
            edit:edit,
            edit_id:edit_id,
          },
          success:function(response){
            console.log(response)
            $('#edit_modal').modal('show')
            let edit_products = JSON.parse(response);
   
            let rows = "";
            for (edit_product of edit_products){
              rows +=
              `<div class="modal-body">
              <div class="row">
                <div class="col-5 primarytext">
                <img src="../product_image/${edit_product.product_picture}" class="border-0 product_picture" alt="">
                </div>
                <div class="col-7">
                  <div class="form mb-2">
                    <label class="form-label ms-1 features-description fw-bold">Product Name</label>
                    <input type="text" id="update_product" class="form-control" placeholder="Product Name" value="${edit_product.product_name}"/>
                  </div>
                  <br>
                  <div class="form mb-2">
                  <label class="form-label ms-1 features-description fw-bold">Small Price</label>
      
                    <input type="text" id="update_sprice" class="form-control" placeholder="Small Price" value="${edit_product.small_price}"/>
                  </div>
                  <div class="form mb-2">
                  <label class="form-label ms-1 features-description fw-bold">Medium Price</label>
      
                    <input type="text" id="update_mprice" class="form-control" placeholder="Medium Price" value="${edit_product.medium_price}"/>
                  </div>
                  <div class="form mb-2">
                  <label class="form-label ms-1 features-description fw-bold">Large Price</label>
      
                    <input type="text" id="update_lprice" class="form-control" placeholder="Large Price" value="${edit_product.large_price}"/>
                  </div>
            
                  <div class="row mt-4">
                    <div class="offset-5 col-7">
                      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100 update_details" id="${edit_product.product_id}"> <i class="fas fa-pen-to-square"></i> Update Details</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>`
            }
            $("#edit_content").html(rows);
            $('.update_details').on('click',function(){
              var update_id = $(this).attr('id')
              var update_name = $('#update_product').val();
              var update_sprice = $('#update_sprice').val();
              var update_mprice = $('#update_mprice').val();
              var update_lprice = $('#update_lprice').val();

              console.log(update_id)
              console.log(update_name)
              console.log(update_sprice)
              console.log(update_mprice)
              console.log(update_lprice)

              let update = 'update'
              $.ajax({
                url: "../database/admin_product_connection.php",
                method: "post",
                data:{
                  update:update,
                  update_id:update_id,
                  update_name:update_name,
                  update_sprice:update_sprice,
                  update_mprice:update_mprice,
                  update_lprice:update_lprice,
                },
                success:function(response){
                  console.log(response)
                  $('#edit_modal').modal('hide')
                  $('#success_modal').modal('show')
                  $('#successmodal').text('Successfully Update')
                  
                  setTimeout(
                    function() 
                    {
                      window.location.href = "adminproduct.php";
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


  $('#add_product').on('click',function(){
    $('#addproduct_modal').modal('show')
  })
  
})