<?php
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    require_once 'header.php';
    require_once 'function2.php';
	$myProfile = json_decode(sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['GET_USER_PROFILE'] . $_SESSION['userId'], array()));
	
?>
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title">
			<div class="container">
				<div class="col-sm-7">
					<div class="page-caption">
						<h2>My Profile</h2>
						<p><a href="resume-detail.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> My Profile</p>
					</div>
				</div>
			
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		
		<!-- ====================== Resume Detail ================ -->
		<section>
			<div class="container">
				<!-- row -->
				<div class="row">
					
					<div class="col-md-8 col-sm-8">
						
						<div class="detail-wrapper">
							<div class="detail-wrapper-body">

                                <div class="col-md-3 col-sm-3">
                                    <div class="emp-pic">
                                        <img class="img-responsive img-circle width-220" style="height: 165px;" src="<?php echo $config['URLS']['API_PATH'] . 'ProfileImages/' . $myProfile->imgUrl; ?>" alt="">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="emp-des">
                                        <h3><?php echo $myProfile->name; ?></h3>
                                        <span class="theme-cl"><?php echo $myProfile->bio; ?></span>
                                        <p><?php echo $myProfile->title; ?></p>
                                        <p><?php echo $myProfile->industry; ?></p>
                                    </div>

                                    <!-- Start: Opening hour -->
                                        <div class="widget-boxed-body">
                                            <a href="edit-profile.php" class="btn btn-m theme-btn full-width mrg-bot-10"><i class="ti-pencil"></i>Edit Profile</a>
                                        </div>
                                    <!-- End: Opening hour -->
                                </div>
								
							</div>
						</div>
						
					</div>
					
					<!-- Sidebar -->
					<div class="col-md-4 col-sm-4">
						<div class="sidebar">
							
							<!-- Start: Job Overview -->
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-location-pin padd-r-10"></i>Location</h4>
								</div>
								<div class="widget-boxed-body">
									<div class="side-list no-border">
										<ul>
											<li><i class="ti-location-pin padd-r-10"></i><?php echo $myProfile->location; ?></li>
											<li><i class="ti-world padd-r-10"></i><?php echo $myProfile->email; ?></li>
											<li><i class="ti-mobile padd-r-10"></i><?php echo $myProfile->mobNo; ?></li>
										</ul>
										<h5>Share Job</h5>
										<ul class="side-list-inline no-border social-side">
											<li><a href="http://<?php echo str_replace("http://","", str_replace("https://","", $myProfile->twitterProfile)); ?>"><i class="fa fa-twitter theme-cl"></i></a></li>
											<li><a href="http://<?php echo str_replace("http://","", str_replace("https://","", $myProfile->linkedinProfile)); ?>"><i class="fa fa-linkedin theme-cl""></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End: Job Overview -->
							
							<!-- Start: Opening hour 
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-headphone padd-r-10"></i>Contact Now</h4>
								</div>
								<div class="widget-boxed-body">
									<form>
										<input type="text" class="form-control" placeholder="Enter your Name *">
										<input type="text" class="form-control" placeholder="Email Address*">
										<input type="text" class="form-control" placeholder="Phone Number">
										<textarea class="form-control height-140" placeholder="Message should have more than 50 characters"></textarea>
										<button class="btn theme-btn full-width">Send Email</button>
										<span>You accepts our <a href="resume-detail.html#" title="">Terms and Conditions</a></span>
									</form>
								</div>
							</div>
							 End: Opening hour -->
							 
						</div>
						
					</div>
					<!-- End Sidebar -->
					
				</div>
				<!-- End Row -->
				
				<!-- row -->
				<div class="row">
				
			</div>
		</section>
		
        <!-- ====================== End Resume Detail ================ -->
<?php
    require_once 'footer.php';
?>