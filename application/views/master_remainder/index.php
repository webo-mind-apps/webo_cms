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
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Remainder Master</span></h4>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
                  <div class="right text-center ">
                     <button type="button" class="btn btn-labeled btn-labeled-right bg-primary" data-toggle="modal" data-target="#fetchData">Add New <b><i class="fa fa-plus" aria-hidden="true"></i></b></button>
                     <div class="modal fade" role="dialog" id="fetchData">
                        <div class="modal-dialog modal-md">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="content">
                                 <!-- form -->
                                    <form method="post" action="<?php echo base_url(); ?>master-remainder/save-master-remainder" >
                                       <div class="form-group">
                                          <label class="down">Remainder Person Name</label>
                                          <div class="input-group">
                                             <input type="text"  id="remainder-name" class="form-control" name="remainder_name" minlength="3" maxlength="25" onkeypress="return isalpha();" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="down">Phone No.</label>
                                          <div class="input-group">
                                             <input type="text"  id="phone" class="form-control" name="phone" maxlength="10" minlength="10" onkeypress="return isNumber();" onfocusout="phone_length();" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="down">Email Id</label>
                                          <div class="input-group">
                                             <input type="email" id="email" class="form-control"  name="email"  
                                             onfocusout="email_validation();" required>
                                          </div>
                                          <input type="hidden" name="change_id" id="change-id" >
                                       </div>
                                       <button  type="submit" id="button" name="insert_button" class="insert btn btn-primary down" >Submit<i class="icon-paperplane ml-2"></i></button>
                                    </form>
                            <!-- /form -->
                              </div>
                           </div>
                        </div>
                     </div>
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
               <!-- row -->
               <div class="row">
                  <!-- column -->
                  <div class="col-lg-12">
                        <!-- card-->
                        <div class="card">
                           <div class="card-header header-elements-inline">
                              <h5 class="card-title">Remainder Master</h5>
                              <div class="header-elements">
                                 <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                 </div>
                              </div>
                           </div>
                           <!-- card-body -->
                           <!-- <div class="card-body"> -->
                              <table id="remainder_master_d_table" class="table datatable-basic table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Si No</th>
                                       <th>Remainder Name</th>
                                       <th>Phone No.</th>
                                       <th>Email Id</th>
                                       <th class="text-center">Actions</th>
                                    </tr>
                                 </thead>
                              </table>

                           <!-- </div> -->
                           <!-- /card-body -->
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
          // website validation
         function website_validation()
         {
          var regex = /^([wW]{3})+\.(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})$/;
             var website=$("#website-name").val();
             if(!regex.test(website)) 
             {
                 $("#website-name").val("");
             }
         }
     
      function edit_master_remainder(id) {
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>master-remainder/edit-remainder-master",
				dataType: "json",
				data: {
					id: id
				},
				success: function(response) {
               
               $("#remainder-name").val(response.remainder_name);
               $("#phone").val(response.phone);
               $("#email").val(response.email);
               $("#change-id").val(response.id);
               
				},
				error: function(xhr, ajaxOptions, thrownError) {}
			});
		}

      $('#fetchData').on('hidden.bs.modal', function (e) {
         $("#remainder-name").val('');
         $("#phone").val('');
         $("#email").val('');
         $("#change-id").val('');
})

function delete_master_remainder(id) {
         r = confirm("Are you sure to delete ?");
			if (r == true) {
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>master-remainder/delete-remainder-master",
				datatype: "text",
				data: {
					id: id
				},
				success: function(response) {
               location.reload();
				},
				error: function(xhr, ajaxOptions, thrownError) {}
			});
         }
		}
         // DATA TABLES CODE
					var DatatableAdvanced = function() {

						// Basic Datatable examples
						var _componentDatatableAdvanced = function() {
							if (!$().DataTable) {
								console.warn('Warning - datatables.min.js is not loaded.');
								return;
							}

							// Setting datatable defaults
							$.extend($.fn.dataTable.defaults, {
								autoWidth: false,
								columnDefs: [{
									orderable: false,
									width: 100,
									targets: [5]
								}],
								dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
								language: {
									search: '<span>Filter:</span> _INPUT_',
									searchPlaceholder: 'Type to filter...',
									lengthMenu: '<span>Show:</span> _MENU_',
									paginate: {
										'first': 'First',
										'last': 'Last',
										'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
										'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
									}
								}
							});

							var dataTable = $('#remainder_master_d_table').DataTable({
								'processing': true,
								'serverSide': true,
								'order': [],
								'ajax': {
									'url': "<?php echo base_url() . 'master_remainder/get_all_data' ?>",
									'type': 'POST'
								},
								'columnDefs': [{
									"targets": [4],
									"orderable": false,
								}],

							})

							// Datatable 'length' options
							$('.datatable-show-all').DataTable({
								lengthMenu: [
									[10, 25, 50, -1],
									[10, 25, 50, "All"]
								]
							});

							// DOM positioning
							$('.datatable-dom-position').DataTable({
								dom: '<"datatable-header length-left"lp><"datatable-scroll"t><"datatable-footer info-right"fi>',
							});

							// Highlighting rows and columns on mouseover
							var lastIdx = null;
							var table = $('.datatable-highlight').DataTable();

							$('.datatable-highlight tbody').on('mouseover', 'td', function() {
								var colIdx = table.cell(this).index().column;

								if (colIdx !== lastIdx) {
									$(table.cells().nodes()).removeClass('active');
									$(table.column(colIdx).nodes()).addClass('active');
								}
							}).on('mouseleave', function() {
								$(table.cells().nodes()).removeClass('active');
							});

							// Columns rendering
							$('.datatable-columns').dataTable({
								columnDefs: [{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										render: function(data, type, row) {
											return data + ' (' + row[3] + ')';
										},
										targets: 0
									},
									{
										visible: false,
										targets: [3]
									}
								]
							});

						};
						//
						// Return objects assigned to module
						//
						return {
							init: function() {
								_componentDatatableAdvanced();
							}
						}
					}();

					document.addEventListener('DOMContentLoaded', function() {
						DatatableAdvanced.init()
					});
      </script>
   </body>
</html>