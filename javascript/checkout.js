$(document).ready(function(){
  $('#placeorder').on('click',function(){
    var userid = $('.user_id').val()
    var session_checkout = $('.session_checkout').val()
    var Customer_Name = $('#Customer_Name').val()
    var Customer_Address = $('#Customer_Address').val()
    var Customer_Number = $('#Customer_Address').val()
    var Customer_Email = $('#Customer_Email').val()
    var payment_method = $('#my-select').val()
    // var payment_method = $('#my-select option:selected').text()
    console.log(payment_method)
    $('.form-control').on('keyup',function(){
      $('.form-helper').hide()
  
    })

    if(!Customer_Name || !Customer_Address || !Customer_Number || !Customer_Email){
      var array = [Customer_Name,Customer_Address,Customer_Number,Customer_Email];
      for(var i = 0; i < array.length; i++){
        if(array[i] == ''){
          $('.helper'+i).show();
        }
        else{
          $('.helper'+i).hide();
        }
      }

    }
    else{
      let placeorder = 'placeorder'
      $.ajax({
        url:'../database/checkout_connection.php',
        method:'post',
        data:{
          userid:userid,
          placeorder:placeorder,
          Customer_Name:Customer_Name,
          Customer_Address:Customer_Address,
          Customer_Number:Customer_Number,
          Customer_Email:Customer_Email,
          payment_method:payment_method,
          session_checkout:session_checkout
        },
        success:function(response){
          console.log(response)
          $('#success_modal').modal('show')
          $('#successmodal').text('Order Successfully')
          setTimeout(
            function() 
            {
              window.location.href = "order.php";
            }, 1000);
        }
      })
    }




  })
})