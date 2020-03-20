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
                     <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home - Dashboard</span></h4>
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
                  <div class="col-lg-12">
                     <!-- card-->
                   
                     <div class="card">
                        <div class="card-header header-elements-inline">
                           <h5 class="card-title">Dashboard</h5>
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
                            
                        <div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="card bg-teal-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $total_clients_count ?></h3>
											<!-- <span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span> -->
					                	</div>
					                	
					                	<div>
											Total Clients
											<div class="font-size-sm opacity-75"><?php echo $fetch_total_active_websites[0]/ $total_clients_count ?> Websites Avg</div>
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"><svg width="233.15000915527344" height="50"><g width="233.15000915527344"><rect class="d3-random-bars" width="6.716255407765078" x="2.878395174756462" height="34.21052631578947" y="15.789473684210527" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="12.473045757278001" height="36.84210526315789" y="13.15789473684211" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="22.067696339799543" height="42.10526315789473" y="7.894736842105267" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="31.662346922321085" height="50" y="0" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="41.25699750484262" height="34.21052631578947" y="15.789473684210527" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="50.85164808736416" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="60.44629866988571" height="31.57894736842105" y="18.42105263157895" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="70.04094925240724" height="42.10526315789473" y="7.894736842105267" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="79.63559983492878" height="50" y="0" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="89.23025041745032" height="34.21052631578947" y="15.789473684210527" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="98.82490099997186" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="108.4195515824934" height="39.473684210526315" y="10.526315789473685" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="118.01420216501495" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="127.60885274753649" height="42.10526315789473" y="7.894736842105267" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="137.20350333005803" height="34.21052631578947" y="15.789473684210527" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="146.79815391257955" height="39.473684210526315" y="10.526315789473685" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="156.3928044951011" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="165.98745507762266" height="34.21052631578947" y="15.789473684210527" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="175.58210566014418" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="185.17675624266573" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="194.77140682518726" height="50" y="0" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="204.3660574077088" height="28.947368421052634" y="21.052631578947366" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="213.96070799023033" height="39.473684210526315" y="10.526315789473685" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="6.716255407765078" x="223.55535857275189" height="44.73684210526316" y="5.2631578947368425" style="fill: rgba(255, 255, 255, 0.5);"></rect></g></svg></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Current server load -->
								<div class="card bg-pink-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $fetch_total_active_websites[0] ?></h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
														<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
														<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
														<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Total Active Websites
											<div class="font-size-sm opacity-75"><?php echo $fetch_total_active_websites[1] ?> Inactive</div>
										</div>
									</div>

									<div id="server-load"><svg width="253.15000915527344" height="50"><g transform="translate(0,0)" width="253.15000915527344"><defs><clipPath id="load-clip-server-load"><rect class="load-clip" width="253.15000915527344" height="50"></rect></clipPath></defs><g clip-path="url(#load-clip-server-load)"><path d="M-9.736538813664364,30.333333333333332L-8.113782344720303,27.444444444444443C-6.491025875776242,24.555555555555554,-3.245512937888121,18.777777777777775,0,16.111111111111107C3.245512937888121,13.444444444444441,6.491025875776242,13.888888888888886,9.736538813664364,14.777777777777775C12.982051751552484,15.666666666666664,16.227564689440605,17,19.473077627328728,19C22.71859056521685,21,25.96410350310497,23.666666666666664,29.20961644099309,27C32.45512937888121,30.333333333333332,35.70064231676933,34.333333333333336,38.946155254657455,32.333333333333336C42.19166819254558,30.333333333333336,45.43718113043369,22.333333333333332,48.68269406832182,19.888888888888886C51.92820700620994,17.444444444444443,55.17371994409806,20.555555555555557,58.41923288198618,23.22222222222222C61.6647458198743,25.88888888888889,64.91025875776242,28.11111111111111,68.15577169565054,29.666666666666664C71.40128463353867,31.22222222222222,74.64679757142679,32.111111111111114,77.89231050931491,27.22222222222222C81.13782344720303,22.333333333333332,84.38333638509114,11.666666666666664,87.62884932297928,8.999999999999996C90.87436226086739,6.33333333333333,94.11987519875551,11.666666666666664,97.36538813664365,11.666666666666664C100.61090107453175,11.666666666666664,103.85641401241988,6.33333333333333,107.10192695030801,3.444444444444442C110.34743988819612,0.5555555555555536,113.59295282608424,0.11111111111111072,116.83846576397237,3.8888888888888893C120.08397870186047,7.666666666666668,123.3294916397486,15.666666666666668,126.5750045776367,17.444444444444446C129.82051751552484,19.22222222222222,133.06603045341296,14.777777777777777,136.3115433913011,11.666666666666666C139.5570563291892,8.555555555555554,142.8025692670773,6.777777777777777,146.04808220496543,7.666666666666666C149.29359514285355,8.555555555555555,152.5391080807417,12.11111111111111,155.78462101862982,12.111111111111112C159.03013395651794,12.11111111111111,162.27564689440604,8.555555555555555,165.5211598322942,7.666666666666666C168.76667277018228,6.777777777777777,172.0121857080704,8.555555555555554,175.2576986459585,8.555555555555554C178.50321158384665,8.555555555555554,181.74872452173477,6.777777777777777,184.99423745962292,9.222222222222221C188.23975039751102,11.666666666666664,191.48526333539914,18.333333333333332,194.73077627328723,21.666666666666664C197.97628921117538,24.999999999999996,201.2218021490635,24.999999999999996,204.46731508695166,23.44444444444444C207.71282802483975,21.888888888888886,210.95834096272787,18.77777777777778,214.20385390061597,18.333333333333332C217.4493668385041,17.88888888888889,220.6948797763922,20.11111111111111,223.94039271428034,23.666666666666664C227.18590565216846,27.22222222222222,230.43141859005658,32.11111111111111,233.6769315279447,32.55555555555555C236.92244446583283,33,240.16795740372095,28.999999999999996,243.41347034160904,27.66666666666666C246.6589832794972,26.33333333333333,249.90449621738532,27.666666666666664,253.1500091552734,27C256.39552209316156,26.333333333333332,259.6410350310497,23.666666666666664,262.8865479689378,20.11111111111111C266.1320609068259,16.555555555555557,269.37757384471405,12.11111111111111,271.0003303136581,9.88888888888889L272.6230867826022,7.666666666666666L272.6230867826022,50L271.0003303136581,49.999999999999986C269.37757384471405,49.99999999999999,266.1320609068259,49.99999999999999,262.8865479689378,49.999999999999986C259.6410350310497,49.99999999999999,256.39552209316156,49.99999999999999,253.1500091552734,49.999999999999986C249.90449621738532,49.99999999999999,246.6589832794972,49.99999999999999,243.41347034160907,49.999999999999986C240.16795740372095,49.99999999999999,236.92244446583283,49.99999999999999,233.6769315279447,49.999999999999986C230.43141859005658,49.99999999999999,227.18590565216846,49.99999999999999,223.94039271428034,49.999999999999986C220.6948797763922,49.99999999999999,217.4493668385041,49.99999999999999,214.20385390061597,49.999999999999986C210.95834096272787,49.99999999999999,207.71282802483975,49.99999999999999,204.46731508695166,49.999999999999986C201.2218021490635,49.99999999999999,197.97628921117538,49.99999999999999,194.73077627328723,49.999999999999986C191.48526333539914,49.99999999999999,188.23975039751102,49.99999999999999,184.99423745962292,49.999999999999986C181.74872452173477,49.99999999999999,178.50321158384665,49.99999999999999,175.2576986459585,49.999999999999986C172.0121857080704,49.99999999999999,168.76667277018228,49.99999999999999,165.5211598322942,49.999999999999986C162.27564689440604,49.99999999999999,159.03013395651794,49.99999999999999,155.78462101862982,49.999999999999986C152.5391080807417,49.99999999999999,149.29359514285355,49.99999999999999,146.04808220496543,49.999999999999986C142.8025692670773,49.99999999999999,139.5570563291892,49.99999999999999,136.3115433913011,49.999999999999986C133.06603045341296,49.99999999999999,129.82051751552484,49.99999999999999,126.57500457763672,49.999999999999986C123.3294916397486,49.99999999999999,120.08397870186047,49.99999999999999,116.83846576397235,49.999999999999986C113.59295282608424,49.99999999999999,110.34743988819612,49.99999999999999,107.10192695030801,49.999999999999986C103.85641401241988,49.99999999999999,100.61090107453175,49.99999999999999,97.36538813664365,49.999999999999986C94.11987519875551,49.99999999999999,90.87436226086739,49.99999999999999,87.62884932297928,49.999999999999986C84.38333638509114,49.99999999999999,81.13782344720303,49.99999999999999,77.89231050931491,49.999999999999986C74.64679757142679,49.99999999999999,71.40128463353867,49.99999999999999,68.15577169565054,49.999999999999986C64.91025875776242,49.99999999999999,61.6647458198743,49.99999999999999,58.419232881986176,49.999999999999986C55.17371994409806,49.99999999999999,51.92820700620994,49.99999999999999,48.68269406832182,49.999999999999986C45.43718113043369,49.99999999999999,42.19166819254558,49.99999999999999,38.946155254657455,49.999999999999986C35.70064231676933,49.99999999999999,32.45512937888121,49.99999999999999,29.20961644099309,49.999999999999986C25.96410350310497,49.99999999999999,22.71859056521685,49.99999999999999,19.473077627328728,49.999999999999986C16.227564689440605,49.99999999999999,12.982051751552484,49.99999999999999,9.736538813664364,49.999999999999986C6.491025875776242,49.99999999999999,3.245512937888121,49.99999999999999,0,49.999999999999986C-3.245512937888121,49.99999999999999,-6.491025875776242,49.99999999999999,-8.113782344720303,49.999999999999986L-9.736538813664364,50Z" class="d3-area" style="fill: rgba(255, 255, 255, 0.5); opacity: 1;" transform="translate(-9.736538887023926,0)"></path></g></g></svg></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-4">

								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $fetch_total_ssl_reminders[0] ?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
											Total SSL reminders
											<div class="font-size-sm opacity-75"><?php echo $fetch_total_ssl_reminders[1]. " Amount Total" ?></div>
										</div>
									</div>

									<div id="today-revenue"><svg width="253.15000915527344" height="50"><g transform="translate(0,0)" width="253.15000915527344"><defs><clipPath id="clip-line-small"><rect class="clip" width="253.15000915527344" height="50"></rect></clipPath></defs><path d="M20,8.46153846153846L55.525001525878906,25.76923076923077L91.05000305175781,5L126.57500457763672,15.384615384615383L162.1000061035156,5L197.62500762939456,36.15384615384615L233.15000915527344,8.46153846153846" clip-path="url(#clip-line-small)" class="d3-line d3-line-medium" style="stroke: rgb(255, 255, 255);"></path><g><line class="d3-line-guides" x1="20" y1="50" x2="20" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="55.525001525878906" y1="50" x2="55.525001525878906" y2="25.76923076923077" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="91.05000305175781" y1="50" x2="91.05000305175781" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="126.57500457763672" y1="50" x2="126.57500457763672" y2="15.384615384615383" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="162.1000061035156" y1="50" x2="162.1000061035156" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="197.62500762939456" y1="50" x2="197.62500762939456" y2="36.15384615384615" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line><line class="d3-line-guides" x1="233.15000915527344" y1="50" x2="233.15000915527344" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispedges;"></line></g><g><circle class="d3-line-circle d3-line-circle-medium" cx="20" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="55.525001525878906" cy="25.76923076923077" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="91.05000305175781" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="126.57500457763672" cy="15.384615384615383" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="162.1000061035156" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="197.62500762939456" cy="36.15384615384615" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="233.15000915527344" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle></g></g></svg></div>
								</div>
								<!-- /today's revenue -->

							</div>
						</div>


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
       $(document).on('focusout', '.gst_check', function () {
         var number_count=0;
         var alpha_count=0; 
         var i=0;
         var number=/[0-9.]/;
         var alpha=/[A-Za-z]/;
         
        
         var s=$(this).val();
         var s_len=s.length;
         for(i;i<s_len;i++)
         {
          if(number.test(s[i]))
          {
           number_count++;
          }
          if(alpha.test(s[i]))
          {
            alpha_count++;
          }
          
         }
         if(number_count== 0 || alpha_count>0) 
         {
            $(this).val('');
         }
         
         });
       </script>
   </body>
</html>