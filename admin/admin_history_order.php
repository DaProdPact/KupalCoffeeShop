<?php 
session_start();
$_SESSION['status'];

require('../database/database.php');
require('../partials/header.html');
require('../components/primary_navbar.php');
?>

<div class="row" style="height:100vh;">
  <div class="col-2 dashboardbg">
  <?php require('./sidebar.php'); ?>
  </div>
  <div class="col-10">
  <div class="table container mt-3 mb-0">
        
        <table
          id="myTable"
          class="table table-responsive align-middle bg-transparent table-striped table-hover rounded"
        >
          <caption
            class="caption-top border border-2 border-bottom-0 rounded-top bg-light opacity-100 py-2 ps-2"
          >
          <div class="navbar navbar-primary shadow-0 py-0">
            <div class="container-fluid">
              <p
                class="fw-bold h5 pt-1" style="color: #6c5959;"
                
                > Order History</p
              >
              <div class="d-flex w-auto gap-3">

              </div>
            </div>
          </div>

      
          </caption>

          <caption
            class="caption-top border border-2 border-bottom-0 ps-2 m-0 p-0"
          >
                <div class="row">

                <div class="col-3 offset-9">
                  <div class="form">
                    <input type="text" id="fullname" class="form-control" placeholder="Search"/>
                  </div>
                </div>

                </div>
          </caption>

          <thead class="rounded-1 table-responsive primarybg">
            <tr>
              <th class="fw-bold" style="color:#6c5959;">Customer Name</th>
              <th class="fw-bold" style="color:#6c5959;">Order Picture</th>
              <th class="fw-bold" style="color:#6c5959;">Order Item</th>
              <th class="fw-bold" style="color:#6c5959;">Order Price</th>
              <th class="fw-bold" style="color:#6c5959;">Order Size</th>
              <th class="fw-bold" style="color:#6c5959;">Order Quantity</th>
              <th class="fw-bold" style="color:#6c5959;">Status</th>

      
 
            </tr>
          </thead>
          <tbody id="table_body" class="bg-white">

          </tbody>


       
        </table>


  </div>
  </div>
</div>





<?php
require('../modals/successmodal.php');
require('../modals/message.php');
require('../modals/successmodal.php');
require('../modals/validation.php');
require('../modals/order_detail.php');
require('../modals/logout.php');
require('../partials/footer.html');
?>
<script src="../javascript/admin_order_history.js"></script>

