<?php

// echo "<pre>";
// print_r($data);
// exit;
// $ssl_status = $data['ssl_status'];
// echo $ssl_status;
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Webo_cms</title>
   <!-- Global stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/layout.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/components.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/colors.min.css" rel="stylesheet" type="text/css">
   <!-- /global stylesheets -->
   <!-- Core JS files -->
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/main/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
   <!-- /core JS files -->
   <!-- Theme JS files -->
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/assets/js/app.js"></script>
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/demo_pages/datatables_responsive.js"></script>
   <!-- /theme JS files -->
   <!-- fafa-font -->
   <script src="https://kit.fontawesome.com/f64c26b0b8.js" crossorigin="anonymous"></script>
   <style>
      .table_font {
         font-size: 14px;
      }

      .down {
         float: left;
      }

      #divLoading.show {
         display: block;
         position: fixed;
         z-index: 100;
         background-image: url('<?php echo base_url(); ?>admin_assets/3.gif');
         background-color: #666;
         opacity: 0.4;
         background-repeat: no-repeat;
         background-position: center;
         left: 0;
         bottom: 0;
         right: 0;
         top: 0;
      }
   </style>
</head>

<body>
   <!-- Main navbar  -->
   <?php
   $this->load->view('includes/main_navbar');
   ?>
   <!-- /main navbar -->
   <!-- Page content -->
   <div class="page-content">
      <!-- Main sidebar -->
      <?php
      $this->load->view('includes/main_sidebar');
      ?>
      <!-- /main sidebar -->
      <div id="divLoading">
      </div>
      <!-- content wrapper -->
      <div class="content-wrapper">
         <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
               <div class="page-title d-flex">
                  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View SSL reminder
                     </span></h4>
                  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
               </div>
            </div>
         </div>
         <!-- Content area -->
         <div class="content">
            <!-- card -->
            <div class="card">
               <div class="card-header header-elements-inline">
                  <h5 class="card-title">Edit SSL reminder
                  </h5>
                  <div class="header-elements">
                     <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                     </div>
                  </div>
               </div>

               <!-- Card body-->
               <div class="card-body">
                  <!-- form -->
                  <form method="post" action="<?php echo base_url(); ?>ssl-view/update-ssl-view">
                     <input type="hidden" value="<?php echo empty($data['id']) ? '' : $data['id'] ?>" name="view_ssl_rec_id">
                     <input type="hidden" value="<?php echo empty($data['company_id']) ? '' : $data['company_id'] ?>" name="company_id">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Company Name</label>
                              <div class="input-group">
                                 <input type="text" id="company-name" class="form-control" name="company_name" onkeypress="return isalpha();" minlength="3" maxlength="30" value="<?php echo empty($data['company_name']) ? '' : $data['company_name'] ?>" readonly required>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Company Website</label>
                              <div class="input-group">
                                 <input type="text" class="company-website form-control" name="company_website" minlength="8" maxlength="40" value="<?php echo empty($data['company_website']) ? '' : $data['company_website'] ?>" readonly required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label>Update Type<span style="color:red"> *</span> </label>
                              <div class="input-group">
                                 <select onkeypress="return isalpha();" name="ssl_type_selected" id="ssl_status" class="form-control" minlength="4" maxlength="6" required>
                                    <option value="">Select Method</option>
                                    <option <?php echo (($data['type'] == 'manual') ? 'selected' : '') ?> value='manual'>Manual</option>
                                    <option <?php echo (($data['type'] == 'auto') ? 'selected' : '') ?> value='auto'>Auto</option>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="form-group">
                              <label>Status<span style="color:red"> *</span> </label>
                              <div class="input-group">
                                 <select name="ssl_status_selected" id="ssl_status" class="form-control" minlength="10" maxlength="10" required>
                                    <option value="">Select Method</option>
                                    <option <?php echo (($data['ssl_status'] == 1) ? 'selected' : '') ?> value='1'>Active</option>
                                    <option <?php echo (($data['ssl_status'] == 0) ? 'selected' : '') ?> value='0'>Inactive</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Manual Update Date</label>
                              <div class="input-group">
                                 <input type="text" id="type" class="form-control" name="manual_update_date" minlength="10" maxlength="15" value="<?php echo empty($data['manual_update_date']) ? '' : $data['manual_update_date'] ?>" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Renewal Date</label>
                              <div class="input-group">
                                 <input type="text" id="type" class="form-control" name="renewal_update_date" minlength="10" maxlength="15" value="<?php echo empty($data['renewel_date']) ? '' : $data['renewel_date'] ?>" required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Amount Paid</label>
                              <div class="input-group">
                                 <input type="text" id="type" class="form-control" name="amount_paid" maxlength="7" onkeypress="return isNumber();" value="<?php echo empty($data['amount_paid']) ? '' : $data['amount_paid'] ?>" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">GST Amount</label>
                              <div class="input-group">
                                 <input type="text" id="type" class="form-control" name="gst_amount" maxlength="7" onkeypress="return isNumber();" value="<?php echo empty($data['gst_amt']) ? '' : $data['gst_amt'] ?>" required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Net Amount</label>
                              <div class="input-group">
                                 <input type="text" id="type" class="form-control" name="net_amount" maxlength="7" onkeypress="return isNumber();" value="<?php echo empty($data['net_amt']) ? '' : $data['net_amt'] ?>" required>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">Address</label>
                              <div class="input-group">
                                 <textarea name="address" id="address" cols="30" rows="5" class="form-control" required><?php echo empty($data['address']) ? '' : $data['address'] ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label class="down">GST</label>
                              <div class="input-group">
                                 <input type="text" id="gst" class="form-control" name="gst" value="<?php echo empty($data['gst']) ? '' : $data['gst'] ?>" required>
                              </div>
                           </div>
                           <?php
                           $check = empty($data['company_name']) ? '' : $data['company_name'];
                           if ($check == '' || empty($check)) {
                           ?>
                              <div class="website" style="display:block">
                                 <div class="form-group">
                                    <label class="down">Website Name</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control website-name" name="website_name[]" maxlength="100" onfocusout="website_validation();" placeholder="eg:www.google.com" required>
                                    </div>
                                 </div>
                                 <div class="form-group" id="append-web" style="margin-top:10px;"></div>
                                 <div style="color:blue;text-align:right;margin-top:5px;">
                                    <span id="add-new"><i class="fas fa-plus" style="margin-right:3px;"></i>Add new</span>
                                 </div>
                              </div>
                           <?php
                           }
                           ?>
                        </div>
                     </div> -->

                     <button type="submit" id="button" name="update_ssl_reminder_button" class="insert btn btn-primary">Update<i class="icon-paperplane ml-2"></i></button>
                  </form>
                  <!-- /form -->
               </div>
               <!-- /Card body-->
            </div>
            <!-- /card -->
         </div>
         <!-- /content area -->
      </div>
      <!-- /content wrapper -->
   </div>
   <!-- /page content -->

   <script>
      //Alphapet validation
      function isalpha(evt) {
         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode == 32) {
            return true;
         } else if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) || charCode == 13) {
            return false;
         }

      }
      // Numeric validation 
      function isNumber(evt) {
         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
         }
         return true;
      }


      // document ready function
      $(document).ready(function() {
         $('#add-new').css('cursor', 'pointer');
         $('#remove').css('cursor', 'pointer');
         $("#add-new").click(function() {
            $("#append-web").append('<div class="input-group" style="margin-top:15px;"><input type="text" class="form-control website-name"  name="website_name[]" maxlength="100"  required><i class="icon-cross remove" style="margin:10px 0px 3px 3px;color:red;font-size:20px;cursor:pointer"></i></div>');
         });
      });

      $(document).on('click', '.remove', function() {
         var val = $(this).parent().find('input').val();
         if (val == '') {
            $(this).parent().remove()
         }
         return false;
      })

      $(document).on('focusout', '.website-name', function() {

         var regex = /^([wW]{3})+\.(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
         var website = $(this).val();
         if (!regex.test(website)) {
            $(this).val("");
         }
      })
   </script>
</body>

</html>