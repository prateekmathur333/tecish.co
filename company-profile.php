<?php
	require_once 'header.php';
	require_once 'function2.php';

	$company = json_decode(sendGetRequest( $config['URLS']['API_PATH'] . $config['URLS']['GET_COMPANY_PROFILE'] . $_GET['companyId'] ));
	$company = $company->data[0];
	//echo $company;
	$portfolios = json_decode(sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['GET_PORTFOLIO'] . $_GET['companyId'] ));
	//print_r($portfolios);
	$portfolios = $portfolios->data;
	$urlReview = $config['URLS']['API_PATH'] . $config['URLS']['GET_COMPANY_REVIEW'] . $_GET['companyId'];
	echo $urlReview;
	$reviewData = json_decode(sendGetRequest($urlReview));
	//print_r($reviewData);
	$services = json_decode(sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'] ));
	//print_r($services);
	$reviews = $reviewData->reviewsArray;
	//echo $reviews;
?>

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="assets/plugins/fontawesome-rating/awesomerating.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous">
</script>

<script src="assets/plugins/fontawesome-rating/awesomeRating.min.js"></script>

<style>
	/*!
 * bootstrap-vertical-tabs - v1.1.0
 * https://dbtek.github.io/bootstrap-vertical-tabs
 * 2014-06-06
 * Copyright (c) 2014 Ä°smail Demirbilek
 * License: MIT
 */
.tabs-left, .tabs-right {
  border-bottom: none;
  padding-top: 2px;
}
.tabs-left {
  border-right: 1px solid #ddd;
}
.tabs-right {
  border-left: 1px solid #ddd;
}
.tabs-left>li, .tabs-right>li {
  float: none;
  margin-bottom: 2px;
}
.tabs-left>li {
  margin-right: -1px;
}
.tabs-right>li {
  margin-left: -1px;
}
.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
}

.tabs-right>li.active>a,
.tabs-right>li.active>a:hover,
.tabs-right>li.active>a:focus {
  border-bottom: 1px solid #ddd;
  border-left-color: transparent;
}
.tabs-left>li>a {
  border-radius: 4px 0 0 4px;
  margin-right: 0;
  display:block;
}
.tabs-right>li>a {
  border-radius: 0 4px 4px 0;
  margin-right: 0;
}
.vertical-text {
  margin-top:50px;
  border: none;
  position: relative;
}
.vertical-text>li {
  height: 20px;
  width: 120px;
  margin-bottom: 100px;
}
.vertical-text>li>a {
  border-bottom: 1px solid #ddd;
  border-right-color: transparent;
  text-align: center;
  border-radius: 4px 4px 0px 0px;
}
.vertical-text>li.active>a,
.vertical-text>li.active>a:hover,
.vertical-text>li.active>a:focus {
  border-bottom-color: transparent;
  border-right-color: #ddd;
  border-left-color: #ddd;
}
.vertical-text.tabs-left {
  left: -50px;
}
.vertical-text.tabs-right {
  right: -50px;
}
.vertical-text.tabs-right>li {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.vertical-text.tabs-left>li {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
</style>


		<!-- ================ Job Detail Basic Information ======================= -->
		<section class="detail-section" style="background:url(assets/img/slider-2.jpg);">
			<div class="overlay"></div>
			<div class="profile-cover-content">
				<div class="container">
					<!--
					<div class="cover-buttons">
						<ul>
						<li><div class="buttons medium button-plain "><i class="fa fa-phone"></i>+91 528 578 5458</div></li>
						<li><div class="buttons medium button-plain "><i class="fa fa-map-marker"></i>#2852, SCO 20 Chandigarh</div></li>
						<li><a href="job-detail.html#add-review" class="buttons theme-btn"><i class="fa fa-paper-plane"></i><span class="hidden-xs">Apply Now</span></a></li>
						<li><a href="job-detail.html#" data-job-id="74" data-nonce="01a769d424" class="buttons btn-outlined"><i class="fa fa-heart-o"></i><span class="hidden-xs">Bookmark</span> </a></li>
						</ul>
					</div>
					
					<div class="job-owner hidden-xs hidden-sm">
						<div class="job-owner-avater">
							<img src="assets/img/c-2.png" class="img-responsive img-circle" alt="" />
						</div>
						<div class="job-owner-detail">
							<h4>Company Name</h4>
							<span class="theme-cl">Google PVT</span>
						</div>
					</div>
					-->
				</div>
			</div>
		</section>
		<!-- ================ End Job Detail Basic Information ======================= -->
		
		<!-- ================ Start Job Overview ======================= -->
		<section>
			<div class="container">
				
				<!-- row -->
				<div class="row">
					
					<div class="col-md-8 col-sm-8">
						
					<div class="detail-wrapper">
							<div class="detail-wrapper-body">
							
								<div class="text-center mrg-bot-30">
									<img src="<?php echo $config['URLS']['API_PATH'] . "CompanyLogo/" . $company->logo; ?>" class="width-100"  alt=""/>
									<h4 class="meg-0"><?php echo $company->name; ?></h4>
									<span><?php echo $company->tagline; ?></span>
								</div>
								
								<div class="row">
									<div class="col-sm-6 mrg-bot-10">
										<i class="fa fa-tags padd-r-10"></i> $<?php echo $company->minProjectPrice; ?>+
									</div>
									<div class="col-sm-6 mrg-bot-10">
										<i class="fa fa-clock-o padd-r-10"></i> $<?php echo $company->avgPricePerHour; ?> / hr
									</div>
									<div class="col-sm-6 mrg-bot-10">
										<i class="ti-user padd-r-10"></i> <?php echo $company->noOfEmp; ?>
									</div>
									<div class="col-sm-6 mrg-bot-10">
										<i class="fa fa-flag padd-r-10"></i> Founded <?php echo $company->founded; ?>
									</div>
									<!--
									<div class="col-sm-4 mrg-bot-10">
										<i class="ti-user padd-r-10"></i> <span class="mrg-l-5 cl-danger">7 Open Position</span>
									</div>
									<div class="col-sm-4 mrg-bot-10">
										<i class="ti-shield padd-r-10"></i>3 Year Exp.
									</div>
									-->
								</div>
								
							</div>
						</div>
						
						<div class="detail-wrapper">
							<div class="detail-wrapper-header">
								<h4>Overview</h4>
							</div>
							<div class="detail-wrapper-body">
								<p><?php echo $company->detailedDes; ?></p>							
							</div>
						</div>
						
						<div class="detail-wrapper">
							<div class="detail-wrapper-header">
								<h4>Portfolio</h4>
							</div>
							<div class="detail-wrapper-body">
								<p><b>Key Clients:</b> <?php echo $company->client; ?> </p>
								<div class="row">
									
									<?php
										foreach($portfolios as $portfolio) {
											?>
												<div class="col-md-4">
													<img src="<?php echo $config['URLS']['API_PATH'] . "PortfolioImages/" . $portfolio->imageName; ?>" id="<?php echo $portfolio->_id; ?>" data-toggle="modal" data-target="#myModal" class="img-thumbnail">
												</div>
											<?php		
										}
									?>

								</div>
							</div>
						</div>
					
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="sidebar">
						
							<!-- Start: Opening hour -->
							<div class="widget-boxed">
								<div class="widget-boxed-body">
									<a href="https://<?php echo str_replace("http://","", str_replace("https://","", $company->websiteLink)); ?>" class="btn btn-m theme-btn full-width mrg-bot-10" target="_blank"><i class="fa fa-paper-plane"></i>Visit Website</a>
									<!--<a href="job-detail.html#" class="btn btn-m light-gray-btn full-width"><i class="fa fa-linkedin"></i>Apply with Linkedin</a>-->
								</div>
							</div>
							<!-- End: Opening hour -->
							
							<!-- Start: Job Overview -->
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-location-pin padd-r-10"></i>Location</h4>
								</div>
								<div class="widget-boxed-body">
									<div class="side-list no-border">
									<iframe frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="about:blank"></iframe>
										<ul>
											<li><i class="fa fa-map-marker padd-r-10"></i><?php echo $company->state; ?> , <?php echo $company->country; ?></li>
											<li><i class="ti-world padd-r-10"></i><?php echo $company->websiteLink; ?></li>
											<li><i class="ti-mobile padd-r-10"></i><?php echo $company->mobNo; ?></li>
											<li><i class="ti-email padd-r-10"></i><?php echo $company->emailTechSupport; ?></li>
											<!--<li><i class="ti-pencil-alt padd-r-10"></i>Bachelor Degree</li>
											<li><i class="ti-shield padd-r-10"></i>3 Year Exp.</li>-->
										</ul>
										<h5>Contect On Social Media</h5>
										<ul class="side-list-inline no-border social-side">
											<!--<li><a href="job-detail.html#"><i class="fa fa-facebook theme-cl"></i></a></li>
											<li><a href="job-detail.html#"><i class="fa fa-pinterest theme-cl"></i></a></li>
											<li><a href="job-detail.html#"><i class="fa fa-google-plus theme-cl"></i></a></li>-->
											<li><a href="http://<?php echo str_replace("http://","", str_replace("https://","", $company->twitterProfile)); ?>" target="_blank"><i class="fa fa-twitter theme-cl"></i></a></li>
											<li><a href="http://<?php echo str_replace("http://","", str_replace("https://","", $company->facebookProfile)); ?>" target="_blank"><i class="fa fa-facebook theme-cl"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End: Job Overview -->
							
							<!-- Start: Opening hour 
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-time padd-r-10"></i>Opening Hours</h4>
								</div>
								<div class="widget-boxed-body">
									<div class="side-list">
										<ul>
											<li>Monday <span>9 AM - 5 PM</span></li>
											<li>Tuesday <span>9 AM - 5 PM</span></li>
											<li>Wednesday <span>9 AM - 5 PM</span></li>
											<li>Thursday <span>9 AM - 5 PM</span></li>
											<li>Friday <span>9 AM - 5 PM</span></li>
											<li>Saturday <span>9 AM - 3 PM</span></li>
											<li>Sunday <span>Closed</span></li>
										</ul>
									</div>
								</div>
							</div>
							 End: Opening hour -->
							 
						</div>
					</div>
					
					

					<div class="detail-wrapper">
							<div class="detail-wrapper-header col-md-12">
								<div class="col-md-3">
									<h4>Reviews</h4>
									<div id="total-rating"><span id="overall-rating-value" class="rating-value"><?php echo $reviewData->avgRating; ?>&nbsp</span><div class="awesomeRating" id="overall-rating-bar"></div>&nbsp<a href="#" id="reviews-total">(<?php echo count($reviews); ?> REVIEWS)</a></div>
									<script>
										$('#overall-rating-bar').awesomeRating({
											// initial value
											valueInitial        : <?php echo round($reviewData->avgRating); ?>,
											// is readonly?
											readonly            : true,
											// allows fractional values
											allowFractional     : false
										});
									</script>
								</div>

								<div class="col-md-9">
									<form>
										<div class="text-center col-md-4" style="float: right;">
											<div class="btn btn-m theme-btn" id="btnFilter" onclick="toggleFilters()">Filters (+)</div>
										</div>
										
										<div class="col-sm-4" style="float: right;">
											<select class="wide form-control">
												<option value="1">Most Recent</option>
												<option value="2">Rating: Low to High</option>
												<option value="3">Rating: High to Low</option>
											</select>
										</div>
									
									</form>
								</div>
								<div class="col-md-12" id="filterOptions" style="display: none;">
									<form>
										<div class="text-center col-md-2" style="float: right;">
											<button type="submit" class="btn btn-m theme-btn">Clear</button>
										</div>

										<div class="text-center col-md-2" style="float: right;">
											<button type="submit" class="btn btn-m theme-btn">Apply</button>
										</div>
										
										<div class="col-sm-4">
											<select class="wide form-control" name="typeOfProject">
												<option data-display="Service Type" value="Mobile App developement">- None -</option>
												
												<?php
									
													foreach($services as $service) {
														echo "<option value=" . $service->_id . ">" . $service->name . "</option>";
													}    
													
												?>
												
											</select>
										</div>

										<div class="col-sm-4">
											<select class="wide form-control" name="minProjectPrice">
												<option data-display="Project Cost">Project Cost</option>
												<option value="1000">$1000+</option>
												<option value="5000">$5000+</option>
												<option value="10000">$10000+</option>
												<option value="25000">$25000+</option>
												<option value="50000">$50000+</option>
												<option value="100000">$100000+</option>
												<option value="250000">$250000+</option>
											</select>
										</div>
									
									</form>
								</div>
							</div>

							<?php
								foreach($reviews as $review) {?>

									<div class="detail-wrapper-body">
										<div class="col-md-4 border-right border-bottom border-top div-review" style="margin-top: 10px;">
											<h5>THE PROJECT</h5>
											<h3><?php echo $review->projectTitle; ?></h3>
											<div class="row">
												<div class="col-sm-12 mrg-bot-10">
													<i class="fa fa-area-chart padd-r-10"></i> <?php echo $review->typeOfProject; ?>
												</div>
												<div class="col-sm-12 mrg-bot-10">
													<i class="fa fa-tags padd-r-10"></i> <?php echo $review->cost; ?>
												</div>
												<div class="col-sm-12 mrg-bot-10">
													<i class="fa fa-clock-o padd-r-10"></i> <?php echo $review->startDate; ?> - <?php echo $review->endDate; ?>
												</div>
												<!--
												<div class="col-sm-12 mrg-bot-10">
													<i class="fa fa-flag padd-r-10"></i> Founded 2005
												</div>
												
												<div class="col-sm-4 mrg-bot-10">
													<i class="ti-user padd-r-10"></i> <span class="mrg-l-5 cl-danger">7 Open Position</span>
												</div>
												<div class="col-sm-4 mrg-bot-10">
													<i class="ti-shield padd-r-10"></i>3 Year Exp.
												</div>
												-->
											</div>
										</div>

										<div class="col-md-4 border-bottom border-right border-top div-review" style="margin-top: 10px;">
											<div class="col-sm-4"> 
												<h5>The Review</h5>
												<h4>"<?php echo $review->rating->overallRating->detail; ?>"</h4>
												<p><?php echo substr($review->createdAt, 0, 10); ?></p>
											</div>
											<div class="col-sm-8">
												<div class="row">
												<div id="total-rating" class="text-center"><span id="customer-rating-value" class="rating-value"><?php echo $review->rating->overallRating->rating; ?>&nbsp</span><div class="awesomeRating" id="customer-rating-bar-<?php echo $review->_id; ?>"></div></div>
													<script>
														$('#customer-rating-bar-<?php echo $review->_id; ?>').awesomeRating({
															// initial value
															valueInitial        : <?php echo round($review->rating->overallRating->rating); ?>,
															// is readonly?
															readonly            : true,
															// allows fractional values
															allowFractional     : false
														});
													</script>
													<div class="col-sm-12 mrg-bot-10">
														<div class="col-sm-8"> Quality: </div>
														<div class="col-sm-4"> <?php echo $review->rating->quality->rating; ?> </div>
													</div>

													<div class="col-sm-12 mrg-bot-10">
														<div class="col-sm-8"> Schedule: </div>
														<div class="col-sm-4"> <?php echo $review->rating->schedule->rating; ?> </div>
													</div>

													<div class="col-sm-12 mrg-bot-10">
														<div class="col-sm-8"> Cost: </div>
														<div class="col-sm-4"> <?php echo $review->rating->cost->rating; ?> </div>
													</div>

													<div class="col-sm-12 mrg-bot-10">
														<div class="col-sm-8"> Willing to refer: </div>
														<div class="col-sm-4"> <?php echo $review->rating->refer->rating; ?> </div>
													</div>
													
													<!--
													<div class="col-sm-12 mrg-bot-10">
														<i class="fa fa-flag padd-r-10"></i> Founded 2005
													</div>
													
													<div class="col-sm-4 mrg-bot-10">
														<i class="ti-user padd-r-10"></i> <span class="mrg-l-5 cl-danger">7 Open Position</span>
													</div>
													<div class="col-sm-4 mrg-bot-10">
														<i class="ti-shield padd-r-10"></i>3 Year Exp.
													</div>
													-->
												</div>
											</div>
										</div>

										<div class="col-md-4 border-bottom border-top div-review-half" style="margin-top: 10px;">
											<div class="col-sm-12"> 
												<h5>The Reviewer</h5>
												<h4><?php echo $review->reviewer->companyName; ?></h4>
												<p><i class="fa fa-user padd-r-10"></i> <?php echo $review->reviewer->fullName; ?></p>
											</div>
											
										</div>

										<div class="col-md-4 border-bottom div-review-half">
											<div class="col-sm-12"> 
												<div class="col-sm-6 mrg-bot-10">
													<i class="fa fa-check-square-o padd-r-10"></i><?php echo $review->industry; ?>
												</div>

												<div class="col-sm-6 mrg-bot-10">
													<i class="fa fa-industry padd-r-10"></i> <?php echo $review->reviewer->companySize; ?>
												</div>
												
												<div class="col-sm-6 mrg-bot-10">
													<i class="ti-user padd-r-10"></i><?php echo $review->reviewer->companySize; ?> Employees
												</div>

												<div class="col-sm-6 mrg-bot-10">
													<i class="fa fa-map-marker padd-r-10"></i><?php echo $review->reviewer->country; ?>
												</div>
												
											</div>
										</div>

										<div class="col-md-6 border-right border-bottom div-review">
											<div class="col-sm-12"> 
												<h4>Feedback summary: </h4>
												<p><?php echo $review->solution->projectDetail; ?></p>
											</div>
										</div>

										<div class="col-md-6 div-review border-bottom">
											<div class="col-sm-12"> 
												<h4>Project summary: </h4>
												<p>
													<?php echo $review->result->outcome; ?> 
												</p>
												
												<div class="text-center col-md-2" id="readMoreReview" onclick="toggleFullReview('<?php echo $review->_id; ?>');">
													<button class="btn btn-m theme-btn" id="btnFullReview-<?php echo $review->_id; ?>">Read More...</button>
												</div>

											</div>
										</div>
										
										<div class="col-sm-12 border-bottom" style="display: none;" id="fullReview-<?php echo $review->_id; ?>">
											<div class="col-xs-3">
												<!-- required for floating -->
												<!-- Nav tabs -->
												<ul class="nav nav-tabs tabs-left">
													<li class="active"><a href="#background" data-toggle="tab">Background</a></li>
													<li><a href="#challenge-<?php echo $review->_id; ?>" data-toggle="tab">Challenge</a></li>
													<li><a href="#solution-<?php echo $review->_id; ?>" data-toggle="tab">Solution</a></li>
													<li><a href="#results-<?php echo $review->_id; ?>" data-toggle="tab">Results</a></li>
													<li><a href="#ratings-<?php echo $review->_id; ?>" data-toggle="tab">Ratings</a></li>
												</ul>
											</div>
											<div class="col-xs-9">
												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active" id="background-<?php echo $review->_id; ?>">
														<h3>Background</h3>
														<h3>Introduce your business and what you do there.</h3>
														<p>
															<?php echo $review->background; ?>  
														</p>
													</div>
													<div class="tab-pane" id="challenge-<?php echo $review->_id; ?>">
														<h3>Challenge</h3>
														<h3>What challenge were you trying to address with STX Next?</h3>
														<p>
															<?php echo $review->challenge->service; ?>
															<?php echo $review->challenge->goal; ?>  
														</p>
													</div>
													<div class="tab-pane" id="solution-<?php echo $review->_id; ?>">
														<h3>SOLUTION</h3>
														<h3>How did you select this vendor?</h3>
														<p>
															<?php echo $review->solution->vendor; ?>  
														</p>

														<h3>Describe the project in detail.</h3>
														<p>
															<?php echo $review->solution->projectDetail; ?> 
														</p>

														<h3>What was the team composition?</h3>
														<p>
															<?php echo $review->solution->teamComposition; ?>  
														</p>

													</div>
													<div class="tab-pane" id="results-<?php echo $review->_id; ?>">
													<h3>SOLUTION</h3>
														<h3>Can you share any outcomes from the project that demonstrate progress or success?</h3>
														<p>
															<?php echo $review->result->outcome; ?>  
														</p>

														<h3>How effective was the workflow between your team and theirs?</h3>
														<p>
															<?php echo $review->result->effective; ?>  
														</p>

														<h3>What did you find most impressive about this company?</h3>
														<p>
															<?php echo $review->result->keyFeature; ?>  
														</p>

														<h3>Are there any areas for improvement?</h3>
														<p>
															<?php echo $review->result->improvements; ?>  
														</p>

													</div>
													<div class="tab-pane" id="ratings-<?php echo $review->_id; ?>">
														<div class="col-sm-4">
														
															<div class="col-sm-12">
																<span class="rating-circle-big">
																	<?php echo $review->rating->overallRating->rating; ?>
																</span>
															</div>

															<div class="col-sm-12">
																<h5>Overall Score</h5>
																<p><?php echo $review->rating->overallRating->detail; ?></p>
															</div>
														</div>

														<div class="col-sm-4">

															<div class="col-sm-12">
																<div class="col-sm-3">
																	<span class="rating-circle-small">
																		<?php echo $review->rating->schedule->rating; ?>
																	</span>
																</div>

																<div class="col-sm-9">
																	<h5>Scheduling</h5>
																	<p>
																		<?php echo $review->rating->schedule->detail; ?>
																	</p>
																</div>
															</div>

															<div class="col-sm-12">
																<div class="col-sm-3">
																	<span class="rating-circle-small">
																		<?php echo $review->rating->quality->rating; ?>
																	</span>
																</div>

																<div class="col-sm-9">
																	<h5>Quality</h5>
																	<p><?php echo $review->rating->quality->detail; ?></p>
																</div>
															</div>

														</div>

														<div class="col-sm-4">

															<div class="col-sm-12">
																<div class="col-sm-3">
																	<span class="rating-circle-small">
																		<?php echo $review->rating->cost->rating; ?>
																	</span>
																</div>

																<div class="col-sm-9">
																	<h5>Cost</h5>
																	<p><?php echo $review->rating->cost->detail; ?></p>
																</div>
															</div>

															<div class="col-sm-12">
																<div class="col-sm-3">
																	<span class="rating-circle-small">
																		<?php echo $review->rating->refer->rating; ?>
																	</span>
																</div>

																<div class="col-sm-9">
																	<h5>Refer</h5>
																	<p><?php echo $review->rating->refer->detail; ?></p>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										
										</div>
										
									</div>
								<?php
								}
							?>
						</div>
						

				</div>


				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<img class="img-responsive" src="" />
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->
				
				<!-- row 
				<div class="row">
					<div class="col-md-12">
						<h4 class="mrg-bot-20">More Jobs</h4>
					</div>
				</div>
				End Row -->
				
				<!-- row 
				<div class="row">
					Single Job 
					<div class="col-md-3 col-sm-6">
						<div class="grid-job-widget">
						
							<span class="job-type full-type">Full Time</span>
							<div class="job-like">
								<label class="toggler toggler-danger">
									<input type="checkbox" checked>
									<i class="fa fa-heart"></i>
								</label>
							</div>
							
							<div class="u-content">
								<div class="avatar box-80">
									<a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">
										<img class="img-responsive" src="assets/img/c-1.png" alt="">
									</a>
								</div>
								<h5><a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">Product Redesign</a></h5>
								<p class="text-muted">2708 Scenic Way, Sutter, IL 62373</p>
							</div>
							
							<div class="job-type-grid">
								<a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
							</div>
							
						</div>
					</div>
					
					Single Job 
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
					
					Single Job
					<div class="col-md-3 col-sm-6">
						<div class="grid-job-widget">
						
							<span class="job-type part-type">Full Time</span>
							<div class="job-like">
								<label class="toggler toggler-danger">
									<input type="checkbox" checked>
									<i class="fa fa-heart"></i>
								</label>
							</div>
							
							<div class="u-content">
								<div class="avatar box-80">
									<a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">
										<img class="img-responsive" src="assets/img/c-3.png" alt="">
									</a>
								</div>
								<h5><a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">Custom Php Developer</a></h5>
								<p class="text-muted">3765 C Street, Worcester</p>
							</div>
							
							<div class="job-type-grid">
								<a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
							</div>
							
						</div>
					</div>
					
					Single Job
					<div class="col-md-3 col-sm-6">
						<div class="grid-job-widget">
						
							<span class="job-type part-type">Part Time</span>
							<div class="job-like">
								<label class="toggler toggler-danger">
									<input type="checkbox">
									<i class="fa fa-heart"></i>
								</label>
							</div>
							
							<div class="u-content">
								<div class="avatar box-80">
									<a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">
										<img class="img-responsive" src="assets/img/c-4.png" alt="">
									</a>
								</div>
								<h5><a href="http://themezhub.com/demo/live-jobhill-template/job-hill-live-preview/employer-detail/html">Wordpress Developer</a></h5>
								<p class="text-muted">2719 Duff Avenue, Winooski</p>
							</div>
							
							<div class="job-type-grid">
								<a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Browse Now</a>
							</div>
							
						</div>
					</div>
				</div>
				End Row -->
				
			</div>
		</section>
		
		<!-- ====================== End Job Overview ================ -->
		

		<!-- Fontawesome Rating System -->
		<script>
			$(document).ready(function () {
					$('#myModal').on('show.bs.modal', function (e) {
						var image = $(e.relatedTarget).attr('src');
						$(".img-responsive").attr("src", image);
					});
			});
		</script>

<?php
	require_once 'footer.php';
?>