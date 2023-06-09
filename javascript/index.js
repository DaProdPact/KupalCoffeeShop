$(document).ready(function() {

  
  $( ".primaryhome" ).hover(
    function() {
      $('#primarynavbar').removeClass( "sticky-top" )
      $('#primarynavbar').addClass( "primarybg" )
      $("#primarynavbar").removeClass("primarybghover");
    }
  );


  $( ".hoverprimary" ).hover(
    function() {
      $('#primarynavbar').addClass( "sticky-top" )
      $("#primarynavbar").addClass("primarybghover");
      $('#primarynavbar').removeClass( "primarybg" )

    }
  );


  $('.seen').on('click',function(){
    var seen = $(this).attr('id')
    console.log(seen)
    $.ajax({
      url:'../database/signin_signup_connection.php',
      method:'post',
      data:{
        seen:seen,
      },
      success:function(response){
        console.log(response)
        $('.seennotif').text('0')
      }
    })
  })

  $('.adminseen').on('click',function(){

    let adminseen = 'adminseen'
    $.ajax({
      url:'../database/signin_signup_connection.php',
      method:'post',
      data:{
        adminseen:adminseen,
      },
      success:function(response){
        console.log(response)
        $('.adminseennotif').text('0')
      }
    })
  })
  





  $('#signup').on('click',function(){
    $('#signup_modal').modal('show')
  });
  $('#login').on('click',function(){
    $('#login_modal').modal('show')
  });
  
  $('.message').toast('show');
  $('.fillup_fields').css('d-block');

  $('.form-control').on('keyup',function(){
    $('.form-helper').hide()
    $('.invalid').hide();

  })
  
// Register Function 
  $('#signup_btn').on('click',function(){
    var fullname = $('#fullname').val();
    var homeaddress = $('#homeaddress').val();
    var contact_number = $('#contact_number').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirmation = $('#password_confirmation').val();

    var array = [fullname,homeaddress,contact_number,email,password,password_confirmation];

    for (var i = 0; i < array.length; i++){
      if(array[i] == ''){
        $('.helper'+i).show();
      }
      else{
        $('.helper'+i).hide();
      }
    }

    if(!password && !password_confirmation){
      //
    }
    else{
      if(password != password_confirmation){
        $('.confirmation').show()
      }
      else{
        $('.confirmation').hide()
        let register = 'register';
        $.ajax({
          url:'../database/signin_signup_connection.php',
          method:'post',
          data:{
            register:register,
            fullname:fullname,
            homeaddress:homeaddress,
            contact_number:contact_number,
            email:email,
            password:password,
          },
          success:function(response){
            console.log(response)
            if(response == '1'){
              $('#signup_modal').modal('hide')
              $('.success').toast('show');
              $('.toastmessage').text('Register Successfully')
              $('.form-control').val('')
            }
            else if(response == '2'){
              $('.exist').show()
            }
          }
        })
      }
    }    

  })

  // End Register Function

  // Login Function
  $('#login_btn').on('click',function(){
    var email_login = $('#email_login').val();
    var password_login = $('#password_login').val();

    var login_array = [email_login,password_login];

    for (var i = 0; i < login_array.length; i++){
      if(login_array[i] == ''){
        $('.helper_login'+i).show();
      }
      else{
        $('.helper_login'+i).hide();
      }
    }

    if(!email_login || !password_login){
      //
    }
    else{
      let login = 'login'
      $.ajax({
        url:'../database/signin_signup_connection.php',
        method:'post',
        data:{
          login:login,
          email_login:email_login,
          password_login:password_login,
        },
        success:function(response){
          console.log(response)
          if(response == '1'){
            $('#login_modal').modal('hide')
            console.log('login')
            $('#success_modal').modal('show')
            $('#successmodal').text('Login Successfully')
            setTimeout(
              function() 
              {
                window.location.href = "home.php";
              }, 1000);
          }
          else if(response == '0'){
            $('#login_modal').modal('hide')
            $('#success_modal').modal('show')
            $('#successmodal').text('Admin Successfully Login')
            setTimeout(
              function() 
              {
                window.location.href = "../admin/admindashboard.php";
              }, 1000);
          }
          else if(response == '3'){
            $('.restricted').show();
          }
          else{
            $('.invalid').show();
          }
        }
      })
    }
  })
 // End Login Function

 // Logout Function
  $('#logout').on('click',function(){
    console.log('wew')
    $('#logout_modal').modal('show');
  })

  $('#logout_btn').on('click',function(){
    $('#logout_modal').modal('hide');
    $('#success_modal').modal('show')
    $('#successmodal').text('Logout Successfully')
    setTimeout(
      function() 
      {
        window.location.href = "../index.php";
      }, 1000);
  })
 // End Logout Function
 

  // Product Checkpoint
  $('.productcheckpoint').on('click',function(){
    console.log('woah')
    $('#checkpoint_modal').modal('show');
  })

  $('#gotologin').on('click',function(){
    $('#checkpoint_modal').modal('hide');
    $('#login_modal').modal('show')

  })
  // End Product Checkpoint

  // // View Item
  // $('#view_modal').modal('show')
  // // End View Item

});