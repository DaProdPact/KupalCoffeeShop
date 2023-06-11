$(document).ready(function() {
  let getproduct = 'getproduct'
  $.ajax({ 
    url: "../database/product_connection.php",
    method: "GET",
    data:{
      getproduct:getproduct,
    },
    success:function (res) {
      console.log(res);
      if(res == 2){
        // no item
      }
      else{
      let products = JSON.parse(res);
   
      let rows = "";
      for (product of products){
  
      var smallprice = product.small_price;
      var mediumprice = product.medium_price;
      var largeprice = product.large_price;

        rows += `<div class="col-3 px-3 mb-3">
        <div class="card">
            <div class="card-body">
              <img src="../product_image/${product.product_picture}" class="product_picture product_picture${product.product_id}" id="${product.product_picture}" alt="">
              <div class="row">
                <div class="col-7">
                  <p class="product_name product_name${product.product_id} fw-bold mt-2 ms-1">${product.product_name}</p>
                </div>
                <div class="offset-2 col-3 mt-2 py-2 d-flex gap-2">
                <i class="fas fa-cart-shopping features-description product_icon addtocart" id="${product.product_id}" style="font-size:.9rem;"></i>
                <i class="far fa-heart features-description product_icon" style="font-size:.9rem;"></i>
                <i class="far fa-eye features-description product_icon" style="font-size:.9rem;"></i>
                </div>
              </div>
              <div class="row">
                <div class="col-7">
                  <span class="features-description ms-1 price${product.product_id}">Price : &#8369; ${smallprice}</span>
                  <input type="hidden" class="small${product.product_id}" value="${smallprice}">
                  <input type="hidden" class="medium${product.product_id}" value="${mediumprice}">
                  <input type="hidden" class="large${product.product_id}" value="${largeprice}">

                </div>
                <div class="offset-2 col-3">
                  <input type="number" class="form-control quantity${product.product_id}" value="1" />
                  
                </div>
              </div>
              <div class="row">
              <button type="button" class="buttonhover text-white mt-3 py-1 rounded-2 primary-btn" id="${product.product_id}">Buy Now!</button>
              </div>
            </div>
          </div>
        </div>`;
      }
      $("#product_container").html(rows);

      $('.addtocart').on('click',function(){
        var cart_id = $(this).attr('id')
        console.log(cart_id)
        var choosenpicture = $('.product_picture'+cart_id).attr('id');
        var chosen_product_name = $('.product_name'+cart_id).text();
        var choosen_small_price = $('.small'+cart_id).val()
        var choosen_medium_price = $('.medium'+cart_id).val()
        var choosen_large_price = $('.large'+cart_id).val()
        var chosenquantity = $('.quantity'+cart_id).val()
        var chosensubprice = choosen_small_price*chosenquantity
        var sizeprice;
        var product_size;
        product_size = 'S';
        sizeprice = choosen_small_price
        $('#size_modal').modal('show')
        let modal = "";

        modal += `<div class="modal-body">
        <div class="row">
          <div class="col-5 primarytext">
          <img src="../product_image/${choosenpicture}" class="border-0 product_picture" alt="">
          </div>
          <div class="col-7">
            <span class="features-description fw-bold">${chosen_product_name}</span><br>
            <small class="features-description fw-bold">Price :  &#8369; <span class="chosenprice">${sizeprice}</span></small>  <br>
            <small class="features-description fw-bold">Total Sub Price :  &#8369; <span class="totalchosenprice me-5">${chosensubprice}</span>  Quantity : &times; ${chosenquantity}</small>  <br>
            <div class="row mt-2">
              <nav>
                <ul class="pagination pagination-lg">
                  <li class="page-item page-link linksize active" id="${choosen_small_price}">S</li>
                  <li class="page-item page-link linksize" id="${choosen_medium_price}">M</li>
                  <li class="page-item page-link linksize" id="${choosen_large_price}">L</li>
                </ul>
              </nav>
            </div>
            <small class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet non ullam voluptate ipsa alias molestiae quasi earum modi deserunt! Qui.</small>
            <div class="row mt-4">
              <div class="offset-5 col-7">
                <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100" id="addcart"> <i class="fas fa-cart-plus"></i> Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
        </div>`;
        $("#size_content").html(modal);
        $('.linksize').on('click',function(){
          $('.linksize').removeClass('active')
          $(this).addClass('active')
          sizeprice = $(this).attr('id')
          $('.chosenprice').text(sizeprice)
          $('.totalchosenprice').text(sizeprice*chosenquantity)
          product_size = $(this).text()
        })

        $('#addcart').on('click',function(){
          console.log(chosen_product_name)
          console.log(choosenpicture)
          console.log(sizeprice)
          console.log(chosenquantity)
          console.log(product_size)

          var totalpayable = sizeprice*chosenquantity

          let addcart = 'addcart'
          $.ajax({
            url:'../database/product_connection.php',
            method:'post',
            data:{
              addcart:addcart,
              chosen_product_name:chosen_product_name,
              sizeprice:sizeprice,
              chosenquantity:chosenquantity,
              totalpayable:totalpayable,
              choosenpicture:choosenpicture,
              product_size:product_size,
            },
            success:function(response){
              if(response == '1'){
                $('#size_modal').modal('hide')
                $('#success_modal').modal('show')
                $('#successmodal').text('Added to Cart')
                setTimeout(
                  function() 
                  {
                    window.location.href = "product.php";
                  }, 1000);
              }
            }
          })
          
        })

      })

      $('.primary-btn').on('click',function(){
        var product_id = $(this).attr('id')
        var choosenpicture = $('.product_picture'+product_id).attr('id');
        var chosen_product_name = $('.product_name'+product_id).text();
        var choosen_small_price = $('.small'+product_id).val()
        var choosen_medium_price = $('.medium'+product_id).val()
        var choosen_large_price = $('.large'+product_id).val()
        var chosenquantity = $('.quantity'+product_id).val()
        var chosensubprice = choosen_small_price*chosenquantity
        var sizeprice;
        var product_size;
        product_size = 'S';
        sizeprice = choosen_small_price
        $('#size_modal').modal('show')
        let modal = "";

        modal += `<div class="modal-body">
        <div class="row">
          <div class="col-5 primarytext">
          <img src="../product_image/${choosenpicture}" class="border-0 product_picture" alt="">
          </div>
          <div class="col-7">
            <span class="features-description fw-bold">${chosen_product_name}</span><br>
            <small class="features-description fw-bold">Price :  &#8369; <span class="chosenprice">${sizeprice}</span></small>  <br>
            <small class="features-description fw-bold">Total Sub Price :  &#8369; <span class="totalchosenprice me-5">${chosensubprice}</span>  Quantity : &times; ${chosenquantity}</small>  <br>
            <div class="row mt-2">
              <nav>
                <ul class="pagination pagination-lg">
                  <li class="page-item page-link linksize active" id="${choosen_small_price}">S</li>
                  <li class="page-item page-link linksize" id="${choosen_medium_price}">M</li>
                  <li class="page-item page-link linksize" id="${choosen_large_price}">L</li>
                </ul>
              </nav>
            </div>
            <small class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet non ullam voluptate ipsa alias molestiae quasi earum modi deserunt! Qui.</small>
            <div class="row mt-4">
              <div class="offset-5 col-7">
                <button type="button" class="buttonhover text-white py-2 rounded-5 px-3 primary-btn mb-2 w-100" id="nextsession"> <i class="fas fa-bag-shopping"></i> Procees to Checkout</button>
              </div>
            </div>
          </div>
        </div>
        </div>`;
        $("#size_content").html(modal);


        $('.linksize').on('click',function(){
          $('.linksize').removeClass('active')
          $(this).addClass('active')
          sizeprice = $(this).attr('id')
          $('.chosenprice').text(sizeprice)
          $('.totalchosenprice').text(sizeprice*chosenquantity)
          product_size = $(this).text()
        })

        $('#nextsession').on('click',function(){
          console.log(chosen_product_name)
          console.log(choosenpicture)
          console.log(sizeprice)
          console.log(chosenquantity)
          console.log(product_size)

          var totalpayable = sizeprice*chosenquantity

          let buynowcheckout = 'buynowcheckout'
          $.ajax({
            url:'../database/product_connection.php',
            method:'post',
            data:{
              buynowcheckout:buynowcheckout,
              chosen_product_name:chosen_product_name,
              sizeprice:sizeprice,
              chosenquantity:chosenquantity,
              totalpayable:totalpayable,
              choosenpicture:choosenpicture,
              product_size:product_size,
            },
            success:function(response){
              if(response == '1'){
                window.location.href = "checkout.php";
              }
            }
          })
          
        })
      })
    }
    }
    })
})