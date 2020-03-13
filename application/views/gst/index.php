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
      <!-- /core JS files -->
      <!-- Theme JS files -->
       
      <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>
      <script src="<?php echo base_url(); ?>admin_assets/assets/js/app.js"></script>
       
      <!-- /theme JS files -->
      <!-- fafa-font -->
      <script src="https://kit.fontawesome.com/f64c26b0b8.js" crossorigin="anonymous"></script>
      <style> 
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
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">GST Master</span></h4>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
               </div>
            </div>
            <?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="alert bg-success alert-styled-left" style="margin: 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="text-semibold"><?php echo $this->session->flashdata('success');?></span>
                </div>
            <?php
            }
            ?>
            <!-- Content area -->
            <div class="content">
               <!-- row -->
               <div class="row">
                  <!-- column -->
                  <div class="col-lg-6">
                     <!-- card-->
                   
                     <div class="card">
                        <div class="card-header header-elements-inline">
                           <h5 class="card-title">GST Master</h5>
                           <div class="header-elements">
                              <div class="list-icons">
                                 <a class="list-icons-item" data-action="collapse"></a>
                                 <a class="list-icons-item" data-action="reload"></a>
                                 <a class="list-icons-item" data-action="remove"></a>
                              </div>
                           </div>
                        </div>
                         <!-- card body-->
                        <div class="card-body">
                           <!-- form -->
                           <form method="post" action="<?php echo base_url(); ?>gst-per/per-insert" >
                              <div class="form-group">
                                 <label class="down">GST %<span style="color:red"> *</span> </label>
                                 <div class="input-group">
                                    <input type="text"  id="gst-per" class="form-control" name="gst_per" minlength="1" maxlength="5" required>
                                 </div>
                              </div> 
                              <button  type="submit" id="button" name="insert_per" class="insert btn btn-primary down" >Submit<i class="icon-paperplane ml-2"></i></button>
                           </form>
                           <!-- /form -->
                        </div>
                         <!-- /card body-->
                     </div>
                     <!-- /card -->
                  </div>
                  <!-- /column -->
               </div>
               <!-- /row -->
            </div>
            <!-- /content area -->
         </div>
         <!-- /content wrapper -->
      </div>
      <!-- /page content -->
       
   </body>
</html>