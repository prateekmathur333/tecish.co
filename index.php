<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	require_once 'header.php';
	$url = $config['URLS']['API_PATH'] . $config['URLS']['FEATURED_BLOG'] . "TopItCompanies";
	//echo $url;
	$featuredCompanyBlogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$featuredCompanyBlogs = $featuredCompanyBlogs->data;

	$url = $config['URLS']['API_PATH'] . $config['URLS']['FEATURED_BLOG'] . "TechnicalBlog";
	//echo $url;
	$featuredTechBlogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$featuredTechBlogs = $featuredTechBlogs->data;
?>		

	<style>
		.main-banner {
			background-color: #59676f !important;
			background-image:url(assets/img/banner.jpg);
		}
	</style>
		<!-- ======================= Start Banner ===================== -->
		<div class="main-banner">
			<div class="container">
				<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
				
					<div class="caption text-center cl-white">
						<h2>Find Trusted Development Company.</h2>
						<p>Develop your apps, website or software with handpicked development companies verified and ranked by Tecish.</p>
					</div>
					
					<form action="search-result.php" method="get">
						<fieldset class="home-form-1 icon-field">
						
							<div class="col-md-6 col-sm-4 padd-0">
								<div class="form-group">
									<div class="icon-addon addon-lg">
										<input type="text" class="form-control br-1" name="q" placeholder="Skills, Designation, Companies" />
										<label class="fa fa-pencil"></label>
									</div>
								</div>
								
							</div>
																
							<div class="col-md-4 col-sm-3 padd-0">
								<div class="form-group">
									<div class="icon-addon addon-lg">
										<select class="wide form-control" name="cat">
											<option data-display="Category" value="">Show All</option>
											
											<?php					
												$url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'];
																		
												$data = sendGetRequest($url, array());
												
												$json = json_decode($data);
											
												$json = $json->data;
								
												foreach($json as $obj) {
													// echo "<script>console.log('vipul')</script>"  ;     
													echo "<option value='" . $obj->name . "'>" . $obj->name . "</option>";
												}   
												
											?>
										</select>
										<label class="fa fa-crosshairs"></label>
									</div>
								</div>
							</div>
								
							<div class="col-md-2 col-sm-2 padd-0">
								<input type="hidden" name="minProjectPrice" value="0">
								<input type="hidden" name="avgPricePerHour" value="0">
								<input type="hidden" name="noOfEmp" value="0">
								<button type="submit" class="btn theme-btn cl-white seub-btn">FIND COMPANY</button>
							</div>
								
						</fieldset>
					</form>
					
					<div class="text-center">
						<div class="choose-opt">
							<div class="choose-opt-box"><span>OR</span></div>
						</div>
						<a href="#" class="btn btn-hiring btn-m mrg-5"><span class="ti-briefcase padd-r-5"></span>Get Listed</a>
					</div>
					
				</div>
			</div>
		</div>
		<!-- ======================= End Banner ===================== -->
		
		<!-- ====================== How It Work ================= -->
		<section class="how-it-works">
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>How Tecish Help?</h2>
							<p>Finding an appropriate development company with good ratings and trust record is Key for the success of your next unicorn project. We help you right there.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
				
					<div class="col-md-3 col-sm-3">
						<div class="work-process">
							<span class="process-icon bg-danger-light">
								<i class="ti-target"></i>
								<span class="process-count bg-danger cl-white">1</span>
							</span>
							<h4>CHOOSE SERVICES</h4>
							<p>Select a service or <br>category</p>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="work-process step-2">
							<span class="process-icon bg-success-light">
								<i class="ti-rocket"></i>
								<span class="process-count bg-success cl-white">2</span>
							</span>
							<h4>EXPLORE OPTIONS</h4>
							<p>Browse the list of<br> top companies</p>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="work-process step-3">
							<span class="process-icon bg-warning-light">
								<i class="ti-star"></i>
								<span class="process-count bg-warning cl-white">3</span>
							</span>
							<h4>RESEARCH &amp; RATINGS</h4>
							<p>Check out verified reviews and research</p>
						</div>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="work-process step-4">
							<span class="process-icon bg-info-light">
								<i class="ti-thumb-up"></i>
								<span class="process-count bg-info cl-white">4</span>
							</span>
							<h4>SELECT COMAPNY</h4>
							<p>Decide one or more company for your project</p>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		
		<!-- ======================== All features ======================= -->
		<section>
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>Explore top Companies and Services find the right Development company for your business Idea</h2>
							<p>2,000+ Companies in 100+ Services</p>
						</div>
					</div>
				</div>
				
				<div class="row">
							<!-- Single Job 
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
								
									<span class="job-type full-type">Full Time</span>
									<div class="job-like">
										<label class="toggler toggler-danger">
											<input type="checkbox">
											<i class="fa fa-heart"></i>
										</label>
									</div>
									
									<div class="u-content">
										<div class="avatar box-80">
											<a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">
												<img class="img-responsive" src="assets/img/c-2.png" alt="">
											</a>
										</div>
										<h5><a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">New Product Mockup</a></h5>
										<p class="text-muted">2708 Scenic Way, Sutter, IL 62373</p>
									</div>
									
									<div class="job-type-grid">
										<a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>
							-->

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=DIGITAL MARKETING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-announcement" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=DIGITAL MARKETING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">DIGITAL <br> MARKETING</a></h5>
									
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=DIGITAL MARKETING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=SEARCH ENGINE OPTIMIZATION&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-bar-chart-alt" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=SEARCH ENGINE OPTIMIZATION&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">SEARCH ENGINE OPTIMIZATION (SEO)</a></h5>
										
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=SEARCH ENGINE OPTIMIZATION&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=MOBILE APP DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-mobile" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=MOBILE APP DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">MOBILE APP DEVELOPMENT</a></h5>
										
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=MOBILE APP DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=WEB DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-layout" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=WEB DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">WEB <br>DEVELOPMENT</a></h5>
										
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=WEB DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=WEB DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-ruler-alt" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=WEB DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">WEB DESIGNING</a></h5>
										
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=WEB DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=APP DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-paint-bucket" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=APP DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">APP DESIGNING</a></h5>
										
									</div>
									
									<div class="job-type-grid">
										<a href="search-result.php?q=APP DESIGNING&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
									
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=IoT DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-signal" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=IoT DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">IoT DEVELOPMENT</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=IoT DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=ARTIFICIAL INTELLIGENCE&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-eye" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=ARTIFICIAL INTELLIGENCE&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">ARTIFICIAL INTELLIGENCE</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=ARTIFICIAL INTELLIGENCE&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=SOFTWARE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-desktop" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=SOFTWARE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">SOFTWARE DEVELOPMENT</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=SOFTWARE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=BLOCKCHAIN TECHNOLOGY&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-link" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=BLOCKCHAIN TECHNOLOGY&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">BLOCKCHAIN TECHNOLOGY</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=BLOCKCHAIN TECHNOLOGY&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=eCOMMERCE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-shopping-cart" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=eCOMMERCE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">eCOMMERCE DEVELOPMENT</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=eCOMMERCE DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=TESTING SERVICES&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-check-box" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=TESTING SERVICES&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">TESTING <br>SERVICES</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=TESTING SERVICES&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=AR and VR DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-dropbox" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=AR and VR DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">AR & VR DEVELOPMENT</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=AR and VR DEVELOPMENT&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
									<div class="u-content">
										<div class="avatar box-80">
											<a href="search-result.php?q=BIG DATA and ANALYTICS&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">
												<i class="theme-cl ti-pie-chart" aria-hidden="true" style="font-size: 5em;"></i>
											</a>
										</div>
										<h5><a href="search-result.php?q=BIG DATA and ANALYTICS&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0">BIG DATA & ANALYTICS</a></h5>
									</div>
									<div class="job-type-grid">
										<a href="search-result.php?q=BIG DATA and ANALYTICS&cat=&minProjectPrice=0&avgPricePerHour=0&noOfEmp=0" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
									</div>
								</div>
							</div>

							<!-- Single Job -->
							<div class="col-md-3 col-sm-6">
								<div class="grid-job-widget">
						
									<div class="u-content" style="margin-top: 20px;">
										<a href="#" class="btn theme-btn btn-radius br-light">Explore All <i class="ti-shift-right"></i></a>
										<p class="text-muted" style="margin-top: 15px; margin-bottom: 15px;">or</p>
										<a href="#" class="btn theme-btn btn-radius br-light">Get Listed</a>
									</div>
									
								</div>
								
							</div>
							
						</div>
				
			</div>
		</section>

		<!-- ======================== All features ======================= -->
		<section>
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>Best features By Jobhill</h2>
							<p>Each month, more than 7 million Jobhunt turn to website in their search for work, making over<br>160,000 applications every day.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					
					<?php
						foreach($featuredCompanyBlogs as $featuredCompanyBlog) {
							$desc = strip_tags($featuredCompanyBlog->content);
							$title = $featuredCompanyBlog->title;
								if (strlen($desc) > 90) {
									$desc = substr($desc, 0, 90) . "...";
								}
								if (strlen($title) > 35) {
									$title = substr($title, 0, 35) . "...";
								}

							?>
										
							<!-- Single Features -->
							<div class="col-md-6 col-sm-6">
								<a href="blog-detail.php?blogId=<?php echo $featuredCompanyBlog->_id; ?>">
									<div class="blog-box blog-grid-box">
										<div class="col-md-4 col-sm-4 blog-grid-box-img sqr-img">
											<img src="<?php echo $config['URLS']['API_PATH'] . 'BlogImages/' . $featuredCompanyBlog->img; ?>" class="img-responsive" style="margin: 25px;" alt="">
										</div>
										
										<div class="col-md-8 col-sm-8 blog-grid-box-content">
											<h4><?php echo $title; ?></h4>
											<p><?php echo $desc; ?></p>
											<a href="blog-detail.php?blogId=<?php echo $featuredCompanyBlog->_id; ?>" class="theme-cl" title="Read More..">Continue...</a>
										</div>
										
									</div>
								</a>
							</div>
						<?php
						}
					?>
					
				</div>
				
			</div>
		</section>
		<!-- ======================== All features ======================= -->
		
		<!-- ====================== Tag Section ============================ -->
		<section class="tag-sec" style="background:url(assets/img/slider-01.jpg);">
			<div class="container">
				<div class="col-md-10 col-md-offset-1">
					<div class="tag-content">
						<img src="assets/img/s-logo.png" class="img-responsive" alt="" />
						<h4 style="color: white;">WHAT TECISH DO</h4>
						<h2>We deeply Research and list best development software companies based on their past clients works.</h2>
						<p>We inspect software development companies and agencies with essential services
							metrics, locate their reputation and quality points, and disclose best effective app or web
							development companies. We understand which services deliver skillfully or which
							industry domain is more attentive or what technologies the companies is more
							successful to deliver. Reviews of previous customer experience help new business
							before awarding a project to a company.</p>
						<a href="#" class="btn theme-btn btn-radius" title="">Explore Services<i class="ti-shift-right"></i></a>
						<a href="#" class="btn theme-btn btn-radius" title="">Get Listed</i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- =================== End Tag Section ==================== -->

		<!-- =================== Blog Start ==================== -->

		<section>
			<div class="container">
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>BLOG- LATEST TRENDING TECHNOLOGIES</h2>
							<p>READ THE TECH INSIGHTS</p>
							<a href="blogs.php" class="btn theme-btn btn-radius" title="">Read All</i></a>
						</div>
					</div>
				</div>
				<div class="row">
					
					<?php
						foreach($featuredTechBlogs as $featuredTechBlog) {
							$desc = strip_tags($featuredTechBlog->content);
							$title = $featuredTechBlog->title;
								if (strlen($desc) > 90) {
									$desc = substr($desc, 0, 90) . "...";
								}
								if (strlen($title) > 35) {
									$title = substr($title, 0, 35) . "...";
								}
							?>
							
							<div class="col-md-4 col-sm-6">
								<a href="blog-detail.php?blogId=<?php echo $featuredTechBlog->_id; ?>">
									<div class="blog-box blog-grid-box">
										<div class="blog-grid-box-img">
											<img src="<?php echo $config['URLS']['API_PATH'] . 'BlogImages/' . $featuredTechBlog->img; ?>" class="img-responsive" alt="" />
										</div>
										
										<div class="blog-grid-box-content">
											<div class="blog-avatar text-center">
												<p><strong>By</strong> <span class="theme-cl"><?php echo $featuredTechBlog->author; ?></span></p>
											</div>
											<h4><?php echo $title; ?></h4>
											<p><?php echo $desc; ?></p>
											<a href="blog-detail.php?blogId=<?php echo $featuredTechBlog->_id; ?>" class="theme-cl" title="Read More..">Continue...</a>
										</div>								
									</div>
								</a>
							</div>
						<?php
						}
					?>
				</div>
			</div>	
		</section>

		<!-- =================== End Blog ==================== -->
		


		<!-- ========================= Testimonial Start ====================== -->
		<section>
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>Why Top Companies Trust Tecish</h2>
							<p>Ensuring the success of our clients and partners through our highly optimized Research</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div id="testimonial-slide" class="testimonial-carousel">
						
						<!-- Single Testimonial -->
						<div class="testimonial-detail">
							<div class="pic">
								<img src="assets/img/client-1.jpg" alt="" class="avatar avatar-xl">
							</div>
							<h3 class="user-testimonial-title">Sagar Singh</h3>
							<p class="user-description">
								At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.
							</p>
							<div class="client-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						
						<!-- Single Testimonial -->
						<div class="testimonial-detail">
							<div class="pic">
								<img src="assets/img/client-2.jpg" alt="" class="avatar avatar-xl">
							</div>
							<h3 class="user-testimonial-title">Alixa Chive</h3>
							<p class="user-description">
								At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.
							</p>
							<div class="client-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						
						<!-- Single Testimonial -->
						<div class="testimonial-detail">
							<div class="pic">
								<img src="assets/img/client-3.jpg" alt="" class="avatar avatar-xl">
							</div>
							<h3 class="user-testimonial-title">Surveer Singh</h3>
							<p class="user-description">
								At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.
							</p>
							<div class="client-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						
						<!-- Single Testimonial -->
						<div class="testimonial-detail">
							<div class="pic">
								<img src="assets/img/client-4.jpg" alt="" class="avatar avatar-xl">
							</div>
							<h3 class="user-testimonial-title">Alita Dixit</h3>
							<p class="user-description">
								At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.
							</p>
							<div class="client-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- =================== End testimonial ==================== -->
		
		<!-- =================== Newsletter ==================== 
		<section class="newsletter" style="background-image:url(assets/img/news-letter-bg.jpg); background-position: center;">
			<div class="container">
				<div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
					<div class="newsletter-box text-center">
						<div class="input-group">
							<span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
							<input type="text" class="form-control" placeholder="Enter your Email..">
						</div>
						<button type="button" class="btn theme-btn btn-radius btn-m">subscribe Me!</button>
					</div>
				</div>
			</div>
		</section>
		 =================== End Newsletter ==================== -->
		
<?php
	require_once 'footer.php';
?>