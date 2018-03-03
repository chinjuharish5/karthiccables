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

                <h2 class="lh30 mt15 text-center">Add New <b class="text-primary">City</b></h2>
               
                <div class="row">
                    <div class="col-md-9 center-block">


                        <!-- Form Wizard -->
                        <div class="admin-form theme-primary">

                            <div class="panel">
                
                                <form method="post" action="/" id="admin-form">
                                    <div class="panel-body">
                                    
                                        <div class="section-divider mb40 mt20"><span> Add New User </span></div><!-- .section-divider -->
                                        
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="user" class="field prepend-icon">
                                                    <input type="text" name="user" id="user" class="gui-input" placeholder="Enter the user...">
                                                    <label for="user" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 
										
                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="kctv_id" class="field prepend-icon">
                                                    <input type="text" name="kctv_id" id="kctv_id" class="gui-input" placeholder="Enter the KCTV ID...">
                                                    <label for="kctv_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 	

                                        <div class="section row">
                                            <div class="col-md-12">
                                                <label for="caf_id" class="field prepend-icon">
                                                    <input type="text" name="caf_id" id="caf_id" class="gui-input" placeholder="Enter the CAF ID...">
                                                    <label for="caf_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->
										
										 <div class="section row">
                                            <div class="col-md-12">
                                                <label for="ca_id" class="field prepend-icon">
                                                    <input type="text" name="ca_id" id="ca_id" class="gui-input" placeholder="Enter the CA ID...">
                                                    <label for="ca_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 
  										 
										 <div class="section row">
                                            <div class="col-md-12">
                                                <label for="tactv_id" class="field prepend-icon">
                                                    <input type="text" name="tactv_id" id="tactv_id" class="gui-input" placeholder="Enter the TACTV ID...">
                                                    <label for="tactv_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->                                                              

										 <div class="section row">
                                            <div class="col-md-12">
                                                <label for="ec_sc_no" class="field prepend-icon">
                                                    <input type="text" name="ec_sc_no" id="ec_sc_no" class="gui-input" placeholder="Enter the ec_sc_no...">
                                                    <label for="ec_sc_no" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 

  										 <div class="section row">
                                            <div class="col-md-12">
                                                <label for="user_name" class="field prepend-icon">
                                                    <input type="text" name="user_name" id="user_name" class="gui-input" placeholder="Enter the user_name...">
                                                    <label for="user_name" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 
  
  										 <div class="section row">
                                            <div class="col-md-12">
                                                <label for="mobile_number" class="field prepend-icon">
                                                    <input type="text" name="mobile_number" id="mobile_number" class="gui-input" placeholder="Enter the mobile_number...">
                                                    <label for="mobile_number" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section --> 

                                         <div class="section row">
                                            <div class="col-md-12">
                                                <label for="email_id" class="field prepend-icon">
                                                    <input type="text" name="email_id" id="email_id" class="gui-input" placeholder="Enter the email_id...">
                                                    <label for="email_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->
                                         <div class="section row">
                                            <div class="col-md-12">
                                                <label for="area_id" class="field prepend-icon">
                                                    <input type="text" name="area_id" id="area_id" class="gui-input" placeholder="Enter the area_id...">
                                                    <label for="area_id" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->
										
										
										<div class="section row">
                                            <div class="col-md-12">
                                                <label for="door_no" class="field prepend-icon">
                                                    <input type="text" name="door_no" id="door_no" class="gui-input" placeholder="Enter the door_no...">
                                                    <label for="door_no" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->
										
								         <div class="section row">
                                            <div class="col-md-12">
                                                <label for="street_name" class="field prepend-icon">
                                                    <input type="text" name="street_name" id="street_name" class="gui-input" placeholder="Enter the street_name...">
                                                    <label for="street_name" class="field-icon"><i class="fa fa-user"></i></label>  
                                                </label>
                                            </div><!-- end section -->
                                            
                                        </div><!-- end .section row section -->


  
       




  
                                      <div class="section">
                                            <label class="field select">
                                                <select id="street_name" name="street_name">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->           

                                      <div class="section">
                                            <label class="field select">
                                                <select id="house_type" name="house_type">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->     
                                      
                                     <div class="section">
                                            <label class="field select">
                                                <select id="acc_status" name="acc_status">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->     


                                      <div class="section">
                                            <label class="field select">
                                                <select id="installation_date" name="installation_date">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->           

                                      <div class="section">
                                            <label class="field select">
                                                <select id="activation_date" name="activation_date">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section --> 

                                      <div class="section">
                                            <label class="field select">
                                                <select id="tariff_id" name="tariff_id">
                                                    <option value="">Select user...</option>   
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->    
  
                                      <div class="section">
                                            <label class="field select">
                                                <select id="advance" name="advance">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->           

                                      <div class="section">
                                            <label class="field select">
                                                <select id="balance" name="balance">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->     
                                      
                                     <div class="section">
                                            <label class="field select">
                                                <select id="status" name="status">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->   

                                     <div class="section">
                                            <label class="field select">
                                                <select id="added_on" name="added_on">
                                                    <option value="">Select user...</option>
                                                </select>
                                                <i class="arrow double"></i>                    
                                            </label>  
                                        </div><!-- end section -->    

                                                            
                                    </div><!-- end .form-body section -->
                                    <div class="panel-footer text-right">
                                        <button type="submit" name="submit" value="submit" class="button btn-primary"> save user </button>
                                        <button type="reset" class="button"> Cancel </button>
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
