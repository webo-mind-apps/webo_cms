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
         <!-- content wrapper -->
         <div class="content-wrapper">
            <div class="page-header page-header-light">
               <div class="page-header-content header-elements-md-inline">
                  <div class="page-title d-flex">
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Client Master</span></h4>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
               </div>
            </div>
            <?php
				if ($this->session->flashdata('success')) {
				?>
					<div class="alert bg-success alert-styled-left" style="margin: 0 20px;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<span class="text-semibold"><?php echo $this->session->flashdata('success'); ?></span>
					</div>
				<?php
				}
			?>
            <!-- Content area -->
            <div class="content">
               <!-- Vertical form options -->
               <div class="row">
                  <div class="col-md-6">
                     <!-- card-->
                     <div class="card">
                        <div class="card-header header-elements-inline">
                           <h5 class="card-title">Client Master</h5>
                           <div class="header-elements">
                              <div class="list-icons">
                                 <a class="list-icons-item" data-action="collapse"></a>
                                 <a class="list-icons-item" data-action="reload"></a>
                                 <a class="list-icons-item" data-action="remove"></a>
                              </div>
                           </div>
                        </div>
                        <form method="post" action="<?php echo base_url(); ?>client-master/save-client-master" >
                           <div class="card-body">
                                <div class="form-group">
                                 <label>Company Name</label>
                                 <div class="input-group">
                                    <input type="text" id="company-name" class="form-control"  name="company_name" minlength="3" maxlength="100" required>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <label>Client Name</label>
                                 <div class="input-group">
                                    <input type="text" id="client-name" class="form-control" name="client_name" minlength="3" maxlength="25" onkeypress="return isalpha();" required>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <label>Phone No.</label>
                                 <div class="input-group">
                                    <input type="text" id="phone" class="form-control" name="phone" maxlength="10" minlength="10" onkeypress="return isNumber();" onfocusout="phone_length();" required>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <label>Email Id</label>
                                 <div class="input-group">
                                    <input type="email" id="email" class="form-control"  name="email"  
                                    onfocusout="email_validation();" required>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <label>Website Name</label>
                                 <div class="input-group" id="append-web">
                                    <input type="text" class="form-control website-name"  name="website_name[]" maxlength="100" required>
                                 </div>
                                 <div id="add-new" style="color:blue;text-align:right;margin-top:5px;"><i class="fas fa-plus" style="margin-right:5px;"></i>Add new</div>
                                </div>
                                 <button  type="submit" id="insert-button" name="insert_button" class="insert btn btn-primary" >Submit<i class="icon-paperplane ml-2"></i></button>
                        </form>
                        </div>
                     </div>
                     <!-- /card -->
                  </div>
               </div>
			    <!-- /Vertical form options -->
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
         // phone length check
         function phone_length()
        {
           if($("#phone").val().length!=10)
           {
            $("#phone").val("");
           }
        }
        function email_validation()
        {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
            var email=$("#email").val();
            if(!regex.test(email)) 
            {
                $("#email").val("");
            }
        }
        $(document).ready(function() {
            $('#add-new').css('cursor', 'pointer');
            $("#add-new").click(function(){
                $("#append-web").append('<div class="input-group" style="margin-top:10px;"><input type="text"  class="form-control website-name"  name="website_name[]" maxlength="100" required></div>'); 
            });

        });
     </script>
 </body>

 </html>