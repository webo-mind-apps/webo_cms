<?php
// echo "<pre>";
// // echo "ksdaf";
// print_r($data);
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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">&nbsp;SSL reminder</span></h4>
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
                <!-- row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-md-12">
                        <!-- card-->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">&nbsp;SSL reminder</h5>
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
                                <form action="<?php echo base_url(); ?>ssl-reminder/insert-ssl-reminder" method="post">
                                 <!-- row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                                    <div class="form-group " bis_skin_checked="1">
                                        <label>Company<span style="color:red"> *</span> </label>
                                        <select name="company_id_selected" id="call_relavent_websites" class="form-control get_cmp_id" required>

                                            <?php
                                            if (!empty($data['company_name'])) {
                                                echo '<option  value="' . $data['company_id'] . '">' . $data['company_name'] . '</option>';
                                            } else {
                                                echo '<option value="">Select Company</option>';
                                                for ($i = 0; $i < count($company_names_db); $i++) :
                                                    echo '<option  value="' . $company_names_db[$i]['id'] . '">' . $company_names_db[$i]['company_name'] . '</option>';
                                                endfor;
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    </div>

                                    <div class="col-lg-6">
                                    <div class="form-group " bis_skin_checked="1">
                                        <label>Company Website<span style="color:red"> *</span> </label>
                                        <select name="company_website_selected" id="dynamic_company_websites" class="form-control get_cmp_website" required>

                                            <?php
                                            if (!empty($data['company_website'])) {
                                                echo '<option  value="' . $data['company_website'] . '">' . $data['company_website'] . '</option>';
                                            } else {
                                                echo '<option value="">Select Website</option>';
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    </div>
                                    </div>
                    <!-- row end -->
                    
                    <!-- row -->
                    <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                                    <div class="form-group " bis_skin_checked="1" style="margin-bottom:7px;">
                                        <label>Renewal Method<span style="color:red"> *</span> </label>
                                        <select name="renewel_method_selected" id="renew_method" class="form-control" required>
                                            <option value="">Select Method</option>
                                            <?php
                                            if (!empty($data['type'])) { ?>
                                                <option <?php echo (($data['type'] == 'manual') ? 'selected' : '') ?> value='manual'>Manual</option>
                                                <option <?php echo (($data['type'] == 'auto') ? 'selected' : '') ?> value='auto'>Auto</option>
                                            <?php } else { ?>
                                                <option value="manual">Manual</option>
                                                <option value="auto">Auto</option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                    </div>

                                   

                                    <!-- Active and Inactive -->
                                    <div class="col-lg-6">
                                    <div class="form-group " bis_skin_checked="1" >
                                        <label>Status<span style="color:red"> *</span> </label>
                                        <select name="ssl_status_selected" id="ssl_status" class="form-control" required>
                                            <option value="">Select Method</option>

                                            <?php if (!empty($data['type'])) { ?>
                                                <option <?php echo (($data['ssl_status'] == 0) ? 'selected' : '') ?> value='0'>Active</option>
                                                <option <?php echo (($data['ssl_status'] == 1) ? 'selected' : '') ?> value='1'>Inactive</option>
                                            <?php } else { ?>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    </div>

                                    <!-- Active and Inactive -->
                                    </div>

                        <!-- date pickers -->
                            <!-- row -->
                                <div class="row" >
                                    <!-- column -->
                                    <div class="col-lg-12">
                                     
                                        <label class="hide_manual_label" style="display:none;float:left;">Update Date<span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <label class="hide_manual_label" style="display:none;margin-left:44%; float:left;">Renewal Date<span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <div class="input-group renew_inputs_manual">
                                        <div class="col-lg-6" style="padding:0">
                                            <input id="update_datepick" type="text" class="form-control" name="manual_update_date" maxlength="6" placeholder="Next Update Date" value="<?php echo empty($data['manual_update_date']) ? '' : date("d-m-Y", strtotime($data['manual_update_date'])) ?>" autocomplete="off" style="margin-bottom:10px;width:98.4%;display:none" required>
                                            </div>
                                            <div class="col-lg-6" >
                                            <input id="ren_datepick" style="margin-bottom:20px;width:101.3%;display:none;" type="text" class="form-control" name="manual_renewel_date" maxlength="6" value="<?php echo empty($data['renewel_date']) ? '' : date("d-m-Y", strtotime($data['renewel_date'])) ?>" placeholder="Next Renewel Date" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" >
                                        <label class="hide_auto_label" style="display:none;float:left;">Renewal Date<span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <div class="input-group" id="renew_inputs_auto">
                                            <input id="auto_ren_datepick" style="margin-bottom:20px;" type="text" class="form-control" name="auto_renewel_date" value="<?php echo empty($data['renewel_date']) ? '' :date("d-m-Y", strtotime($data['renewel_date']))  ?>" maxlength="6" placeholder="Next Renewel Date" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /date pickers --> 

                                    <div class="form-group" >
                                        <label>Amount<span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <label style="margin-left:46%;">GST @ <?php echo $gst_per_db->gst_per ?> <span id="gst-d"></span><span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <label style="margin-left:19%;">Net Amount<span style="color:red;padding-top:-15px;"> *</span> </label>
                                        <div class="input-group">
                                            <input type="text" id="amount" class="form-control" name="amount_selected" value="<?php echo empty($data['amount_paid']) ? "" : $data['amount_paid'] ?>" onkeypress="return isNumber();" maxlength="6" style="width:50.5%;text-align:right;" autocomplete="off" required>

                                            <input type="text" class="form-control gst_amt_input" name="gst_amt_selected" value="<?php echo empty($data['gst_amt']) ? 0 : $data['gst_amt'] ?>" onkeypress="return isNumber();" style="text-align:right;width:24%;background-color:#efeded;" autocomplete="off">

                                            <input type="text" class="form-control gst_net_amt_input" name="net_amt_selected" value="<?php echo empty($data['net_amt']) ? 0 : $data['net_amt'] ?>" onkeypress="return isNumber();" style="text-align:right;width:24%;background-color:#efeded;" autocomplete="off">
                                            <!-- border-left:none; -->
                                        </div>
                                    </div>
                                   
                                    <input type="hidden" id="gst-per-hidden" name="gst_per_hidden" value="<?php echo $gst_per_db->gst_per ?>">

                                    <button type="submit" id="button" name="insert_button" class="insert btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>

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
                    <table id="ssl_reminder_d_table" class="table datatable-basic table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Si No</th>
                                <th>Company Name</th>
                                <th>Company Website</th>
                                <th>Type</th>
                                <th>Renewal Date</th>
                                <th>Amount Paid</th>
                                <th>Paid Date</th>
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
    <!-- view details code -->
    <div id="modal_theme_primary" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="ssl_view_details">
            </div>
        </div>
    </div>
    <!-- view details code -->

    <script>
        //For delete reminder------------------------------------------------------
        function delete_reminder(id) {
            // alert(id);
            r = confirm("Are you sure to delete ?");
            if (r == true) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>ssl-reminder/delete-reminder-fun",
                    datatype: "text",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $("#ssl_reminder_d_table").DataTable().ajax.reload();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {}
                });
            }
        }
        //for delete reminder------------------------------------------------------

        $(document).ready(function() {
            
            
            //------------------------------------------------------Default Amt's Fill Values

            //In Edit auto fill data table and diplay manual or auto input boxes
            $('#ssl_reminder_d_table').DataTable().destroy();
            DatatableAdvanced.init();
            renewelMethod_display();
            //In Edit auto fill data table and diplay manual or auto input boxes 

            $("#amount").on('keyup change', function() {
                var capital_amt = 0;
                capital_amt = $("#amount").val();
                auto_fill_amount(capital_amt);
            });

            $(".gst_amt_input").on('keyup change', function() {
                var gst_amt = 0;
                capital_amt = $("#amount").val();
                gst_amt = $(".gst_amt_input").val();
                auto_fill_net_amount(gst_amt, capital_amt);
            });

            function auto_fill_amount(capital_amt) {
                if (capital_amt == "") {
                    capital_amt = 0;
                }

                // console.log(capital_amt);
                capital_amt = parseFloat(capital_amt);
                var gst_per = $("#gst-per-hidden").val(); 
                gst_per = parseFloat(gst_per);
                var gst_amt = (capital_amt * gst_per) / 100;
                
                var net_amt = gst_amt + capital_amt;
                net_amt = net_amt.toFixed(2);

                $(".gst_amt_input").val(gst_amt);
                $(".gst_net_amt_input").val(net_amt);
            }

            function auto_fill_net_amount(gst_amt, capital_amt) {
                if (capital_amt == "") {
                    capital_amt = 0;
                }
                if (gst_amt == "") {
                    gst_amt = 0;
                }
                var net_amt = parseFloat(gst_amt) + parseFloat(capital_amt);
                $(".gst_net_amt_input").val(net_amt);
            }
            //------------------------------------------------------Default Amt's Fill Values

            //Auto Fill Values------------------------------------------------------  
            $(".get_cmp_id,.get_cmp_website").change(function() {
                var get_cmp_id = "";
                var get_cmp_website = "";
                var id = "";
                var get_cmp_id = $('.get_cmp_id').val();
                var get_cmp_website = $('.get_cmp_website').val();
                if (get_cmp_id != "" && get_cmp_website != "") {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "ssl-reminder/auto-fill",
                        dataType: 'json',
                        data: {
                            get_cmp_id: get_cmp_id,
                            get_cmp_website: get_cmp_website,
                            id: id
                        },
                        success: function(response) {

                            // $("#gst-d").append(response.gst);

                            //renew auto or manual code
                            var option = $('#renew_method').find('option');
                            $('#renew_method').val(response.type);
                            renewelMethod_display();
                            //renew auto or manual code

                            var option = $('#ssl_status').find('option');
                            $('#ssl_status').val(response.ssl_status);
                            $("#amount").val(response.amount_paid);
                            //-----------------------------------------------------GST amount calculation
                            if (response.amount_paid != "" && response.amount_paid != null) {
                                auto_fill_amount(response.amount_paid);
                            } else {
                                $("#amount").val("");
                                $(".gst_amt_input").val("0");
                                $(".gst_net_amt_input").val("0");
                            }
                            //-----------------------------------------------------GST amount calculation
                            $("#update_datepick").empty();
                            $("#ren_datepick").empty();
                            $("#auto_ren_datepick").empty();
                            if (response.type == 'manual') {

                                $('#update_datepick').val(response.manual_update_date);
                                $('#ren_datepick').val(response.renewel_date);
                                //remove or addd required
                                $('#auto_ren_datepick').removeAttr('required');
                                $('#update_datepick').attr('required');
                                $('#ren_datepick').attr('required');
                            } else if (response.type == 'auto') {

                                $('#auto_ren_datepick').val(response.renewel_date);
                                // remove or addd required
                                $('#update_datepick').removeAttr('required');
                                $('#ren_datepick').removeAttr('required');
                                $('#auto_ren_datepick').attr('required');
                            } else {
                                $('#update_datepick').val(response.manual_update_date);
                                $('#ren_datepick').val(response.renewel_date);
                                $('#auto_ren_datepick').val(response.renewel_date);
                            }
                        }
                    });
                }
            });
            //Auto Fill Values------------------------------------------------------

            


            //Auto Fill Ssl reminder Table Values---------------------------------- 

            $(".get_cmp_id,.get_cmp_website").change(function() {
                $('#ssl_reminder_d_table').DataTable().destroy();
                DatatableAdvanced.init();
            });
            //Auto Fill view Ssl reminder Table Values------------------------------ 


            //Hide DATE PICKERS------------------------------------------------------
            $("#renew_method").change(function() {
                renewelMethod_display()
            });

            function renewelMethod_display() {
                var method = $('#renew_method').val();
                if ("manual" == method) {
                    //label dipsplay-------
                    $(".hide_manual_label").css('display', 'block');
                    $(".hide_auto_label").css('display', 'none');
                    //label dipsplay-------

                    $("#update_datepick").css('display', 'block');
                    $("#ren_datepick").css('display', 'block');
                    $("#auto_ren_datepick").css('display', 'none');

                } else if ("auto" == method) {
                    //label dipsplay------- 
                    $(".hide_auto_label").css('display', 'block');
                    $(".hide_manual_label").css('display', 'none');
                    //label dipsplay-------

                    $("#update_datepick").css('display', 'none');
                    $("#ren_datepick").css('display', 'none');
                    $("#auto_ren_datepick").css('display', 'block');
                }else{
                    //label dipsplay------- 
                    $(".hide_auto_label").css('display', 'none');
                    $(".hide_manual_label").css('display', 'none');
                    //label dipsplay-------

                    $("#update_datepick").css('display', 'none');
                    $("#ren_datepick").css('display', 'none');
                    $("#auto_ren_datepick").css('display', 'none');
                }
            }
            //Hide DATE PICKERS------------------------------------------------------

            //Calling Relevant Websites Based On Client Name-------------------------
            $('#call_relavent_websites').change(function() {
                var company_id = $('#call_relavent_websites').val();
                if (company_id) {
                    jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>" + "ssl-reminder/dispaly-relavent-websites",
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
            //Calling Relevant Websites Based On Client Name-------------------------
        });

        // Numeric validation--------------------------------------------------------
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        // Numeric validation--------------------------------------------------------

        //DATE pickers---------------------------------------------------------------
        $("#update_datepick").datepicker({
            dateFormat: 'dd-mm-yy',
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
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            minDate: 0,
            yearRange: '2020:2030',
            // onClose: function(selectedDate) {
            //     $("#update_datepick").datepicker("option", "minDate", selectedDate);
            // }
        });

        $("#auto_ren_datepick").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true
        });
        //DATE pickers-----------------------------------------------------------------

        //ADDING and REMOVING required ------------------------------------------------
        $('#update_datepick').change(function() {
            $('#auto_ren_datepick').removeAttr('required');
            $('#update_datepick').attr('required');
            $('#ren_datepick').attr('required');
        });
        $('#ren_datepick').change(function() {
            $('#auto_ren_datepick').removeAttr('required');
            $('#update_datepick').attr('required');
            $('#ren_datepick').attr('required');
        });
        $('#auto_ren_datepick').change(function() {
            $('#update_datepick').removeAttr('required');
            $('#ren_datepick').removeAttr('required');
            $('#auto_ren_datepick').attr('required');
        });
        //ADDING and REMOVING required 

        //View Details Code----------------------
        function view_ssl_details(id) {
            $("div#divLoading").addClass('show');
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "ssl_reminder/view_ssl_details",
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
    </script>


    <!------------------------------------------------// DATA TABLES CODE ----------->
    <script>
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


                var get_cmp_id = "";
                var get_cmp_website = "";
                var get_cmp_id = $('.get_cmp_id').val();
                var get_cmp_website = $('.get_cmp_website').val();
                if (get_cmp_id != "" && get_cmp_website != "") {
                    var dataTable = $('#ssl_reminder_d_table').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'order': [],
                        'ajax': {
                            'url': "<?php echo base_url() ?>" + "ssl_reminder/get_all_data?cid=" + get_cmp_id + "&cweb=" + get_cmp_website,
                            'type': 'POST'
                        },
                        'columnDefs': [{
                            "targets": [7],
                            "orderable": false,
                        }],

                    })
                }

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
    </script>
</body>

</html>