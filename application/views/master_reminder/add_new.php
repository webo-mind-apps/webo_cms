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
               <!-- row -->
               <div class="row">
                  <!-- column -->
                  <div class="col-lg-6">
                     <!-- card-->
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
                         <!-- card body-->
                        <div class="card-body">
                           <!-- form -->
                           <form method="post" action="<?php echo base_url(); ?>master-reminder/save-master-reminder" >
                              <div class="form-group">
                                 <label class="down">Name<span style="color:red"> *</span> </label>
                                 <div class="input-group">
                                    <input type="text"  id="reminder-name" class="form-control" name="reminder_name" minlength="3" maxlength="25" onkeypress="return isalpha();" value="<?php echo empty($data['reminder_name'])?'':$data['reminder_name'] ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="down">Email Id<span style="color:red"> *</span> </label>
                                 <div class="input-group">
                                    <input type="email" id="email" class="form-control"  name="email"  
                                       onfocusout="email_validation();" value="<?php echo empty($data['email'])?'':$data['email'] ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="down">Phone No.<span style="color:red"> *</span> </label>
                                 <div class="input-group">
                                    <input type="text"  id="phone" class="form-control" name="phone" onkeypress="return isNumber();" value="<?php echo empty($data['phone'])?'':$data['phone'] ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="down">Password<span style="color:red"> *</span><br>(password should have combination of capital letter, number, special charecter) </label>
                                 <div class="input-group">
                                    <input type="password"  id="pass" class="form-control pass" name="pass" value="<?php echo empty($data['password'])?'':'Pass@123' ?>"   required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="down">Conform Password<span style="color:red"> *</span> </label>
                                 <div class="input-group">
                                    <input type="password"  id="cpass" class="form-control pass" name="cpass" value="<?php echo empty($data['password'])?'': 'Pass@123' ?>"  required>
                                 </div>
                              </div>
                              <input type="hidden" name="change_id" id="change-id" value="<?php echo empty($data['id'])?'':$data['id'] ?>">  
                              <button  type="submit" id="button" name="insert_button" class="insert btn btn-primary down" >Submit<i class="icon-paperplane ml-2"></i></button>
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
            if($("#phone1").val().length!=10)
            {
             $("#phone1").val("");
            }
         }
         // email validation
         function email_validation()
         {
             var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
             var email=$("#email").val();
             var email1=$("#email1").val();
             if(!regex.test(email)) 
             {
                 $("#email").val("");
             }
             if(!regex.test(email1)) 
             {
                 $("#email1").val("");
             }
         }
         $(document).on('focusout', '.pass', function () {
         var number_count=0;
         var small_letter_count=0;
         var capital_letter_count=0;
         var special_count=0;
         var i=0;
         var number=/[0-9]/;
         var small_letter=/[a-z]/;
         var capital_letter=/[A-z]/;
         var special=/[_~\-!@#\$%\^&\*\(\)]/;
         
         var s=$(this).val();
         var s_len=s.length;
         for(i;i<s_len;i++)
         {
          if(number.test(s[i]))
          {
           number_count++;
          }
         
          else if(small_letter.test(s[i]))
          {
            small_letter_count++;
          }
            else if(capital_letter.test(s[i]))
          {
            capital_letter_count++;
          }
          
          else if(special.test(s[i]))
          {
           special_count++;
          }
         
         }
         if(s_len<8 || number_count== 0 || small_letter_count==0 || capital_letter_count==0 || special_count==0) 
         {
            $(this).val('');
         }
         
         });
         if($("#reminder-name").val() != "")
         {
         $("#pass").removeAttr("required");
         $("#cpass").removeAttr("required");
         }
      </script>
   </body>
</html>