$(document).ready(function(){
  let getuser = 'getuser'
  $.ajax({ 
    url: "../database/admin_user_connection.php",
    method: "GET",
    data:{
      getuser:getuser,
    },
    success:function(response){
      console.log(response)
      if(response == 2){
        let rows = "";
        rows +=`
        <tr class="font-size:11px; font-weight:bold;">
        <td colspan="7" class="text-center">
          No User
       </td>

       </tr>`
       $("#table_body").html(rows);
      }
      
      else{
      let users = JSON.parse(response);
   
      let rows = "";
      for (user of users){
        rows +=`
        <tr class="table-active" font-size:9px; font-weight:bold;">
        <td> ${user.user_fullname}</td>
        <td> ${user.user_home_address}</td>
        <td> ${user.user_contact_number}</td>
        <td> ${user.user_email}</td>
        <td> ${user.user_status}</td>

        <td class="d-flex gap-2" value="view">
        <i class="fab fa-get-pocket text-primary p-0 approve_data" id="${user.user_id}" style="font-size:30px;"></i>
       </td>

       </tr>`
      }
      $("#table_body").html(rows);
      $('.approve_data').on('click',function(){
        var approve_id = $(this).attr('id')
        console.log(approve_id)
        let approve = 'approve'
        $.ajax({
          url: "../database/admin_user_connection.php",
          method: "post",
          data:{
            approve:approve,
            approve_id:approve_id,
          },
          success:function(response){
            console.log(response)
            $('#view_modal').modal('show')
            let user_details = JSON.parse(response);
   
            let rows = "";
            for (user_detail of user_details){
              rows +=
              `<div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <span class="features-description fw-bold">User Details</span><br>
                  <small class="features-description"><span class="fw-bold ocname" id="${user_detail.user_fullname}"><i class="far fa-circle-user"></i> Name : </span> ${user_detail.user_fullname}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-phone"></i> Contact Number : </span> ${user_detail.user_contact_number} </small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-at"></i> Email Address : </span>${user_detail.user_email}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-location-dot"></i> Location : </span> ${user_detail.user_home_address}</small> <br>
                  <small class="features-description"><span class="fw-bold"><i class="fas fa-people-arrows"></i> Status : </span> ${user_detail.user_status}</small> <br>
                  
                  <div class="row form">
                  <div class="form-group mb-5 mt-2">
                    <select id="status" class="form-control" name="">
                      <option value="${user_detail.user_status}" class="text-secondary">Choose Status</option>
                      <option value="active">Active</option>
                      <option value="restrict">Restrict</option>
                    </select>
                </div>

                    <div class="offset-7 col-5">
                      <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100 approve_order" id="${user_detail.user_id}"> Update Status</button>
                
                  
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
  
              console.log(status)
              console.log(approve_id)



              let userstatus = 'userstatus';
              $.ajax({
                url: "../database/admin_user_connection.php",
                method: "post",
                data:{
                  approve_id:approve_id,
                  status:status,
                },
                success:function(response){
                  console.log(response)
                  $('#view_modal').modal('hide')
                  $('#success_modal').modal('show')
                  $('#successmodal').text('Update Status Successfully')
                  setTimeout(
                    function() 
                    {
                      window.location.href = "admin_user.php";
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