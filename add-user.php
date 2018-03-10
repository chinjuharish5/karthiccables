<?php
require_once('framework/database/init.php');

global $db;

$error_msg = $success_msg = '';
$user_id = '';
if(isset($_GET['uid'])) {
	$user_id = $_GET['uid'];
	$select_query = "SELECT u.kctv_id, u.caf_id, u.ca_id, u.tactv_id, u.eb_sc_no, u.cylinder_no, u.user_name, u.user_type, u.mobile_number, u.alternate_number, u.email_id, u.door_no, u.street_name, u.city_id, u.state_id, u.dist_id, u.same_address, u.p_door_no, u.p_street_name, u.p_city_id, u.p_state_id, u.p_dist_id, u.area_id, u.company_id, u.house_type, u.tariff_id, t.tariff, u.advance, u.balance, u.status, u.added_on, u.acc_status, u.installation_date, u.activation_date, a.area, c.pincode, cl.pincode as p_pincode FROM user_list u JOIN `area` a ON u.area_id=a.area_id JOIN tariff_list t ON t.tariff_id=u.tariff_id JOIN city_list c ON u.city_id=c.city_id JOIN city_list cl ON u.city_id=cl.city_id WHERE u.status='active' AND a.status='active' AND t.status='active' AND c.status='active' AND cl.status='active' AND u.user_id='".$user_id."'; ";
	$query_data = $db->fetchQuery($select_query);
	
	if(empty($query_data)) {
		$error_msg = 'No data found for this ID';
	}
}

if(isset($_POST["user_name"])) {
	// Wiz 1
	$user_type = strtolower($_POST["user_type"]);
	$kctv_id = $_POST['kctv_id'];
	$caf_id = $_POST['caf_id'];
	$ca_id = $_POST['ca_id'];
	$tactv_id = $_POST['tactv_id'];
	$eb_sc_no = $_POST['eb_sc_no'];
	$cylinder_no = $_POST['cylinder_no'];
	
	// Wiz 2
	$user_name = strtolower($_POST["user_name"]);	
	$mobile_number = $_POST['mobile_number'];
	$alternate_number = $_POST['alternate_number'];
	$email_id = strtolower($_POST['email_id']);
	$house_type = strtolower($_POST['house_type']);
	$area_id = $_POST['area_id'];
	$door_no = $_POST['door_no'];
	$street_name = strtolower($_POST['street_name']);
	$state_id = $_POST['state'];
	$dist_id = $_POST['district'];
	$city_id = $_POST['city'];
	//$pincode = $_POST['pincode'];
	$same_address = strtolower($_POST['same_address']);
	$p_door_no = $_POST['p_door_no'];
	$p_street_name = strtolower($_POST['p_street_name']);
	$p_state_id = $_POST['p_state'];
	$p_dist_id = $_POST['p_district'];
	$p_city_id = $_POST['p_city'];
	//$p_pincode = $_POST['p_pincode'];	
	
	// Wiz 3
	$company_name = strtolower($_POST['company_name']);
	$branch = strtolower($_POST['branch']);
	$tariff_id = $_POST['tariff'];
	$advance = $_POST['advance'];
	$balance = $_POST['balance'];
	
	// Wiz 4
	$installation_date = $_POST['installation_date'];
	
	if($user_name!='') {
		if(!empty($query_data) && $user_id!='') {
			$update_query = "UPDATE user_list SET user_type='".$user_type."', kctv_id='".$kctv_id."', caf_id='".$caf_id."', ca_id='".$ca_id."', tactv_id='".$tactv_id."', eb_sc_no='".$eb_sc_no."', cylinder_no='".$cylinder_no."', user_name='".$user_name."', mobile_number='".$mobile_number."', alternate_number='".$alternate_number."', email_id='".$email_id."', house_type='".$house_type."', door_no='".$door_no."', street_name='".$street_name."', state_id='".$state_id."', dist_id='".$dist_id."', city_id='".$city_id."', same_address='".$same_address."', p_door_no='".$p_door_no."', p_street_name='".$p_street_name."', p_state_id='".$p_state_id."', p_dist_id='".$p_dist_id."', p_city_id='".$p_city_id."', company_id='".$company_name."', tariff_id='".$tariff_id."', advance='".$advance."', balance='".$balance."', installation_date='".$installation_date."', area_id='".$area_id."' WHERE user_id='".$user_id."' ";
			//echo $update_query;exit;
			$ins_data = $db->executeQuery($update_query);
			//$user_id = $db->getLastInsertId();						
		} else {
			$ins_query = "INSERT INTO user_list (user_type, kctv_id, caf_id, ca_id, tactv_id, eb_sc_no, cylinder_no, user_name, mobile_number, alternate_number, email_id, house_type, door_no, street_name, state_id, dist_id, city_id, same_address, p_door_no, p_street_name, p_state_id, p_dist_id, p_city_id, company_id, tariff_id, advance, balance, installation_date, area_id) VALUES ('".$user_type."', '".$kctv_id."', '".$caf_id."', '".$ca_id."', '".$tactv_id."', '".$eb_sc_no."', '".$cylinder_no."', '".$user_name."', '".$mobile_number."', '".$alternate_number."', '".$email_id."', '".$house_type."', '".$door_no."', '".$street_name."', '".$state_id."', '".$dist_id."', '".$city_id."', '".$same_address."', '".$p_door_no."', '".$p_street_name."', '".$p_state_id."', '".$p_dist_id."', '".$p_city_id."', '".$company_name."', '".$tariff_id."', '".$advance."', '".$balance."', '".$installation_date."', '".$area_id."') ";
			//echo $ins_query;exit;
			$ins_data = $db->executeQuery($ins_query);
			$user_id = $db->getLastInsertId();
		}
		
		if($user_id!= '') {
			$success_msg = 'User Details updated successfully !!!';
			$select_query = "SELECT u.kctv_id, u.caf_id, u.ca_id, u.tactv_id, u.eb_sc_no, u.cylinder_no, u.user_name, u.user_type, u.mobile_number, u.alternate_number, u.email_id, u.door_no, u.street_name, u.city_id, u.state_id, u.dist_id, u.same_address, u.p_door_no, u.p_street_name, u.p_city_id, u.p_state_id, u.p_dist_id, u.area_id, u.company_id, u.house_type, u.tariff_id, t.tariff, u.advance, u.balance, u.status, u.added_on, u.acc_status, u.installation_date, u.activation_date, a.area, c.pincode, cl.pincode as p_pincode FROM user_list u JOIN `area` a ON u.area_id=a.area_id JOIN tariff_list t ON t.tariff_id=u.tariff_id JOIN city_list c ON u.city_id=c.city_id JOIN city_list cl ON u.city_id=cl.city_id WHERE u.status='active' AND a.status='active' AND t.status='active' AND c.status='active' AND cl.status='active' AND u.user_id='".$user_id."'; ";
			$query_data = $db->fetchQuery($select_query);			
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

$city_query = "SELECT state_id, dist_id, city_id, city from city_list where status='active'; ";
$city_data = $db->fetchQuery($city_query);

$company_query = "SELECT company_id, company_name, branch from company_list where status='active'; ";
$company_data = $db->fetchQuery($company_query);

$tariff_query = "SELECT tariff_id, tariff, amount from tariff_list where status='active'; ";
$tariff_data = $db->fetchQuery($tariff_query);

$area_query = "SELECT area_id, area, area_code from area where status='active'; ";
$area_data = $db->fetchQuery($area_query);
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
													<option value="admin" <?php if(isset($query_data[0]['user_type'])) { if($query_data[0]['user_type']=='admin') { echo 'selected="selected"'; } } ?>>Admin</option>
													<option value="customer" <?php if(isset($query_data[0]['user_type'])) { if($query_data[0]['user_type']=='customer') { echo 'selected="selected"'; } } ?>>Customer</option>
													<option value="staff" <?php if(isset($query_data[0]['user_type'])) { if($query_data[0]['user_type']=='staff') { echo 'selected="selected"'; } } ?>>Staff</option>
													<option value="rent_staff" <?php if(isset($query_data[0]['user_type'])) { if($query_data[0]['user_type']=='rent_staff') { echo 'selected="selected"'; } } ?>>Rent House Staff</option>
													<option value="own_staff" <?php if(isset($query_data[0]['user_type'])) { if($query_data[0]['user_type']=='own_staff') { echo 'selected="selected"'; } } ?>>Own House Staff</option>
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

										<div class="section">
                                            <label for="cylinder_no" class="field-label">Enter the Cylinder No</label>
                                            <label for="cylinder_no" class="field prepend-icon">
                                                <input type="text" name="cylinder_no" id="cylinder_no" class="gui-input" value="<?php echo isset($query_data[0]['cylinder_no']) ? strtoupper($query_data[0]['cylinder_no']) : '';?>">
                                                <label for="cylinder_no" class="field-icon"><i class="fa fa-lock"></i>
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
												<select name="house_type" id="house_type" class="gui-input">
													<option value="own" <?php if(isset($query_data[0]['house_type'])) { if($query_data[0]['house_type']=='own') { echo 'selected="selected"'; } } ?>>Own</option>
													<option value="rent" <?php if(isset($query_data[0]['house_type'])) { if($query_data[0]['house_type']=='rent') { echo 'selected="selected"'; } } ?>>Rent</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			

                                        <div class="section">
                                            <label for="area_id" class="field-label">Select Area</label>
                                            <label for="area_id" class="field">
												<select name="area_id" id="area_id" class="gui-input">
													<option value="">Select area</option>
													<?php foreach($area_data as $s_data) { ?>
														<option value="<?php echo $s_data['area_id']; ?>" <?php if(isset($query_data[0]['area_id'])) { if($query_data[0]['area_id']==$s_data['area_id']) { echo 'selected="selected"'; } } ?>><?php echo $s_data['area_code']." - ".strtoupper($s_data['area']); ?></option>
													<?php } ?>													
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->										
										

										<div class="section">
                                            <label for="door_no" class="field-label">Door no</label>
                                            <label for="door_no" class="field prepend-icon">
                                                <input type="text" name="door_no" id="door_no" class="gui-input" value="<?php echo isset($query_data[0]['door_no']) ? strtoupper($query_data[0]['door_no']) : '';?>">
                                                <label for="door_no" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										


										<div class="section">
                                            <label for="street_name" class="field-label">Street Name</label>
                                            <label for="street_name" class="field prepend-icon">
                                                <input type="text" name="street_name" id="street_name" class="gui-input" value="<?php echo isset($query_data[0]['street_name']) ? strtoupper($query_data[0]['street_name']) : '';?>">
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
													<?php foreach($state_data as $s_data) { ?>
														<option value="<?php echo $s_data['state_id']; ?>" <?php if(isset($query_data[0]['state_id'])) { if($query_data[0]['state_id']==$s_data['state_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['state_name']); ?></option>
													<?php } ?>													
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="district" class="field-label">Select District</label>
                                            <label for="district" class="field">
												<select name="district" id="district" class="gui-input">
													<option value="">Select district</option>
													<?php foreach($district_data as $s_data) { ?>
														<option value="<?php echo $s_data['dist_id']; ?>" state_id="<?php echo $s_data['state_id']; ?>" <?php if(isset($query_data[0]['dist_id'])) { if($query_data[0]['dist_id']==$s_data['dist_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['district']); ?></option>
													<?php } ?>														
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

										<div class="section">
                                            <label for="city" class="field-label">Select City</label>
                                            <label for="city" class="field prepend-icon">
												<select name="city" id="city" class="gui-input">
													<option value="">Select city</option>
													<?php foreach($city_data as $s_data) { ?>
														<option value="<?php echo $s_data['city_id']; ?>" dist_id="<?php echo $s_data['dist_id']; ?>" <?php if(isset($query_data[0]['city_id'])) { if($query_data[0]['city_id']==$s_data['city_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['city']); ?></option>
													<?php } ?>														
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->					

										<div class="section">
                                            <label for="pincode" class="field-label">Pin Code</label>
                                            <label for="pincode" class="field prepend-icon">
                                                <input type="text" name="pincode" id="pincode" class="gui-input" value="<?php echo isset($query_data[0]['pincode']) ? strtoupper($query_data[0]['pincode']) : '';?>">
                                                <label for="pincode" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->		

										<div class="section">
                                            <label for="same_address" class="field-label">Is Permanent Address same as above Address</label>
                                            <label for="same_address" class="field prepend-icon">
												<select name="same_address" id="same_address" class="gui-input">
													<option value="yes" <?php if(isset($query_data[0]['same_address'])) { if($query_data[0]['same_address']=='yes') { echo 'selected="selected"'; } } ?>>Yes</option>
													<option value="no" <?php if(isset($query_data[0]['same_address'])) { if($query_data[0]['same_address']=='no') { echo 'selected="selected"'; } } ?>>No</option>
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->		

										<div class="section is_permanent" style="display:none">
                                            <label for="p_door_no" class="field-label">Permanent Door no</label>
                                            <label for="p_door_no" class="field prepend-icon">
                                                <input type="text" name="p_door_no" id="p_door_no" class="gui-input" value="<?php echo isset($query_data[0]['p_door_no']) ? strtoupper($query_data[0]['p_door_no']) : '';?>">
                                                <label for="p_door_no" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->										


										<div class="section is_permanent" style="display:none">
                                            <label for="p_street_name" class="field-label">Permanent Street Name</label>
                                            <label for="p_street_name" class="field prepend-icon">
                                                <input type="text" name="p_street_name" id="p_street_name" class="gui-input" value="<?php echo isset($query_data[0]['p_street_name']) ? strtoupper($query_data[0]['p_street_name']) : '';?>">
                                                <label for="p_street_name" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section is_permanent" style="display:none">
                                            <label for="p_state" class="field-label">Select Permanent State</label>
                                            <label for="p_state" class="field">
												<select name="p_state" id="p_state" class="gui-input">
													<option value="">Select state</option>
													<?php foreach($state_data as $s_data) { ?>
														<option value="<?php echo $s_data['state_id']; ?>" <?php if(isset($query_data[0]['p_state_id'])) { if($query_data[0]['p_state_id']==$s_data['state_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['state_name']); ?></option>
													<?php } ?>															
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section is_permanent" style="display:none">
                                            <label for="p_district" class="field-label">Select Permanent District</label>
                                            <label for="p_district" class="field">
												<select name="p_district" id="p_district" class="gui-input">
													<option value="">Select district</option>
													<?php foreach($district_data as $s_data) { ?>
														<option value="<?php echo $s_data['dist_id']; ?>" state_id="<?php echo $s_data['p_state_id']; ?>" <?php if(isset($query_data[0]['p_dist_id'])) { if($query_data[0]['p_dist_id']==$s_data['dist_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['district']); ?></option>
													<?php } ?>														
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->

										<div class="section is_permanent" style="display:none">
                                            <label for="p_city" class="field-label">Select Permanent City</label>
                                            <label for="p_city" class="field prepend-icon">
												<select name="p_city" id="p_city" class="gui-input">
													<option value="">Select city</option>
													<?php foreach($city_data as $s_data) { ?>
														<option value="<?php echo $s_data['city_id']; ?>" dist_id="<?php echo $s_data['p_dist_id']; ?>" <?php if(isset($query_data[0]['p_city_id'])) { if($query_data[0]['p_city_id']==$s_data['city_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['city']); ?></option>
													<?php } ?>													
												</select>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->					

										<div class="section is_permanent" style="display:none">
                                            <label for="p_pincode" class="field-label">Permanent Pin Code</label>
                                            <label for="p_pincode" class="field prepend-icon">
                                                <input type="text" name="p_pincode" id="p_pincode" class="gui-input" value="<?php echo isset($query_data[0]['p_pincode']) ? strtoupper($query_data[0]['p_pincode']) : '';?>">
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
													<?php foreach($company_data as $s_data) { ?>
														<option value="<?php echo $s_data['company_id']; ?>" <?php if(isset($query_data[0]['company_id'])) { if($query_data[0]['company_id']==$s_data['company_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['company_name']); ?></option>
													<?php } ?>													
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->
										
                                        <div class="section">
                                            <label for="branch" class="field-label">Select Branch</label>
                                            <label for="branch" class="field">
												<select name="branch" id="branch" class="gui-input">
													<option value="">Select branch</option>
													<?php foreach($company_data as $s_data) { ?>
														<option value="<?php echo $s_data['company_id']; ?>" <?php if(isset($query_data[0]['company_id'])) { if($query_data[0]['company_id']==$s_data['company_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['branch']); ?></option>
													<?php } ?>																				
												</select>
                                            </label>
                                        </div>
                                        <!-- end section -->										

										<div class="section">
                                            <label for="tariff" class="field-label">Tariff</label>
                                            <label for="tariff" class="field prepend-icon">											
												<select name="tariff" id="tariff" class="gui-input">
													<option value="">Select tariff</option>
													<?php foreach($tariff_data as $s_data) { ?>
														<option value="<?php echo $s_data['tariff_id']; ?>" <?php if(isset($query_data[0]['tariff_id'])) { if($query_data[0]['tariff_id']==$s_data['tariff_id']) { echo 'selected="selected"'; } } ?>><?php echo strtoupper($s_data['tariff']); ?></option>
													<?php } ?>																				
												</select>												
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	
										
										<div class="section">
                                            <label for="advance" class="field-label">Advance</label>
                                            <label for="advance" class="field prepend-icon">
                                                <input type="text" name="advance" id="advance" class="gui-input" value="<?php echo isset($query_data[0]['advance']) ? strtoupper($query_data[0]['advance']) : '';?>">
                                                <label for="advance" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->	

										<div class="section">
                                            <label for="balance" class="field-label">Balance</label>
                                            <label for="balance" class="field prepend-icon">
                                                <input type="text" name="balance" id="balance" class="gui-input" value="<?php echo isset($query_data[0]['balance']) ? strtoupper($query_data[0]['balance']) : '';?>">
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
                                                <input type="text" name="installation_date" id="installation_date" class="gui-input" value="<?php echo isset($query_data[0]['installation_date']) ? strtoupper($query_data[0]['installation_date']) : '';?>">
                                                <label for="installation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			
										

										<div class="section">
                                            <label for="activation_date" class="field-label">Activation Date</label>
                                            <label for="activation_date" class="field prepend-icon">
                                                <input type="text" name="activation_date" id="activation_date" class="gui-input" value="<?php echo isset($query_data[0]['activation_date']) ? strtoupper($query_data[0]['activation_date']) : '';?>">
                                                <label for="activation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			

										
										<div class="section">
                                            <label for="deactivation_date" class="field-label">Deactivation Date</label>
                                            <label for="deactivation_date" class="field prepend-icon">
                                                <input type="text" name="deactivation_date" id="deactivation_date" class="gui-input" value="<?php echo isset($query_data[0]['deactivation_date']) ? strtoupper($query_data[0]['deactivation_date']) : '';?>">
                                                <label for="deactivation_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			
										

										<div class="section">
                                            <label for="shifting_date" class="field-label">Shifting Date</label>
                                            <label for="shifting_date" class="field prepend-icon">
                                                <input type="text" name="shifting_date" id="shifting_date" class="gui-input" value="<?php echo isset($query_data[0]['shifting_date']) ? strtoupper($query_data[0]['shifting_date']) : '';?>">
                                                <label for="shifting_date" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->			


										<div class="section">
                                            <label for="rejoint_date" class="field-label">Rejoint Date</label>
                                            <label for="rejoint_date" class="field prepend-icon">
                                                <input type="text" name="rejoint_date" id="rejoint_date" class="gui-input" value="<?php echo isset($query_data[0]['rejoint_date']) ? strtoupper($query_data[0]['rejoint_date']) : '';?>">
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
	$(document).on('change','#same_address',function(){
		$('.is_permanent').hide();
		if($('#same_address').val()=='no') {
			$('.is_permanent').show();
		}
	});
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
        });		
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
