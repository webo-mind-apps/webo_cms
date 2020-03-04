 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Doctor_Tutorial_App</title>

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
     </style>

 </head>

 <body>

     <!-- Main navbar ------------------------------------------------------------------------------------------------------>
     <?php
        $this->load->view('includes/main_navbar');
        ?>
     <!-- /main navbar -->


     <!-- Page content -->
     <div class="page-content">

         <!-- Main sidebar -------------------------------------------------------------------------------------------------------->
         <?php
            $this->load->view('includes/main_sidebar');
            ?>
         <!-- /main sidebar -->

         <!-- Main content -->
         <div class="content-wrapper">

             <!-- Page header -->
             <div class="page-header page-header-light">
                 <div class="page-header-content header-elements-md-inline">
                     <div class="page-title d-flex">
                         <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Paid</span> Customers</h4>
                     </div>
                 </div>
             </div>
             <!-- /page header -->


             <!-- Content area -->
             <div class="content">



             </div>
             <!-- /content area -->

         </div>
         <!-- /main content -->


     </div>
     <!-- /page content -->

 </body>

 </html>