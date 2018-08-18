<?php
	require_once 'header.php';
	require_once 'function2.php';

	echo json_encode($_POST);

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		if(strlen($_POST['q'])!=0) {
			$url = $config['URLS']['API_PATH'] . $config['URLS']['SEARCH'];
			$params = array(
				"name" => $_POST['q'],
				"minProjectPrice" => $_POST['minProjectPrice'],
				"avgPricePerHour" => $_POST['avgPricePerHour'],
				"noOfEmp" => $_POST['noOfEmp']
			);
			$companies = json_decode(sendPostRequest($url, $params));	
			echo "case 1" . $url . "<br>" . json_encode($params);
		}
		else if(strlen($_POST['q'])==0 and strlen($_POST['cat'])!=0){
			$url = $config['URLS']['API_PATH'] . $config['URLS']['SEARCH'];
			$params = array(
				"name" => $_POST['cat'],
				"minProjectPrice" => $_POST['minProjectPrice'],
				"avgPricePerHour" => $_POST['avgPricePerHour'],
				"noOfEmp" => $_POST['noOfEmp']
			);
			$companies = json_decode(sendPostRequest($url, $params));
			echo "case 2" . $url . "<br>" . json_encode($params);
		}
		else {
			/*$url = $config['URLS']['API_PATH'] . $config['URLS']['GET_ALL_COMPANIES'];
			$params = array();
			$companies = json_decode(sendGetRequest($url, $params));*/
			$url = $config['URLS']['API_PATH'] . $config['URLS']['SEARCH'];
			$params = array(
				"name" => "",
				"minProjectPrice" => $_POST['minProjectPrice'],
				"avgPricePerHour" => $_POST['avgPricePerHour'],
				"noOfEmp" => $_POST['noOfEmp']
			);
			$companies = json_decode(sendPostRequest($url, $params));
			echo "case 2" . $url . "<br>" . json_encode($params);
		}
	}
	else {
		header("location: 404.php");
	}
	//echo $url;
	//print_r($params);
	//print_r($companies);
	$companies = $companies->data;
?>
<!-- ======================= Page Title ===================== -->
		<div class="page-title">
			<div class="container">
				<div class="page-caption">
					<h2>Browse Companies</h2>
					<p><a href="browse-job.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Browse Companies</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		<!-- ====================== Start Job Detail 2 ================ -->
		<section>
			<div class="container">
				
				<!-- row -->
				<div class="row">
					<!-- Start Sidebar -->
					<div class="col-md-3 col-sm-4">
					
						<!--
						<div class="widget-boxed padd-bot-0">
							<div class="widget-boxed-body">
								<div class="search_widget_job">
									<div class="field_w_search">
										<input type="text" class="form-control" placeholder="Search Keywords">
									</div>
									<div class="field_w_search">
										<input type="text" class="form-control" placeholder="All Locations">
									</div>
								</div>
							</div>
						</div>
						-->
						<form method="post" action="search-result.php" id="filter-form">
						    <!--<form method="post" action="https://pure-plains-98928.herokuapp.com/testfilter">-->
							<div class="widget-boxed padd-bot-0">
							<div class="widget-boxed-header">
								<h4>Min. Project Size</h4>
							</div>
							<div class="widget-boxed-body">
								<div class="side-list no-border">
									<ul>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="0" checked="checked" id="minPrice0">
												<input type="radio"  name="minProjectPrice" value="10" id="minPrice1">
												<label for="minPrice1"></label>
											</span>
											$10+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="50" id="minPrice2">
												<label for="minPrice2"></label>
											</span>
											$50+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="200" id="minPrice3">
												<label for="minPrice3"></label>
											</span>
											$200+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="500" id="minPrice4">
												<label for="minPrice4"></label>
											</span>
											$500+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="1000" id="minPrice5">
												<label for="minPrice5"></label>
											</span>
											$1,000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="5000" id="minPrice6">
												<label for="minPrice6"></label>
											</span>
											$5,000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="10000" id="minPrice7">
												<label for="minPrice7"></label>
											</span>
											$10,000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="minProjectPrice" value="100000" id="minPrice8">
												<label for="minPrice8"></label>
											</span>
											$1,00,000+
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="widget-boxed padd-bot-0">
							<div class="widget-boxed-header br-0">
								<h4>Avg. Hourly Rate <a href="browse-job.html#avgHourlyRate" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="avgHourlyRate">
								<div class="side-list no-border">
									<ul>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="0" checked="checked" id="hourPrice0">
												<input type="radio"  name="avgPricePerHour" value="25" id="hourPrice1">
												<label for="hourPrice1"></label>
											</span>
											$25+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="49" id="hourPrice2">
												<label for="hourPrice2"></label>
											</span>
											$49+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="99" id="hourPrice3">
												<label for="hourPrice3"></label>
											</span>
											$99+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="149" id="hourPrice4">
												<label for="hourPrice4"></label>
											</span>
											$149+
										</li>
										
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="199" id="hourPrice6">
												<label for="hourPrice6"></label>
											</span>
											$199+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="avgPricePerHour" value="499" id="hourPrice7">
												<label for="hourPrice7"></label>
											</span>
											$499+
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="widget-boxed padd-bot-0">
							<div class="widget-boxed-header br-0">
								<h4>Employees <a href="browse-job.html#employee" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="employee">
								<div class="side-list no-border">
									<ul>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="0" checked="checked" id="emp0">
												<input type="radio"  name="noOfEmp" value="10" id="emp1">
												<label for="emp1"></label>
											</span>
											10+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="50" id="emp2">
												<label for="emp2"></label>
											</span>
											50+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="200" id="emp3">
												<label for="emp3"></label>
											</span>
											200+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="500" id="emp4">
												<label for="emp4"></label>
											</span>
											500+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="1000" id="emp5">
												<label for="emp5"></label>
											</span>
											1000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="5000" id="emp6">
												<label for="emp6"></label>
											</span>
											5000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="10000" id="emp7">
												<label for="emp7"></label>
											</span>
											10,000+
										</li>
										<li>
											<span class="custom-radio">
												<input type="radio"  name="noOfEmp" value="100000" id="emp8">
												<label for="emp8"></label>
											</span>
											1,00,000+
										</li>
									</ul>
								</div>
							</div>
						</div>
						
						<!--
						<div class="widget-boxed padd-bot-0">
							<div class="widget-boxed-header br-0">
								<h4>Industry Focus <a href="browse-job.html#industryFocus" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="industryFocus">
								<div class="side-list no-border">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value=" " checked="checked" id="1005">
												<input type="checkbox"  name="industryFocus" value="Android App Developement" id="11">
												<label for="11"></label>
											</span>
											ANDROID APP DEVELOPEMENT
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Automotive" id="21">
												<label for="21"></label>
											</span>
											Automotive
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Arts, entertainment & music" id="31">
												<label for="31"></label>
											</span>
											Arts, entertainment & music
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Business services" id="41">
												<label for="41"></label>
											</span>
											Business services
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Consumer products" id="51">
												<label for="51"></label>
											</span>
											Consumer products
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Education" id="61">
												<label for="61"></label>
											</span>
											Education
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" name="industryFocus" value="Natural resources" id="61">
												<label for="61"></label>
											</span>
											Natural resources
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Financial services" id="61">
												<label for="61"></label>
											</span>
											Financial services
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Gambling" id="61">
												<label for="61"></label>
											</span>
											Gambling
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Gaming" id="61">
												<label for="61"></label>
											</span>
											Gaming
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Government" id="61">
												<label for="61"></label>
											</span>
											Government
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Health care & life sciences" id="61">
												<label for="61"></label>
											</span>
											Health care & life sciences
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Hospitality & leisure" id="61">
												<label for="61"></label>
											</span>
											Hospitality & leisure
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Information technology" id="61">
												<label for="61"></label>
											</span>
											Information technology
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Manufacturing" id="61">
												<label for="61"></label>
											</span>
											Manufacturing
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Media" id="61">
												<label for="61"></label>
											</span>
											Media
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Non-profit" id="61">
												<label for="61"></label>
											</span>
											Non-profit
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Real estate" id="61">
												<label for="61"></label>
											</span>
											Real estate
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Retail" id="61">
												<label for="61"></label>
											</span>
											Retail
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Telecommunications" id="61">
												<label for="61"></label>
											</span>
											Telecommunications
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Transportation" id="61">
												<label for="61"></label>
											</span>
											Transportation
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Utilities" id="61">
												<label for="61"></label>
											</span>
											Utilities
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox"  name="industryFocus" value="Other industries" id="61">
												<label for="61"></label>
											</span>
											Other industries
										</li>
										<div class="text-center col-md-2" id="readMoreReview" onclick="toggleFullReview()">
											<input type="hidden" value="<?php echo $_GET['q']; ?>" name="name">
											<button type="submit" class="btn btn-m theme-btn" id="btnFullReview">Send</button>
										</div>
									</ul>
								</div>
							</div>
						</div>
						-->	

							<input type="hidden" value="<?php echo $_POST['q']; ?>" name="q">
							<input type="hidden" value="<?php echo $_POST['cat']; ?>" name="cat">
						</form>
					</div>
					
					<!-- Start Job List -->
					<div class="col-md-9 col-sm-8">
						
						<div class="row mrg-bot-20">
							<div class="col-sm-5">
								<h4><?php echo count($companies); ?> Companies and Solutions</h4>
							</div>
							
							<div class="col-sm-7">
								
								<div class="fl-right">
									<div class="search-wide">
										<h5>Short By</h5>
									</div>
									
									<div class="search-wide full">
										<select class="wide form-control">
											<option value="1">Most Recent</option>
											<option value="2">Most Viewed</option>
											<option value="4">Most Search</option>
										</select>
									</div>
									
									<div class="search-wide full">
										<select class="wide form-control">
											<option>10 Per Page</option>
											<option value="1">20 Per Page</option>
											<option value="2">30 Per Page</option>
											<option value="4">50 Per Page</option>
										</select>
									</div>
								</div>
								
							</div>
						</div>
				
						<?php
							foreach($companies as $company) { ?>

								<!-- Single Verticle job -->
								<div class="job-verticle-list">
									<div class="vertical-job-card">
										<div class="vertical-job-header">
											<div class="vrt-job-cmp-logo">
												<a href="company-profile.php?companyId=<?php echo $company->_id; ?>"><img src="
													<?php 
														if(isset($company->softwareCat)) {
															echo $config['URLS']['API_PATH'] . "SolutionLogo/" . $company->logo;
														}
														else {
															echo $config['URLS']['API_PATH'] . "CompanyLogo/" . $company->logo;
														} 
													?>	
													" class="img-responsive" alt="" /></a>
											</div>
											<h4><a href="company-profile.php?companyId=<?php echo $company->_id; ?>"><?php echo $company->name; ?></a></h4>
											<span class="com-tagline"><?php echo $company->tagline; ?></span>
											<!--<span class="pull-right vacancy-no">No. <span class="v-count">2</span></span>-->
										</div>
										<div class="vertical-job-body">
											<div class="row">
												<div class="col-md-9 col-sm-8">
													<ul class="can-skils">
														<li><strong>Description: </strong><?php echo $company->detailedDes; ?></li>
														<li><strong>Industry Focus: </strong>
															<?php 
																$industryFocuses = explode(",", $company->services);
																foreach($industryFocuses as $industryFocus) {?>
																	<span class="skill-tag"><?php echo $industryFocus; ?></span>
																	<?php
																}	
															?>
														</li>
														<li><strong>Skills: </strong>
															<?php 
																$skills = explode(",", $company->tech);
																foreach($skills as $skill) {?>
																	<span class="skill-tag"><?php echo $skill; ?></span>
																	<?php
																}	
															?>
														</li>
														<li class="col-md-6 col-sm-6"><strong>Min. Project Size: </strong>$<?php echo $company->minProjectPrice; ?></li>
														<li class="col-md-6 col-sm-6"><strong>Avg. Hourly Rate: </strong>$<?php echo $company->avgPricePerHour; ?> / hr</li>
														<li class="col-md-6 col-sm-6"><strong>emp: </strong><?php echo $company->noOfEmp; ?></li>
														<li class="col-md-6 col-sm-6"><strong>Location: </strong><?php echo $company->country; ?></li>
													</ul>
												</div>
												<div class="col-md-3 col-sm-4">
													<div class="vrt-job-act">
														<a href="https://<?php echo str_replace("http://","", str_replace("https://","", $company->websiteLink)); ?>" target="_blank" data-toggle="modal" data-target="#apply-job" class="btn-job theme-btn job-apply">Visit Website</a>
														<a href="company-profile.php?companyId=<?php echo $company->_id; ?>" title="" class="btn-job light-gray-btn">View Profile</a>
													</div>
												</div>
											</div>
										</div>
										<div class="vertical-job-footer">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="cmp-job-rating pull-right">
														<ul>
															<li><strong>Rating: </strong>
																<i class="rate fa fa-star"></i>
																<i class="rate fa fa-star"></i>
																<i class="rate fa fa-star"></i>
																<i class="rate fa fa-star"></i>
																<i class="fa fa-star"></i>
																<span class="rating-counter">4.7/5</span>
															</li>
															<!--<li><a href="browse-job.html#" title="">(570 Review)</a></li>-->
														</ul>
													</div>
												</div>
										
											</div>
										</div>
									</div>
								</div>
						<?php
							}
						?>
						
						<?php
							if (count($companies) <= 0) {?>
								<p>No result found for your search query.</p>
								<?php
							}
							else { ?>
								<div class="text-center">
									<button type="button" class="btn theme-btn btn-m">Load More...</button>
								</div>
								<?php
							}
						?>
						
					</div>
					
				</div>
				<!-- End Row -->
				
			</div>
		</section>
		
		<!-- ====================== End Job Detail 2 ================ -->		
		
<?php
	require_once 'footer.php';
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#filter-form").on("change", "input:radio", function(){
			$("#filter-form").submit();
		});
	});

	$(document).ready(function(){
		$("#filter-form").on("change", "input:checkbox", function(){
			$("#filter-form").submit();
		});
	});
</script>