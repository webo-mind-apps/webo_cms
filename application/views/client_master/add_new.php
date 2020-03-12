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
         .table_font 
         {
         font-size: 14px;
         }
         .down 
         {
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
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Admin Master</span></h4>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
               </div>
            </div>
            <!-- Content area -->
            <div class="content">
               <!-- card -->
               <div class="card">
                  <div class="card-header header-elements-inline">
                     <h5 class="card-title">Add Service Master</h5>
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
                     <form method="post" action="<?php echo base_url(); ?>client-master/save-client-master" >
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Company Name</label>
                                 <div class="input-group">
                                    <input type="text" id="company-name" class="form-control"  name="company_name" minlength="3" maxlength="100" value="<?php echo empty($data['company_name'])?'':$data['company_name'] ?>" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Client Name</label>
                                 <div class="input-group">
                                    <input type="text" id="client-name" class="form-control" name="client_name" minlength="3" maxlength="25" onkeypress="return isalpha();" value="<?php echo empty($data['client_name'])?'':$data['client_name'] ?>" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Phone No.</label>
                                 <div class="input-group">
                                    <input type="text" id="phone" class="form-control phone" name="phone" onkeypress="return isNumber();" value="<?php echo empty($data['phone'])?'':$data['phone'] ?>"  required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Alter Phone No.</label>
                                 <div class="input-group">
                                    <input type="text" id="alt-phone" class="form-control phone" name="alt_phone"  onkeypress="return isNumber();"  value="<?php echo empty($data['alt_phone'])?'':$data['alt_phone'] ?>" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Email Id</label>
                                 <div class="input-group">
                                    <input type="email" id="email" class="form-control email"  name="email" value="<?php echo empty($data['email'])?'':$data['email'] ?>" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Alter Email Id</label>
                                 <div class="input-group">
                                    <input type="email" id="alt-email" class="form-control email"  name="alt_email" value="<?php echo empty($data['alt_email'])?'':$data['alt_email'] ?>" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">Address</label>
                                 <div class="input-group">
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" 
                                       required><?php echo empty($data['address'])?'':$data['address'] ?></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="down">GST</label>
                                 <div class="input-group">
                                    <input type="text" id="gst" class="form-control"  name="gst" value="<?php echo empty($data['gst'])?'':$data['gst'] ?>"  required>
                                 </div>
                              </div>
                              <?php 
                                 $check=empty($data['company_name'])?'':$data['company_name'];
                                 if($check =='' || empty($check))
                                 {
                                     ?>
                              <div class="website" style="display:block">
                                 <div class="form-group">
                                    <label class="down">Website Name</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control website-name"  name="website_name[]" maxlength="100" onfocusout="website_validation();" placeholder="eg:www.google.com" required>
                                    </div>
                                 </div>
                                 <div class="form-group" id="append-web" style="margin-top:10px;"></div>
                                 <div  style="color:blue;text-align:right;margin-top:5px;">
                                    <span id="add-new"><i class="fas fa-plus" style="margin-right:3px;"></i>Add new</span>
                                 </div>
                              </div>
                              <?php
                                 }
                                 ?>
                           </div>
                        </div>
                        <input type="hidden" value="<?php echo empty($data['id'])?'':$data['id'] ?>" name="client_id">
                        <button  type="submit" id="button" name="insert_button" class="insert btn btn-primary" >Submit<i class="icon-paperplane ml-2"></i></button>
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
         function isalpha(evt) 
         {
             evt = (evt) ? evt : window.event;
             var charCode = (evt.which) ? evt.which : evt.keyCode;
             if (charCode == 32) {return true;} 
             else if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) || charCode == 13) {return false;}
         
         }
         // Numeric validation 
         function isNumber(evt)
         {
             evt = (evt) ? evt : window.event;
             var charCode = (evt.which) ? evt.which : evt.keyCode;
             if (charCode > 31 && (charCode < 48 || charCode > 57)) {return false;}
             return true;
         }
         $(document).on('focusout', '.email', function () { 
              // website validation
         
              var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
         
         
             var email=$(this).val();
             if(!regex.test(email)) 
             {
                 $(this).val("");
             }
             if(!regex.test(email1)) 
             {
                 $(this).val("");
             }
         })
         
         // document ready function
         $(document).ready(function() {
             $('#add-new').css('cursor', 'pointer');
             $('#remove').css('cursor', 'pointer');
             $("#add-new").click(function(){
                 $("#append-web").append('<div class="input-group" style="margin-top:15px;"><input type="text" class="form-control website-name"  name="website_name[]" maxlength="100"  required><i class="icon-cross remove" style="margin:10px 0px 3px 3px;color:red;font-size:20px;cursor:pointer"></i></div>'); 
             });
            });
         
             $(document).on('click', '.remove', function () { 
              var val = $(this).parent().find('input').val();
              if(val == ''){
                  $(this).parent().remove()
              }
               return false;
         })
         
         $(document).on('focusout', '.website-name', function () { 
            
          var regex = /^([wW]{3})+\.(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
             var website=$(this).val();
             if(!regex.test(website)) 
             {
                 $(this).val("");
             }
         })

      </script>
   </body>
</html>