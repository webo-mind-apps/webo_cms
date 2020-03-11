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
      .mod-table td
      {
         padding:15px 20px 15px 20px;
      }
      .danger{color:red;}
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
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Client Master</span></h4>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
                  <div class="right text-center ">
                  <a href="<?php echo base_url(); ?>client-master/add-new">
                     <button type="button" class="btn btn-labeled btn-labeled-right bg-primary" data-toggle="modal" data-target="#fetchData">Add New <b><i class="fa fa-plus" aria-hidden="true"></i></b></button>
                  </a>
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
                              <h5 class="card-title">Client Master</h5>
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
                              <table id="client_master_d_table" class="table datatable-basic table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Si No</th>
                                       <th>Company Name</th>
                                       <th>Client Name</th>
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
      <!-- content area -->
      <div id="modal_theme_primary" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content" id="client_details">

						</div>
					</div>
				</div>
      <script>
         
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

							var dataTable = $('#client_master_d_table').DataTable({
								'processing': true,
								'serverSide': true,
								'order': [],
								'ajax': {
									'url': "<?php echo base_url() . 'client_master/get_all_data' ?>",
									'type': 'POST'
								},
								'columnDefs': [{
									"targets": [5],
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
               
               function client_master_delete(id) {
                    r = confirm("Are you sure to delete ?");
                        if (r == true) {
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>client_master/client_master_delete",
                            datatype: "text",
                            data: {
                                id: id
                            },
                            success: function(response) {
                        
                        $("#client_master_d_table").DataTable().ajax.reload();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {}
                        });
                    }
                    }

                    function client_master_view_details(id) {
                        $("div#divLoading").addClass('show');
                        jQuery.ajax({
                           type: "POST",
                           url: "<?php echo base_url(); ?>" + "client_master/client_master_view_details",
                           datatype: "text",
                           data: {
                              id: id
                           },
                           success: function(response) {
                              $('#client_details').empty();
                              $('#client_details').append(response);
                              $("div#divLoading").removeClass('show');
                              $('#modal_theme_primary').modal('show');
                           },
                           error: function(xhr, ajaxOptions, thrownError) {}
                        });
                     }

                  $(document).on('change', '.checkbox', function () { 
         r = confirm("Are you sure to change the status ?");
			if (r == true) {
           var id= $(this).attr("id");
           var change_id=$(this).val();
          
           if(change_id==1)
           {
              var change_val=0;
              $(this).parent().find('span').removeClass('danger');
              $(this).val(0);
            }
            else{
               var change_val=1;
               $(this).parent().find('span').addClass('danger');
              $(this).val(1);

                 }
          
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Client_master/website_status_change",
				datatype: "text",
				data: {
               id:id,
					change_val: change_val
				},
				success: function(response) {
               
              
				},
				error: function(xhr, ajaxOptions, thrownError) {}
			});
         }
		})  


      </script>
   </body>
</html>