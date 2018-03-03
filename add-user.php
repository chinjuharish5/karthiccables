<?php
require_once('framework/database/init.php');

global $db;

$error_msg = $success_msg = '';
$dist_id = '';
if(isset($_GET['uid'])) {
	$user_id = $_GET['uid'];
	$select_query = "SELECT * from user_list where status='active' AND user_id='".$user_id."'; ";
	$query_data = $db->fetchQuery($select_query);
	
	if(empty($query_data)) {
		$error_msg = 'No data found for this ID';
	}
}

if(isset($_POST["submit"])) {
	
	$city_name = strtolower($_POST["city_name"]);	
	$state_id = $_POST["state_id"];	
	$pincode = $_POST["pincode"];	
	$dist_id = $_POST["dist_id"];	
	
	if($city_name!='' && $state_id!='' && $dist_id!='') {
		if(!empty($query_data) && $user_id!='') {
			$ins_data = $db->executeQuery("UPDATE user_list SET city='".$city_name."', state_id='".$state_id."', pincode='".$pincode."', dist_id='".$dist_id."' WHERE user_id='".$user_id."' ");
			//$user_id = $db->getLastInsertId();						
		} else {
			$ins_data = $db->executeQuery("INSERT INTO user_list (city, state_id, pincode, dist_id) VALUES ('".$city_name."', '".$state_id."', '".$pincode."', '".$dist_id."') ");
			$user_id = $db->getLastInsertId();			
		}
		
		if($user_id!= '') {
			$success_msg = 'User Details updated successfully !!!';
		} else {
			$error_msg = 'Unexpected Error. Please try again.';
		}
	} else {
		$error_msg = 'User Name cannot be empty !!!';
	}
}

$state_query = "SELECT state_id, state_name from state_list where status='active'; ";
$state_data = $db->fetchQuery($state_query);

$district_query = "SELECT state_id, dist_id, district from district_list where status='active'; ";
$district_data = $db->fetchQuery($district_query);
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
			
                <h2 class="lh30 mt15 text-center">Add New <b class="text-primary">User</b></h2>
               
                <div class="row">
                    <div class="col-md-9 center-block">

						<!-- Form Wizard -->
                        <div class="admin-form">

                            <form method="post" id="form-wizard">
                                <div class="wizard steps-bg clearfix steps-tabs steps-show-icons steps-justified">

                                    <!-- Wizard step 1 -->
                                    <h4 class="wizard-section-title"><i class="fa fa-user pr5"></i> Basic Info</h4>
                                    <section class="wizard-section">

                                        <div class="section">
                                            <label for="user_type" class="field-label">Select User type</label>
                                            <label for="user_type" class="field">
												<select name="user_type" id="user_type" class="gui-input">
													<option value="">Select User type</option>
													<option value="admin">Admin</option>
													<option value="customer">Customer</option>
													<option value="staff">Staff</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

										<div class="section">
                                            <label for="kctv_id" class="field-label">Enter the KCTV ID</label>
                                            <label for="kctv_id" class="field prepend-icon">
                                                <input type="text" name="kctv_id" id="kctv_id" class="gui-input" value="<?php echo isset($query_data[0]['kctv_id']) ? strtoupper($query_data[0]['kctv_id']) : '';?>">
                                                <label for="kctv_id" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
										<div class="section">
                                            <label for="caf_id" class="field-label">Enter the CAF ID</label>
                                            <label for="caf_id" class="field prepend-icon">
                                                <input type="text" name="caf_id" id="caf_id" class="gui-input" value="<?php echo isset($query_data[0]['caf_id']) ? strtoupper($query_data[0]['caf_id']) : '';?>">
                                                <label for="caf_id" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
										<div class="section">
                                            <label for="ca_id" class="field-label">Enter the CA ID</label>
                                            <label for="ca_id" class="field prepend-icon">
                                                <input type="text" name="ca_id" id="ca_id" class="gui-input" value="<?php echo isset($query_data[0]['ca_id']) ? strtoupper($query_data[0]['ca_id']) : '';?>">
                                                <label for="ca_id" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	

										<div class="section">
                                            <label for="tactv_id" class="field-label">Enter the TACTV ID</label>
                                            <label for="tactv_id" class="field prepend-icon">
                                                <input type="text" name="tactv_id" id="tactv_id" class="gui-input" value="<?php echo isset($query_data[0]['tactv_id']) ? strtoupper($query_data[0]['tactv_id']) : '';?>">
                                                <label for="tactv_id" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										


										<div class="section">
                                            <label for="eb_sc_no" class="field-label">Enter the EB SC No</label>
                                            <label for="eb_sc_no" class="field prepend-icon">
                                                <input type="text" name="eb_sc_no" id="eb_sc_no" class="gui-input" value="<?php echo isset($query_data[0]['eb_sc_no']) ? strtoupper($query_data[0]['eb_sc_no']) : '';?>">
                                                <label for="eb_sc_no" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->																		

                                    </section>
									
                                    <!-- Wizard step 2 -->
                                    <h4 class="wizard-section-title"><i class="fa fa-user pr5"></i> Personal Details</h4>
                                    <section class="wizard-section">

                                        <div class="section">
                                            <label for="user_name" class="field-label">Customer Name</label>
                                            <label for="user_name" class="field prepend-icon">
                                                <input type="text" name="user_name" id="user_name" class="gui-input" value="<?php echo isset($query_data[0]['user_name']) ? strtoupper($query_data[0]['user_name']) : '';?>">
                                                <label for="user_name" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
										<div class="section">
                                            <label for="mobile_number" class="field-label">Mobile Number</label>
                                            <label for="mobile_number" class="field prepend-icon">
                                                <input type="text" name="mobile_number" id="mobile_number" class="gui-input" value="<?php echo isset($query_data[0]['mobile_number']) ? strtoupper($query_data[0]['mobile_number']) : '';?>">
                                                <label for="mobile_number" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
										<div class="section">
                                            <label for="alternate_number" class="field-label">Alternate Mobile Number</label>
                                            <label for="alternate_number" class="field prepend-icon">
                                                <input type="text" name="alternate_number" id="alternate_number" class="gui-input" value="<?php echo isset($query_data[0]['alternate_number']) ? strtoupper($query_data[0]['alternate_number']) : '';?>">
                                                <label for="alternate_number" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										
										
										<div class="section">
                                            <label for="email_id" class="field-label">Enter the Email ID</label>
                                            <label for="email_id" class="field prepend-icon">
                                                <input type="text" name="email_id" id="email_id" class="gui-input" value="<?php echo isset($query_data[0]['email_id']) ? strtoupper($query_data[0]['email_id']) : '';?>">
                                                <label for="email_id" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	
										
										<div class="section">
                                            <label for="house_type" class="field-label">House Type</label>
                                            <label for="house_type" class="field prepend-icon">
												<select name="house_type" id="same_address" class="gui-input">
													<option value="own">Own</option>
													<option value="rent">Rent</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->											
										

										<div class="section">
                                            <label for="door_no" class="field-label">Door no</label>
                                            <label for="door_no" class="field prepend-icon">
                                                <input type="text" name="door_no" id="door_no" class="gui-input">
                                                <label for="door_no" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										


										<div class="section">
                                            <label for="street_name" class="field-label">Street Name</label>
                                            <label for="street_name" class="field prepend-icon">
                                                <input type="text" name="street_name" id="street_name" class="gui-input">
                                                <label for="street_name" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="state" class="field-label">Select State</label>
                                            <label for="state" class="field">
												<select name="state" id="state" class="gui-input">
													<option value="">Select state</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="district" class="field-label">Select District</label>
                                            <label for="district" class="field">
												<select name="district" id="district" class="gui-input">
													<option value="">Select district</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

										<div class="section">
                                            <label for="city" class="field-label">Select City</label>
                                            <label for="city" class="field prepend-icon">
												<select name="city" id="city" class="gui-input">
													<option value="">Select city</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->					

										<div class="section">
                                            <label for="pincode" class="field-label">Pin Code</label>
                                            <label for="pincode" class="field prepend-icon">
                                                <input type="text" name="pincode" id="pincode" class="gui-input">
                                                <label for="pincode" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->		

										<div class="section">
                                            <label for="same_address" class="field-label">Is Permanent Address same as above Address</label>
                                            <label for="same_address" class="field prepend-icon">
												<select name="same_address" id="same_address" class="gui-input">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->		

										<div class="section">
                                            <label for="p_door_no" class="field-label">Permanent Door no</label>
                                            <label for="p_door_no" class="field prepend-icon">
                                                <input type="text" name="p_door_no" id="p_door_no" class="gui-input">
                                                <label for="p_door_no" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										


										<div class="section">
                                            <label for="p_street_name" class="field-label">Permanent Street Name</label>
                                            <label for="p_street_name" class="field prepend-icon">
                                                <input type="text" name="p_street_name" id="p_street_name" class="gui-input">
                                                <label for="p_street_name" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="p_state" class="field-label">Select Permanent State</label>
                                            <label for="p_state" class="field">
												<select name="p_state" id="p_state" class="gui-input">
													<option value="">Select state</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="p_district" class="field-label">Select Permanent District</label>
                                            <label for="p_district" class="field">
												<select name="p_district" id="p_district" class="gui-input">
													<option value="">Select district</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

										<div class="section">
                                            <label for="p_city" class="field-label">Select Permanent City</label>
                                            <label for="p_city" class="field prepend-icon">
												<select name="p_city" id="p_city" class="gui-input">
													<option value="">Select city</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->					

										<div class="section">
                                            <label for="p_pincode" class="field-label">Permanent Pin Code</label>
                                            <label for="p_pincode" class="field prepend-icon">
                                                <input type="text" name="p_pincode" id="p_pincode" class="gui-input">
                                                <label for="p_pincode" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->												

                                    </section>									

                                    <!-- Wizard step 3 -->
                                    <h4 class="wizard-section-title"><i class="fa fa-dollar pr5"></i> Company Details</h4>
                                    <section class="wizard-section">

                                        <div class="section">
                                            <label for="company_name" class="field-label">Select Company Name</label>
                                            <label for="company_name" class="field">
												<select name="company_name" id="company_name" class="gui-input">
													<option value="">Select Company</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
                                        <div class="section">
                                            <label for="branch" class="field-label">Select Branch</label>
                                            <label for="branch" class="field">
												<select name="branch" id="branch" class="gui-input">
													<option value="">Select branch</option>
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->										

										<div class="section">
                                            <label for="tariff" class="field-label">Tariff</label>
                                            <label for="tariff" class="field prepend-icon">
                                                <input type="text" name="tariff" id="tariff" class="gui-input">
                                                <label for="tariff" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	
										
										<div class="section">
                                            <label for="advance" class="field-label">Advance</label>
                                            <label for="advance" class="field prepend-icon">
                                                <input type="text" name="advance" id="advance" class="gui-input">
                                                <label for="advance" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	

										<div class="section">
                                            <label for="balance" class="field-label">Balance</label>
                                            <label for="balance" class="field prepend-icon">
                                                <input type="text" name="balance" id="balance" class="gui-input">
                                                <label for="balance" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			

                                    </section>

                                    <!-- Wizard step 4 -->
                                    <h4 class="wizard-section-title"><i class="fa fa-shopping-cart pr5"></i> Important Dates</h4>
                                    <section class="wizard-section">

										<div class="section">
                                            <label for="installation_date" class="field-label">Installation Date</label>
                                            <label for="installation_date" class="field prepend-icon">
                                                <input type="text" name="installation_date" id="installation_date" class="gui-input">
                                                <label for="installation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			
										

										<div class="section">
                                            <label for="activation_date" class="field-label">Activation Date</label>
                                            <label for="activation_date" class="field prepend-icon">
                                                <input type="text" name="activation_date" id="activation_date" class="gui-input">
                                                <label for="activation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			

										
										<div class="section">
                                            <label for="deactivation_date" class="field-label">Deactivation Date</label>
                                            <label for="deactivation_date" class="field prepend-icon">
                                                <input type="text" name="deactivation_date" id="deactivation_date" class="gui-input">
                                                <label for="deactivation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			
										

										<div class="section">
                                            <label for="shifting_date" class="field-label">Shifting Date</label>
                                            <label for="shifting_date" class="field prepend-icon">
                                                <input type="text" name="shifting_date" id="shifting_date" class="gui-input">
                                                <label for="shifting_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			


										<div class="section">
                                            <label for="rejoint_date" class="field-label">Rejoint Date</label>
                                            <label for="rejoint_date" class="field prepend-icon">
                                                <input type="text" name="rejoint_date" id="rejoint_date" class="gui-input">
                                                <label for="rejoint_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->													

                                    </section>
                                </div>
                                <!-- End: Wizard -->

                            </form>
                            <!-- End Account2 Form -->

                        </div>
                        <!-- end: .admin-form -->					

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
  
  
              // Form Wizard 
            var form = $("#form-wizard");
            form.validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            form.children(".wizard").steps({
                headerTag: ".wizard-section-title",
                bodyTag: ".wizard-section",
                onStepChanging: function(event, currentIndex, newIndex) {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function(event, currentIndex) {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    //alert("Submitted!");
					form.submit();
                }
            });

    
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
                            user: {
                                    required: true
                            },
                            kctv_id: {
                                    required: true
                            },    
                            caf_id: {
                                    required: true
                            },                  
                            ca_id: {
                                    required: true
                            },    
                            tactv_id: {
                                    required: true
                            },    
                            eb_sc_no: {
                                    required: true
                            },    
                            user_name: {
                                    required: true
                            },    
                            mobile_number: {
                                    required: true
                            },    
                            email_id: {
                                    required: true
                            },    
                            area_id: {
                                    required: true
                            },    
                            door_no: {
                                    required: true
                            },    
                            street_name: {
                                    required: true
                            },    
                            house_type: {
                                    required: true
                            },    
                            acc_status: {
                                    required: true
                            },    
                            installation_date: {
                                    required: true
                            },    
                            activation_date: {
                                    required: true
                            },    
                            tariff_id: {
                                    required: true
                            },    
                            advance: {
                                    required: true
                            },    
                            balance: {
                                    required: true
                            },    
                            status: {
                                    required: true
                            },    
                            added_on: {
                                    required: true
                            },    
                    },
                    
                    /* @validation error messages 
                    ---------------------------------------------- */
                        
                    messages:{
                            user: {
                                    required: 'Enter the city name'
                            },
                            kctv_id: {
                                    required: 'Select the kctv id'
                            }, 
                            caf_id: {
                                    required: 'Select the caf id'
                            },                  
                            ca_id: {
                                    required: 'Select the ca id'
                            },
                            tactv_id: {
                                    required: 'Select the tactv id'
                            },
                            eb_sc_no: {
                                    required: 'Select the eb sc id'
                            },
                            user_name: {
                                    required: 'Select the username'
                            },
                            mobile_number: {
                                    required: 'Select the mobile number'
                            },
                            email_id: {
                                    required: 'Select the email id'
                            },
                            area_id: {
                                    required: 'Select the area id'
                            },
                            door_no: {
                                    required: 'Select the door number'
                            },
                            street_name: {
                                    required: 'Select the street name'
                            },
                            house_type: {
                                    required: 'Select the house type'
                            },
                            acc_status: {
                                    required: 'Select the account status'
                            },
                            installation_date: {
                                    required: 'Select the installation date'
                            },
                            activation_date: {
                                    required: 'Select the activation'
                            },
                            tariff_id: {
                                    required: 'Select the tariff'
                            },
                            advance: {
                                    required: 'Select the advance'
                            },
                            balance: {
                                    required: 'Select the balance'
                            },
                            status: {
                                    required: 'Select the status'
                            },
                            added_on: {
                                    required: 'Select the added on'
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
        
        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
