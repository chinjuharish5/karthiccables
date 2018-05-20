<?php
require_once('framework/database/init.php');

global $db;

$error_msg = $success_msg = '';
$user_id = '';
if(isset($_GET['uid'])) {
	$user_id = $_GET['uid'];
	$user_query = "SELECT * from user_list where user_type='customer' and status='active' AND user_id='".$user_id."'; ";
	$user_data = $db->fetchQuery($user_query);
	$tariff_data = array();
	$remaining_amount = 0;
	
	if(empty($user_data)) {
		$error_msg = 'User not found for this ID';
	} else {
		$_SESSION['remaining_amount'] = $remaining_amount = getRemainingAmount($user_id, $user_data[0]['tariff_id']);
	}
}

if(isset($_POST["submit"])) {
	
	$user_id = $_POST["user_id"];
	$amount = $_POST["amount"];
	$description = $_POST["description"];
	$transaction_type = $_POST["transaction_type"];
	
	if($amount <= 0) {
		$error_msg = 'Please enter a Valid Amount !!!';
	} else {
		if($user_id!='') {
			$ins_data = $db->executeQuery("INSERT INTO payments (userid, amount, description, transaction_type) VALUES ('".$user_id."', '".$amount."', '".$description."', '".$transaction_type."') ");
			$payment_id = $db->getLastInsertId();	
			
			if($payment_id!= '') {
				$success_msg = 'User Payment added successfully !!!';
				/* $select_query = "SELECT pid, user_id, amount, description, transaction_type, payment_date from payments where status='active' AND user_id='".$user_id."' ; ";
				$query_data = $db->fetchQuery($select_query); */	
				
				$user_query = "SELECT * from user_list where user_type='customer' and status='active' AND user_id='".$user_id."'; ";
				$user_data = $db->fetchQuery($user_query);			
				
				$remaining_amount = ($_SESSION['remaining_amount']) ? $_SESSION['remaining_amount'] : 0; //getRemainingAmount($user_id, $user_data[0]['tariff_id']);
				
				if($amount == $remaining_amount) {
					$add_query = ' balance=0, advance=0 ';
				} else if($amount > $remaining_amount) {
					$advance_amt = $amount - $remaining_amount;
					$add_query = ' balance=0, advance="'.$advance_amt.'" ';
				} else {
					$balance_amt = $remaining_amount - $amount;
					$add_query = ' balance="'.$balance_amt.'", advance=0 ';
				}
				
				$update_balance = $db->executeQuery("UPDATE user_list SET $add_query WHERE user_id='".$user_id."' AND status='active' ");
			} else {
				$error_msg = 'Unexpected Error. Please try again.';
			}
		} else {
			$error_msg = 'User not exists !!!';
		}		
	}
}

if($user_id != '') {
	$payments_query = "SELECT pid, userid, amount, description, transaction_type, payment_date from payments where status='active' AND userid='".$user_id."' ORDER BY pid desc; ";
	$payments_data = $db->fetchQuery($payments_query);			
}

$transaction_types = array('credit' => 'Credit', 'debit' => 'Debit', 'discount' => 'Discount');

function getRemainingAmount($user_id, $tariff_id) {
	global $db; 
	$remaining_amount = 0;
	
	$user_query = "SELECT * from user_list where user_type='customer' and status='active' AND user_id='".$user_id."'; ";
	$user_data = $db->fetchQuery($user_query);	
	
	$tariff_query = "SELECT tariff_id, amount from tariff_list where status='active' AND tariff_id='".$tariff_id."'; ";
	$tariff_data = $db->fetchQuery($tariff_query);
	
	// Calculation for Balance and Amount
	if(!empty($tariff_data)) {
		$tariff_amount 	= $tariff_data[0]['amount'];
		$balance		= $user_data[0]['balance'];
		$advance		= $user_data[0]['advance'];
		
		$remaining_amount = ($tariff_amount + $balance) - $advance;
		
		// Check If payment already paid or not
		$payment_query = "SELECT amount FROM `payments` WHERE MONTH(`payment_date`) = MONTH(CURRENT_DATE()) AND YEAR(`payment_date`) = YEAR(CURRENT_DATE()) AND status='active' and transaction_type IN ('credit', 'discount') and userid='".$user_id."' ";
		$payment_data = $db->fetchQuery($payment_query);
		
		$previous_amount = isset($payment_data[0]['amount']) ? $payment_data[0]['amount'] : 0;
		
		if($previous_amount!=0) {
			if($previous_amount > $remaining_amount) {
				return 0;
			}
			$remaining_amount = $remaining_amount - $previous_amount;
		}
	}
	return $remaining_amount;
}
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

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="html/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="html/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="admin-validation-page">

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
            <section id="content" class="animated fadeIn">		
			
				<!-- Success / Error Message -->
				<div class="alert alert-success alert-dismissable" <?php if($success_msg=='') {echo 'style="display:none"';} ?>>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="fa fa-check pr10"></i>
					<strong>Success !</strong> <?php echo $success_msg; ?>
				</div>
				
				<div class="alert alert-danger alert-dismissable"  <?php if($error_msg=='') {echo 'style="display:none"';} ?>>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="fa fa-remove pr10"></i>
					<strong>Oops !</strong> <?php echo $error_msg; ?>
				</div>			
				<!-- Success / Error Message End -->
				
				<div class="row">
                    <div class="wrapper text-right col-md-11">
                       <div class="text-right">
                        <button type="button" class="btn btn-rounded btn-success" id="show-history">SHOW HISTORY</button>
						<button type="button" class="btn btn-rounded btn-success" id="hide-history" style="display:none">BACK TO PAYMENT</button>
                       </div>
                    </div>
                </div>					

                <div class="row make-payment-main-div make-payment-metabox">
				<h2 class="lh30 mt15 text-center">Make <b class="text-primary">Payment</b></h2>		
                    <div class="col-md-9 center-block">


                        <!-- Form Wizard -->
                        <div class="admin-form theme-primary">

                            <div class="panel">
                
                                <form method="post" id="admin-form">
                                    <div class="panel-body">
                                    
                                        <div class="section-divider mb40 mt20"><span> Make Payment </span></div><!-- .section-divider -->
                                        
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
										
										<div class="section row">
                                            <div class="col-md-12" >
												<strong>Balance Amount :</strong> <?php echo isset($remaining_amount) ? $remaining_amount : 0;?>
											</div>
										</div>										
										
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="amount" class="field prepend-icon">
                                                    <input type="text" name="amount" id="amount" class="gui-input" placeholder="Enter the Amount to Pay.." value="<?php echo isset($remaining_amount) ? $remaining_amount : 0; ?>" >
                                                    <label for="amount" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 
										
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="description" class="field prepend-icon">
                                                    <input type="text" name="description" id="description" class="gui-input" placeholder="Enter the Description.." value="" >
                                                    <label for="description" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                        </div><!-- end .section row section --> 	

                                      <div class="section">
										<label class="field select">
											<select id="transaction_type" name="transaction_type">
												<?php foreach($transaction_types as $tx_key => $tx_value) { ?>
													<option value="<?php echo $tx_key; ?>"><?php echo strtoupper($tx_value); ?></option>
												<?php } ?>													
											</select>
											<i class="arrow double"></i>                    
										</label>  
									</div><!-- end section --> 										
										
                                    </div><!-- end .form-body section -->
									
                                    <div class="panel-footer text-right" style="min-height:70px">
										<div style="float:right">
											<button type="submit" name="submit" value="submit" class="button btn-primary"> Make Payment </button>
											<a href="user_listing.php"><button type="button" class="button"> Cancel </button></a>
										</div>									
									
										<div style="float:right;margin-top:15px;padding:0px 10px;">
											<input type="checkbox" name="message" value="message"> Send Message
										</div>
                                    </div><!-- end .form-footer section -->
                                </form>

                            </div>

                        </div>
                        <!-- end: .admin-form -->

                    </div>

                </div>		

				<div class="tray tray-center p40 va-t posr make-payment-main-div make-payment-history" style="display:none">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-visible" id="spy2">
								<div class="panel-heading">
									<div class="panel-title hidden-xs">
										<span class="glyphicon glyphicon-tasks"></span>Payment Details</div>
								</div>
								<div class="panel-body pn">
									<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>S No</th>
												<th>Payment Date</th>
												<th>Description</th>
												<th>Transaction Type</th>
												<th>Amount</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php $count = 1; foreach($payments_data as $data) { ?>
												<tr>
													<td><?php echo $count; ?></td>
													<td><?php echo $data['payment_date'];?></td>
													<td><?php echo strtoupper($data['description']);?></td>
													<td><?php echo strtoupper($data['transaction_type']);?></td>
													<td><?php echo $data['amount'];?></td>
													<td>
														<div class="divToPrint-<?php echo $count; ?>" style="display:none">
														  <div style="width:300px;height:300px;background-color:teal;">
															<?php
																echo "<div> <strong>Bill Number : ".strtotime($data['payment_date'])."</strong></div>";
																echo "<div><strong>KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500 </strong></div><br>";
																
																echo "<hr>";
																
																echo "<div> <strong>Customer ID : </strong>KC".$user_data[0]['kctv_id']."</div>";
																echo "<div> Dear <strong>".ucfirst($user_data[0]['user_name'])."</strong></div>";
																echo "<div> CAF ID : ".$user_data[0]['caf_id']."</div>";
																echo "<div> ".$user_data[0]['door_no']." ".$user_data[0]['street_name']."</div><br>";
																
																echo "<hr>";
																
																echo "<div> <strong>Paid : ".$data['amount']."</strong></div>";
																echo "<div> Current Balance : ".$_SESSION['remaining_amount']."</div>";
																echo "<div> Payment Date : ".$data['payment_date']."</div>";
																
																echo "<hr>";
																
																echo "<div><strong>KARTHIC CABLES, COIMBATORE</strong></div>";
															?>
														  </div>
														</div>
														<div >
														  <button type="button" class="btn btn-xs btn-info btn-block print-receipt" value="print" count="<?php echo $count; ?>" >Print</button>
														</div>	
													</td>
												</tr>
											<?php $count++;} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>					
					</div>
									
				</div>
            </section>
            <!-- End: Content -->

        </section>

        <!-- Start: Right Sidebar -->
			<?php //include_once('right-sidebar.php');?>
		<!-- End: Right Sidebar -->

    </div>
    <!-- End: Main -->

    <style>
    
    /*page demo styles*/
    .wizard .steps .fa,
    .wizard .steps .glyphicon,
    .wizard .steps .glyphicon {
        display: none;
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

    <!-- Page Plugins -->
    <script type="text/javascript" src="html/assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js"></script>
    <script type="text/javascript" src="html/assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="html/assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="html/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="html/assets/js/main.js"></script>
    <script type="text/javascript" src="html/assets/js/demo.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS     
            Demo.init();
  
    
            /* @custom validation method (smartCaptcha) 
            ------------------------------------------------------------------ */
                
            $.validator.methods.smartCaptcha = function(value, element, param) {
                    return value == param;
            };
                    
            $( "#admin-form" ).validate({
            
                    /* @validation states + elements 
                    ------------------------------------------- */
                    
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",
                    
                    /* @validation rules 
                    ------------------------------------------ */
                        
                    rules: {
                            amount: {
                                    required: true
                            },
                        
                    },
                    
                    /* @validation error messages 
                    ---------------------------------------------- */
                        
                    messages:{
                            amount: {
                                    required: 'Enter the Amount'
                            },    
                     
                    },

                    /* @validation highlighting + error placement  
                    ---------------------------------------------------- */ 
                    
                    highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                    },
                    errorPlacement: function(error, element) {
                       if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                       } else {
                                error.insertAfter(element.parent());
                       }
                    }
                            
            });     
        
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

			$('#show-history').on('click', function() {
				$('.make-payment-main-div').hide();
				$('.make-payment-history').show();
				$('#show-history').hide();
				$('#hide-history').show();
			});
			
			$('#hide-history').on('click', function() {
				$('.make-payment-main-div').hide();
				$('.make-payment-metabox').show();
				$('#hide-history').hide();
				$('#show-history').show();
			});			
		
        });
		
     $('.print-receipt').on('click', function() {
		var count = $(this).attr('count');
		var divElem = 'divToPrint-' + count;
	   var divToPrint = $('.' + divElem); //document.getElementById('divToPrint');
	   var popupWin = window.open('', '_blank', 'width=300,height=300');
	   popupWin.document.open();
	   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.html() + '</html>');
	   popupWin.document.close();
   });  		
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
