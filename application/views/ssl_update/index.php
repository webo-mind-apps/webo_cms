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
   <!-- ---css datepicker -->
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/jquery-ui.min.js"></script>
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>admin_assets/assets/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css">
   <script src="<?php echo base_url(); ?>admin_assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>
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

      .ui-datepicker-prev {
         position: absolute;
         top: 50% !important;
         margin-top: -.9375rem;
         line-height: 1;
         color: #333;
         padding: .4375rem;
         cursor: pointer;
         border-radius: .1875rem;
      }

      .ui-datepicker-next {
         position: absolute;
         top: 50% !important;
         margin-top: -.9375rem;
         line-height: 1;
         color: #333;
         padding: .4375rem;
         cursor: pointer;
         border-radius: .1875rem;
      }

      .danger {
         background: #f44336 !important;
         color: white;
      }

      .danger1 {
         background: #ffff00  !important;
      }

      select {
         outline: 0;
         width: 10rem;
         padding: .4375rem .875rem;
         padding-right: 2rem;
         font-size: .8125rem;
         line-height: 1.5385;
         color: #333;
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: .1875rem;
      }

      ul.detail-list {
            list-style: none;
            column-count: 3;
            width: 100%;
         }
      p.list-title {
            margin-bottom: 5px;
            color: #000;
            font-weight: 500;
         }

         ul.detail-list li {
            margin-bottom: 17px;
         }

         ul.detail-list li p:nth-child(2) {
            color: #575757;
            font-size:16px;
         }
         .details-heading
         {
            margin-bottom: 25px;
            background-color:blue;
            height:60px;
            color:white;
         }
         .paid-table
         {
            margin:0px 0px 20px 0px;
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
                  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View SSL Update</span></h4>
                  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
               </div>

            </div>
         </div>
         <?php
         if ($this->session->flashdata('success')) {
         ?>
            <div class="alert bg-success alert-styled-left" style="margin: 0 20px;">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <span class="text-semibold" id="success-msg"><?php echo $this->session->flashdata('success'); ?></span>
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
                        <h5 class="card-title">View SSL Update</h5>
                        <div class="header-elements">
                           <div class="list-icons">
                              <a class="list-icons-item" data-action="collapse"></a>
                              <a class="list-icons-item" data-action="reload"></a>
                              <a class="list-icons-item" data-action="remove"></a>
                           </div>
                        </div>
                     </div>
                     <!-- card-body -->
                     <div align="right" style="margin-right:20px">
                        <label for="month"><span>Select Month: </span><select class name="month" id="month" aria-controls="ssl_view_d_table">
                              <option value="">Select Month</option>
                              <option value="01">January</option>
                              <option value="02">February</option>
                              <option value="03">March</option>
                              <option value="04">April</option>
                              <option value="05">May</option>
                              <option value="06">June</option>
                              <option value="07">July</option>
                              <option value="08">August</option>
                              <option value="09">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select></label></div>
                     <!-- <div class="card-body"> -->
                     <table id="ssl_view_d_table" class="table datatable-basic table-bordered table-striped table-hover">
                        <thead>

                           <tr>
                              <th>SI NO</th>
                              <th>Company Name</th>
                              <th>Website</th>
                              <th>Amount</th>
                              <th>Renewal Date</th>
                              <th>Update Date</th>
                              <th>Update</th>
                              <th>Actions</th>
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
    <!-- view details code -->
    <div id="modal_theme_primary" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content" id="ssl_view_details">
         </div>
      </div>
   </div>
   <!-- view details code -->

   <script>
      //DATA TABLES CODE

      var output = $.datepicker.formatDate('dd-mm-yy', new Date())

      var DatatableAdvanced = function(month) {

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

            var month = '';
           
            var dataTable = $('#ssl_view_d_table').DataTable({
               'processing': true,
               'serverSide': true,
               lengthMenu: [
                  [25, 50, 75,100, -1],
                  [25, 50, 75,100, "All"]
               ],
               'order': [],
               'ajax': {
                  'url': "<?php echo base_url() ?>" + "ssl_update/get_all_data?month=" + $('#month').val(),
                  'type': 'POST'
               },
               'columnDefs': [{
                  "targets": [6],
                  "orderable": false,
               }],
               createdRow: function(row, data, index) {
                    var today_date = output.split("-");
                    var db_date = data['5'].split("-");
                    if(db_date[2]<today_date[2])
                    {
                        $(row).addClass('danger');
                    }
                    if(db_date[2]==today_date[2] && db_date[1]<today_date[1])
                    {
                        $(row).addClass('danger');
                    }
                    if(db_date[2]==today_date[2] && db_date[1]==today_date[1] && db_date[0]<today_date[0])
                    {
                        $(row).addClass('danger');
                    }
                    if(db_date[2]==today_date[2] && db_date[1]==today_date[1] && db_date[0]==today_date[0])
                    {
                        $(row).addClass('danger1');
                    }
               }
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
               appendFilter();
            }
         }

      }();

      document.addEventListener('DOMContentLoaded', function() {
         DatatableAdvanced.init()
      });


      // Numeric validation 
      function isNumber(evt) {
         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
         }
         return true;
      }

    //   function appendFilter() {
    //      $('#ssl_view_d_table_filter').append('<label for="month"><span></span><select class name="month" id="month" aria-controls="ssl_view_d_table"><option value="">Select Month</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November/option><option value="12">December</option></select></label>');
    //   }

      $('#month').change(function() {

         $('#ssl_view_d_table').DataTable().destroy();
         DatatableAdvanced.init();
      });


      function ssl_update(id) {
            // alert(id);
            r = confirm("Are you sure to update?");
            if (r == true) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>ssl_update/ssl_update",
                    datatype: "text",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $("#ssl_view_d_table").DataTable().ajax.reload();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {}
                });
            }
        }

        function ssl_master_delete(id) {
              r = confirm("Are you sure to delete ?");
                  if (r == true) {
                  jQuery.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>ssl_view/ssl_master_delete",
                      datatype: "text",
                      data: {
                          id: id
                      },
                      success: function(response) {
                  
                  $("#ssl_view_d_table").DataTable().ajax.reload();
                      },
                      error: function(xhr, ajaxOptions, thrownError) {}
                  });
              }
              }
               //View Details Code----------------------
      function view_ssl_details(id) {
         $("div#divLoading").addClass('show');
         jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "ssl_view/view_ssl_details",
            datatype: "text",
            data: {
               id: id
            },
            success: function(response) {
               $('#ssl_view_details').empty();
               $('#ssl_view_details').append(response);
               $("div#divLoading").removeClass('show');
               $('#modal_theme_primary').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {}
         });
      }
      //View Details Code----------------------
      //   $(document).on('change', '.checkbox', function () { 
      //             r = confirm("Are you sure to change the status ?");
      //             if (r == true) {
      //             var id= $(this).attr("id");
      //             var change_id=$(this).val();
                  
      //             if(change_id==1)
      //             {
      //                var change_val=0;
      //                $(this).val(0);
      //                }
      //                else{
      //                   var change_val=1;
      //                $(this).val(1);
                  
      //                   }
                  
      //             jQuery.ajax({
      //             type: "POST",
      //             url: "<?php echo base_url(); ?>ssl_view/ssl_status_change",
      //             datatype: "text",
      //             data: {
      //                   id:id,
      //             change_val: change_val
      //             },
      //             success: function(response) {
                        
                     
      //             },
      //             error: function(xhr, ajaxOptions, thrownError) {}
      //             });
      //             }
      //             else if (r == false){
            
      //                   if($(this).val()==0)
      //                   {
      //                      this.setAttribute("checked", "checked");
      //                      this.checked = true;
      //                   }
      //                   else if(change_id=$(this).val()==1){
      //                      this.setAttribute("checked", ""); // For IE
      //                      this.removeAttribute("checked"); // For other browsers
      //                      this.checked = false;
      //                }
      //                }
      //             }) 


   </script>
</body>

</html>