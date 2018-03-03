<?php
require_once('framework/database/init.php');

global $db;
$select_query = "SELECT * from user_list where status='active'; ";
$query_data = $db->fetchQuery($select_query);
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AdminDesigns - SHARED ON GFXFree.Net</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - SHARED ON GFXFree.Net">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="html/vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

    <!-- Datatables Editor CSS -->
    <link rel="stylesheet" type="text/css" href="html/vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="html/assets/skin/default_skin/css/theme.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="html/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="datatables-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

    <!-- Start: Theme Preview Pane -->
		<?php include_once('theme-options.php'); ?>
	<!-- End: Theme Preview Pane -->

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
			<?php include_once('header.php');?>
		<!-- End: Header -->

        <!-- Start: Sidebar -->
			<?php include_once('left-sidebar.php'); ?>
		<!-- End: Sidebar -->
		
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar-Dropdown -->
				<?php include_once('topbar-dropdown.php'); ?>
            <!-- End: Topbar-Dropdown -->

            <!-- Start: Topbar -->
				<?php include_once('topbar.php'); ?>
			<!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="table-layout animated fadeIn">

                <!-- begin: .tray-center -->
                <div class="tray tray-center p40 va-t posr">

                    <div class="row">
						
						<div class="col-md-2" style="margin-bottom: 20px;font-size:20px">
							<button type="button" class="btn btn-rounded btn-primary btn-block" ><span class="glyphicon glyphicon-plus-sign"></span> Add New Users</button>
						</div>
						
                        <div class="col-md-12">
                            <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>User Details</div>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
					        <th>S No</th>
                                                <th>Kctv Id</th>
                                                <th>Caf Id</th>
                                                <th>Ca Id</th>
                                                <th>Tactv Id</th>
                                                <th>Eb Sc Number</th>
                                                <th>User Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email Id</th>
                                                <th>Area</th>
                                                <th>Door Number</th>
                                                <th>Street Name</th>
                                                <th>House Type</th>
                                                <th>Account Status</th>
                                                <th>Installation Date</th>
                                                <th>Activation Date</th>
                                                <th>Tariff</th>
                                                <th>Advance</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Added On</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $count = 1; foreach($query_data as $data) { ?>
												<tr>
													<td><?php echo $count; ?></td>
                                                                                                        <td><?php echo strtoupper($data['kctv_id']);?></td>
                                                                                                        <td><?php echo strtoupper($data['caf_id']);?></td>
                                                                                                        <td><?php echo strtoupper($data['ca_id']);?></td>
                                                                                                        <td><?php echo strtoupper($data['tactv_id']);?></td>
                                                                                                        <td><?php echo strtoupper($data['eb_sc_no']);?></td>
                                                                                                        <td><?php echo strtoupper($data['user_name']);?></td>
                                                                                                        <td><?php echo strtoupper($data['mobile_number']);?></td>
                                                                                                        <td><?php echo strtoupper($data['email_id']);?></td>
                                                                                                        <td><?php echo strtoupper($data['area']);?></td>
                                                                                                        <td><?php echo strtoupper($data['door_no']);?></td>
                                                                                                        <td><?php echo strtoupper($data['streat_name']);?></td>
                                                                                                        <td><?php echo strtoupper($data['house_type']);?></td>
                                                                                                        <td><?php echo strtoupper($data['acc_status']);?></td>
                                                                                                        <td><?php echo strtoupper($data['installation_date']);?></td>
                                                                                                        <td><?php echo strtoupper($data['actiation_date']);?></td>
                                                                                                        <td><?php echo strtoupper($data['tariff']);?></td>
                                                                                                        <td><?php echo strtoupper($data['advance']);?></td>
                                                                                                        <td><?php echo strtoupper($data['balance']);?></td>
                                                                                                        <td><?php echo strtoupper($data['status']);?></td>
                                                                                                        <td><?php echo date('Y-m-d H:i:s', $data['added_on']);?></td>
													<td> Edit  | Delete </td>
												</tr>
											<?php $count++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end: .tray-center -->

            </section>
            <!-- End: Content -->

        </section>

        <!-- Start: Right Sidebar -->
		<?php //include_once('right-sidebar.php');?>
		<!-- End: Right Sidebar -->

    </div>
    <!-- End: Main -->

    <style>
    
    /*demo styles*/
    body {
        min-height: 2000px;
    }
    .custom-nav-animation li {
        display: none;
    }
    .custom-nav-animation li.animated {
        display: block;
    }
    
    /* nav fixed settings */
    ul.tray-nav.affix {
        width: 319px;
        top: 80px;
    }
    </style>

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="html/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="html/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="html/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" src="html/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="html/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

    <!-- Datatables Editor addon - READ LICENSING NOT MIT  -->
    <script type="text/javascript" src="html/vendor/plugins/datatables/extensions/Editor/js/dataTables.editor.js"></script>

    <!-- Datatables Bootstrap Modifications  -->
    <script type="text/javascript" src="html/vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="html/vendor/plugins/datatables/extensions/Editor/js/editor.bootstrap.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="html/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="html/assets/js/main.js"></script>
    <script type="text/javascript" src="html/assets/js/demo.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            // Init tray navigation smooth scroll
            $('.tray-nav a').smoothScroll({
                offset: -145
            });

            // Custom tray navigation animation
            setTimeout(function() {
                $('.custom-nav-animation li').each(function(i, e) {
                    var This = $(this);
                    var timer = setTimeout(function() {
                        This.addClass('animated zoomIn');
                    }, 100 * i);
                });
            }, 600);


           // Init Datatables with Tabletools Addon    

            $('#datatable2').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "html/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            // MISC DATATABLE HELPER FUNCTIONS

            // Add Placeholder text to datatables filter bar
            $('.dataTables_filter input').attr("placeholder", "Enter Terms...");

        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
