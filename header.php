<?php
	session_start();
	require_once 'config.php'; 
	require_once 'function2.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">


    <title>Tecish - B2B Rating and Reviews</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	
	<!-- Bootsnav -->
    <link href="assets/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
	
    <!-- Icons -->
    <link href="assets/plugins/icons/css/icons.css" rel="stylesheet">
	
	<!-- Bootstrap wysihtml5 ditor-->
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap-wysihtml5.css">
    
    <!-- Animate -->
    <link href="assets/plugins/animate/animate.css" rel="stylesheet">
	
	<!-- Nice Select Option css -->
	<link rel="stylesheet" href="assets/plugins/nice-select/css/nice-select.css">	
	
	<!-- Date Dropper -->
    <link href="assets/plugins/date-dropper/datedropper.css" rel="stylesheet">
	
	<!-- Aos Css -->
    <link href="assets/plugins/aos-master/aos.css" rel="stylesheet">

	<!-- Slick Slider -->
    <link href="assets/plugins/slick-slider/slick.css" rel="stylesheet">	
	
	<!-- autocomplete tag input -->
	<link href="assets/plugins/tag-input/css/bootstrap-tagsinput.css" rel="stylesheet">	
    <link href="assets/plugins/tag-input/css/typeahead.css" rel="stylesheet">	
	
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsiveness.css" rel="stylesheet">
	
	<!-- Custom Color -->
    <link href="assets/css/skin/default.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
	<style>
		.twitter-typeahead { display:initial !important; }
		.bootstrap-tagsinput {line-height:40px;display:block !important;}
		.bootstrap-tagsinput .tag {background:#09F;padding:5px;border-radius:4px;}
		.tt-hint {top:2px !important;}
		.tt-input{vertical-align:baseline !important;}
		.typeahead { border: 1px solid #CCCCCC;border-radius: 4px;padding: 8px 12px;width: 300px;font-size:1.5em;}
		.tt-menu { width:300px; }
		span.twitter-typeahead .tt-suggestion {padding: 10px 20px;	border-bottom:#CCC 1px solid;cursor:pointer;}
		span.twitter-typeahead .tt-suggestion:last-child { border-bottom:0px; }
		.demo-label {font-size:1.5em;color: #686868;font-weight: 500;}	
	</style>
	
	</head>
	
	<body>
		
		<!-- ======================= Start Navigation ===================== -->
		<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
			<div class="container">
			
				<!-- Start Logo Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="index.php">
						<img src="assets/img/logo.png" class="logo logo-display" alt="">
						<img src="assets/img/logo.png" class="logo logo-scrolled" alt="">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					
					<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
						<!--
						<li class="dropdown">
							<a href="create-company.html#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="index.html">Home 1</a></li>
								<li><a href="home-2.html">Home 2</a></li>
								<li><a href="home-3.html">Home 3</a></li>
								<li><a href="home-4.html">Home 4</a></li>
								<li><a href="freelancer.html">Freelancer</a></li>
							</ul>
						</li>
					
						<li class="dropdown">
							<a href="create-company.html#" class="dropdown-toggle" data-toggle="dropdown">Employer</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="create-job.html">Create Job</a></li>
								<li><a href="manage-job.html">Manage Jobs</a></li>
								<li><a href="employer-detail.html">Employer Detail</a></li>
								<li><a href="manage-resume.html">Manage Resumes</a></li>
								<li><a href="resume-detail.html">Resume Detail</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="create-company.html#" class="dropdown-toggle" data-toggle="dropdown">Candidate</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="browse-job.html">Browse Jobs</a></li>
								<li><a href="create-company.html">Create Company</a></li>
								<li><a href="browse-category.html">Browse Categories</a></li>
								<li><a href="create-resume.html">Create Resume</a></li>
								<li><a href="manage-resume.html">Manage Resume</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="create-company.html#" class="dropdown-toggle" data-toggle="dropdown">Extra</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="candidate.html">Candidate</a></li>
								<li><a href="profile-settings.html">Profile Settings</a></li>
								<li><a href="employer.html">Employer</a></li>
								<li><a href="featured-job.html">Featured Job</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="job-view-cart.html">Job View Cart</a></li>
								<li><a href="job-detail-2.html">Job Detail 2</a></li>
								<li><a href="job-layout-one.html">Job Layout One</a></li>
								<li><a href="job-layout-two.html">Job Layout Two</a></li>
								<li><a href="job-layout-three.html">Job Layout Three</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="create-company.html#" class="dropdown-toggle" data-toggle="dropdown">UI Elements</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="icons.html">Icons</a></li>
								<li><a href="404.html">404</a></li>
								<li><a href="pricing.html">Pricing</a></li>
								<li><a href="job-detail.html">Job Detail</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="blog-detail.html">Blog Detail</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="component.html">Component</a></li>
								<li><a href="typography.html">Typography</a></li>
							</ul>
						</li>
						-->
					</ul>
					
				
					<ul class="nav navbar-nav navbar-right">
`						
						<li class="br-right">
							<a href="blogs.php">Blogs</a>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services</a>
							<ul class="dropdown-menu animated fadeOutUp">
								
								<?php					
									$url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'];
															
									$data = sendGetRequest($url, array());
									
									$json = json_decode($data);
								
									$json = $json->data;
					
									foreach($json as $obj) {
										// echo "<script>console.log('vipul')</script>"  ;     
										echo "<li><a href='search-result.php?q=" . $obj->name . "'>" . $obj->name . "</a></li>";
									}   
									
								?>

								<?php
									//$url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'];
									//$data = file_get_contents($url);
									//$json = json_decode($data, true);
									
									//foreach($json as $obj) {
										//echo "<li><a href='browse-company.php?q=" . $obj['_id'] . "'>" . $obj['name'] . "</a></li>";
									//}    
									
								?>

							</ul>
						</li>

						<?php 
							if (isset($_SESSION['fullName'])) {
								?>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['fullName']; ?></a>
									<ul class="dropdown-menu animated fadeOutUp">
										<li><a href="my-profile.php">My Profile</a></li>
										<li><a href="my-company.php">My Company</a></li>
										<li><a href="add-solution.php">My Solution</a></li>
										<li><a href="my-references.php">References</a></li>
										<li><a href="add-portfolio.php">Portfolio</a></li>
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</li>

								<li class="sign-up"><a class="btn-signup red-btn" href="review.php"><span class="fa fa-pencil"></span>Write A Review</a></li>
								<?php
							}
							else {
								?>
								<li class="br-right"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
								<li class="sign-up"><a class="btn-signup red-btn" href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><span class="fa fa-pencil"></span>Write A Review</a></li>
								<?php
							} 
						?>
					</ul>
						
				</div>
				<!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- ======================= End Navigation ===================== -->