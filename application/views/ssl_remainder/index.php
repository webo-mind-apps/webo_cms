<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WeboCMS</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" crossorigin="anonymous"></script>
    <style>
        .table_font {
            font-size: 14px;
        }

        .input-container {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }

        .icon {
            padding: 10px;
            background: #045b99;
            color: white;
            min-width: 50px;
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 9px 10px 10px;
            border-radius: 0 3px 3px 0;
            border: 1px silver solid;
        }

        .input-field:focus {
            border: 2px solid dodgerblue;
        }

        /* Set a style for the submit button */
        .btns {
            background-color: #045b99;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btns:hover {
            opacity: 1;
        }

        .btn {
            background-color: #045b99;
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
                        <h4><i style="font-size:18px;" class="fa fa-lock"></i> &nbsp;SSL Remainder</h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <form action="#" method="post">
                <div class="content">
                    <?php
                    // echo "<pre>";
                    // print_r($company_names_db);
                    // exit; 
                    ?>
                    <div class="col-md-6 form-group form-group-feedback form-group-feedback-left" bis_skin_checked="1">
                        <select class="form-control" id="call_relavent_websites" required>
                            <option value="">Select Company</option>
                            <?php
                            for ($i = 0; $i < count($company_names_db); $i++) :
                                echo '<option  value="' . $company_names_db[$i]['company_name'] . '">' . $company_names_db[$i]['company_name'] . '</option>';
                            endfor;
                            ?>
                        </select>
                        <div class="form-control-feedback" bis_skin_checked="1">
                            &nbsp;&nbsp; <i class="fas fa-building"></i>
                        </div>
                    </div>

                    <div class="col-md-6 form-group form-group-feedback form-group-feedback-left" bis_skin_checked="1">
                        <select class="form-control" id="dynamic_company_websites" required>
                            <option value="">Select Website</option>
                        </select>
                        <div class="form-control-feedback" bis_skin_checked="1">
                            &nbsp;&nbsp; <i class="fa fa-globe" aria-hidden="true"></i>
                        </div>
                    </div>

                    <!-- //------------------------------------------------------------------------ -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Select Renew Method</h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="alpaca-radio-basic">
                                    <div class="form-group alpaca-field alpaca-field-radio alpaca-required alpaca-edit alpaca-top alpaca-field-valid" data-alpaca-field-id="alpaca7" data-alpaca-field-path="/" data-alpaca-field-name="renew_method">

                                        <div class="radio alpaca-control form-check" name="renew_method" style="display: block;">
                                            <label class="form-check-label">
                                                <input id="renew_radio_manual" type="radio" name="renew_method" value="manual" class="form-check-input" required>Manual
                                            </label>
                                        </div>

                                        <div style="margin:10px;display:none" id="renew_buttons_manual">
                                            <button type="button" style="margin:0 15px 0 22px;" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="fas fa-upload"></i></b>New Update</button>

                                            <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="fas fa-sync"></i></b>Renew</button>
                                        </div>

                                        <div class="radio alpaca-control form-check" name="renew_method" style="display: block;">
                                            <label class="form-check-label">
                                                <input id="renew_radio_auto" type="radio" name="renew_method" value="auto" class="form-check-input" required>Auto
                                            </label>
                                        </div>

                                        <div style="margin:10px;display:none" id="renew_buttons_auto">
                                            <button type="button" style="margin:0 15px 0 22px;" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="fas fa-sync"></i></b>Renew</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //------------------------------------------------------------------------ -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Amount</h6>
                            </div>

                            <div class="card-body input-container" style="border-radius:3px;">
                                <i style="font-size:18px;" class="fas fa-rupee-sign icon"></i>
                                <input class="input-field" type="text" name="renew_amount" required>
                            </div>

                        </div>
                    </div>
                    <button style="border-radius:3px;" type="submit" class="btns col-md-6">Save</button>

                </div>
            </form>
            <!-- /content area -->

        </div>
        <!-- /main content -->


    </div>
    <!-- /page content -->


    <script>
        //hide options in radio
        $(document).ready(function() {

            $("#renew_radio_manual").click(function() {
                var radio_manual = $(this).val();

                $("#renew_buttons_manual").css('display', 'block');
                $("#renew_buttons_auto").css('display', 'none');
            });
            $("#renew_radio_auto").click(function() {
                var radio_auto = $(this).val();
                $("#renew_buttons_auto").css('display', 'block');
                $("#renew_buttons_manual").css('display', 'none');
            });
            //calling relevant websites based on client name
            $('#call_relavent_websites').change(function() {

                var company_name = $('#call_relavent_websites').val();
                if (company_name) {
                    jQuery.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>" + "ssl-remainder/dispaly-relavent-websites",
                        data: {
                            company_name: company_name
                        },
                        success: function(response) {
                            $("#dynamic_company_websites").empty();
                            $("#dynamic_company_websites").append(response);
                        }
                    });
                }
            });

            // $('#alpaca-radio-styled').alpaca({
            //     data: 'Jimi Hendrix',
            //     schema: {
            //         enum: ['Jimi Hendrix', 'Mark Knopfler', 'Joe Satriani', 'Eddie Van Halen', 'Orianthi']
            //     },
            //     options: {
            //         type: 'radio',
            //         label: 'Who is your favorite guitarist?',
            //         fieldClass: 'radio-styled-demo',
            //         vertical: true
            //     },
            //     postRender: function(control) {
            //         $('.radio-styled-demo').find('input[type=radio]').uniform({
            //             radioClass: 'choice'
            //         });
            //     }
            // });
        });
    </script>
</body>

</html>