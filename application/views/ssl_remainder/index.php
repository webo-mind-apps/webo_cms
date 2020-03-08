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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">&nbsp;SSL Remainder</span></h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('ssl_remainder_added', 'ssl_remainder_added')) {
            ?>
                <div class="alert bg-success alert-styled-left" style="margin: 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="text-semibold">SSL Remainder Added</span>
                </div>
            <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('ssl_remainder_not_added', 'ssl_remainder_not_added')) {
            ?>
                <div class="alert bg-success alert-styled-left" style="margin: 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="text-semibold">SSL Remainder Exist On The Date!..</span>
                </div>
            <?php
            }
            ?>
            <!-- <?php //echo $this->session->flashdata('success'); 
                    ?> -->

            <!-- Content area -->
            <div class="content">
                <!-- row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-md-6">
                        <!-- card-->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">&nbsp;SSL Remainder</h5>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">
                                <form action="<?php echo base_url(); ?>ssl-remainder/insert-ssl-remainder" method="post">
                                    <div class="form-group form-group-feedback form-group-feedback-left" bis_skin_checked="1">
                                        <label>Company<span style="color:red"> *</span> </label>
                                        <select name="company_id_selected" id="call_relavent_websites" class="form-control get_cmp_id" required>
                                            <option value="">Select Company</option>
                                            <?php
                                            for ($i = 0; $i < count($company_names_db); $i++) :
                                                echo '<option  value="' . $company_names_db[$i]['id'] . '">' . $company_names_db[$i]['company_name'] . '</option>';
                                            endfor;
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left" bis_skin_checked="1">
                                        <label>Company Website<span style="color:red"> *</span> </label>
                                        <select name="company_website_selected" id="dynamic_company_websites" class="form-control get_cmp_website" required>
                                            <option value="">Select Website</option>
                                        </select>

                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left" bis_skin_checked="1">
                                        <label>Renewel Method<span style="color:red"> *</span> </label>
                                        <select name="renewel_method_selected" id="renew_method" class="form-control" required>
                                            <option value="">Select Method</option>
                                            <option value="manual">Manual</option>
                                            <option value="auto">Auto</option>
                                        </select>

                                    </div>
                                    <!-- date pickers -->
                                    <div class="">
                                        <div class="input-group renew_inputs_manual">
                                            <input id="update_datepick" type="text" class="form-control" name="manual_update_date" maxlength="6" placeholder="Next Update Date" autocomplete="off" style="display:none" required>
                                            <input id="ren_datepick" style="margin-left:5px;display:none;" type="text" class="form-control" name="manual_renewel_date" maxlength="6" placeholder="Next Renewel Date" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="input-group" id="renew_inputs_auto">
                                            <input id="auto_ren_datepick" style="margin:0 250px 7px 0;display:none;" type="text" class="form-control" name="auto_renewel_date" maxlength="6" placeholder="Next Renewel Date" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <!-- /date pickers -->

                                    <div class="form-group">
                                        <label>Amount<span style="color:red"> *</span> </label>
                                        <div class="input-group">
                                            <input type="text" id="amount" class="form-control" name="amount_selected" maxlength="7" onkeypress="return isNumber();" required>
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </center>

                                </form>
                            </div>
                            <!-- /card-body -->
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /row -->
                <!-- Data Table -->
                <div class="card">
                    <table id="ssl_remainder_d_table" class="table datatable-basic table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>Company Name</th>
                                <th>Company Website</th>
                                <th>Type</th>
                                <th>Update Date</th>
                                <th>Renewel Date</th>
                                <th>Amount Paid</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /Data Table -->


            </div>
            <!-- /content area -->
        </div>
        <!-- /content wrapper -->
    </div>
    <!-- /page content -->


    <script>
        //for delete remainder
        function delete_remainder(id) {
            // alert(id);
            confirm_del = confirm("Are you sure to Delete ?");
            if (confirm_del == true) {
                // $("div#divLoading").addClass('show');
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "ssl-remainder/delete-remainder-fun",
                    // datatype: "text",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        // $('#get_details').empty();
                        // $('#get_details').append(response);
                        // $("div#divLoading").removeClass('show');
                        // $("#ssl_remainder_d_table").DataTable().ajax.reload();
                        alert(response);
                    },
                    // error: function(xhr, ajaxOptions, thrownError) {}
                });
            }
        }
        //for delete remainder

        $(document).ready(function() {
            //Auto Fill Values
            $(".get_cmp_id,.get_cmp_website").change(function() {
                // alert('asdfasd');
                var get_cmp_id = $('.get_cmp_id').val();
                var get_cmp_website = $('.get_cmp_website').val();
                if (get_cmp_id != "" && get_cmp_website != "") {
                    // alert(get_cmp_id);
                    // alert(get_cmp_website);
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "ssl-remainder/auto-fill",
                        dataType: 'json',
                        data: {
                            get_cmp_id: get_cmp_id,
                            get_cmp_website: get_cmp_website
                        },
                        success: function(response) {
                            var option = $('#renew_method').find('option');
                            $('#renew_method').val(response.type);
                            renewelMethod();
                            $("#amount").val(response.amount_paid);
                            if (response.type == 'manual') {
                                $('#update_datepick').val(response.manual_update_date);
                                $('#ren_datepick').val(response.renewel_date);
                                //remove or addd required
                                $('#auto_ren_datepick').removeAttr('required');
                                $('#update_datepick').addAttr('required');
                                $('#ren_datepick').addAttr('required');
                            } else if (response.type == 'auto') {
                                $('#auto_ren_datepick').val(response.renewel_date);

                                //remove or addd required
                                $('#update_datepick').removeAttr('required');
                                $('#ren_datepick').removeAttr('required');
                                $('#auto_ren_datepick').addAttr('required');
                            }


                        }
                    });
                }
            });

            //Auto Fill Values

            //Hide DATE PICKERS
            $("#renew_method").change(function() {
                renewelMethod()
            });

            function renewelMethod() {
                var method = $('#renew_method').val();
                if ("manual" == method) {

                    $("#update_datepick").css('display', 'block');
                    $("#ren_datepick").css('display', 'block');
                    $("#auto_ren_datepick").css('display', 'none');

                } else if ("auto" == method) {

                    $("#update_datepick").css('display', 'none');
                    $("#ren_datepick").css('display', 'none');
                    $("#auto_ren_datepick").css('display', 'block');
                }
            }
            //Hide DATE PICKERS

            //Calling relevant websites based on client name
            $('#call_relavent_websites').change(function() {
                var company_id = $('#call_relavent_websites').val();
                // alert("inside relevant");
                // alert(company_id);

                if (company_id) {
                    jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>" + "ssl-remainder/dispaly-relavent-websites",
                        data: {
                            company_id: company_id
                        },
                        success: function(response) {
                            // alert(response);

                            $("#dynamic_company_websites").empty();
                            $("#dynamic_company_websites").append(response);
                        }
                    });
                }
            });
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

        //DATE pickers
        $("#update_datepick").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            minDate: 0,
            yearRange: '2020:2030',
            onClose: function(selectedDate) {
                $("#ren_datepick").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#ren_datepick").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            minDate: 0,
            yearRange: '2020:2030',
            onClose: function(selectedDate) {
                $("#update_datepick").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#auto_ren_datepick").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
        });
        //DATE pickers

        //ADDING and REMOVING required 
        $('#update_datepick').change(function() {
            $('#auto_ren_datepick').removeAttr('required');
            $('#update_datepick').addAttr('required');
            $('#ren_datepick').addAttr('required');
        });
        $('#ren_datepick').change(function() {
            $('#auto_ren_datepick').removeAttr('required');
            $('#update_datepick').addAttr('required');
            $('#ren_datepick').addAttr('required');
        });
        $('#auto_ren_datepick').change(function() {
            $('#update_datepick').removeAttr('required');
            $('#ren_datepick').removeAttr('required');
            $('#auto_ren_datepick').addAttr('required');
        });
        //ADDING and REMOVING required 
    </script>

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
                        targets: [7]
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

                var dataTable = $('#ssl_remainder_d_table').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'order': [],
                    'ajax': {
                        'url': "<?php echo base_url() . 'ssl_remainder/get_all_data' ?>",
                        'type': 'POST'
                    },
                    'columnDefs': [{
                        "targets": [7],
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