<?php
require_once('framework/database/init.php');

global $db;

$error_msg = $success_msg = '';
$state_id = '';
if(isset($_GET['sid'])) {
	$state_id = $_GET['sid'];
	$select_query = "SELECT state_id, state_name from state_list where status='active' AND state_id='".$state_id."'; ";
	$query_data = $db->fetchQuery($select_query);
	
	if(empty($query_data)) {
		$error_msg = 'No data found for this ID';
	}
}

if(isset($_POST["submit"])) {
	
	$state_name = strtolower($_POST["state_name"]);	
	
	if($state_name!='') {
		if(!empty($query_data) && $state_id!='') {
			$ins_data = $db->executeQuery("UPDATE state_list SET state_name='".$state_name."' WHERE state_id='".$state_id."' ");
			//$state_id = $db->getLastInsertId();						
		} else {
			$ins_data = $db->executeQuery("INSERT INTO state_list (state_name) VALUES ('".$state_name."') ");
			$state_id = $db->getLastInsertId();			
		}
		
		if($state_id!= '') {
			$success_msg = 'State Details updated successfully !!!';
			$select_query = "SELECT state_id, state_name from state_list where status='active' AND state_id='".$state_id."'; ";
			$query_data = $db->fetchQuery($select_query);			
		} else {
			$error_msg = 'Unexpected Error. Please try again.';
		}
	} else {
		$error_msg = 'State Name cannot be empty !!!';
	}
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

                <h2 class="lh30 mt15 text-center">Add New <b class="text-primary">State</b></h2>
                
                <div class="row">
                    <div class="col-md-9 center-block">


                        <!-- Form Wizard -->
                        <div class="admin-form theme-primary">

                            <div class="panel">
                
                                <form method="post" id="admin-form">
                                    <div class="panel-body">
                                    
                                        <div class="section-divider mb40 mt20"><span> Add New State </span></div><!-- .section-divider -->
                                        
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="state_name" class="field prepend-icon">
                                                    <input type="text" name="state_name" id="state_name" class="gui-input" placeholder="Enter State Name..." value="<?php echo isset($query_data[0]['state_name']) ? strtoupper($query_data[0]['state_name']) : '';?>">
                                                    <label for="state_name" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 
                                        
                                             
                                   
                                    <div class="panel-footer text-right">
                                        <button type="submit" name="submit" value="submit" class="button btn-primary"> Save State </button>
                                        <a href="state_listing.php"><button type="button" class="button"> Cancel </button></a>
                                    </div><!-- end .form-footer section -->
                                </form>

                            </div>

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
                            state_name: {
                                    required: true
                            },
                                                                                       
                    },
                    
                    /* @validation error messages 
                    ---------------------------------------------- */
                        
                    messages:{
                            state_name: {
                                    required: 'Enter state name'
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
