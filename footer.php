<!-- ================= footer start ========================= -->
		<footer class="footer">
			<div class="container">
				
				<!-- Row Start -->
				<div class="row">
				
					<div class="col-md-8 col-sm-8">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<h4>Featured Job</h4>
								<ul>
									<li><a href="#">Browse Jobs</a></li>
									<li><a href="#">Premium MBA Jobs</a></li>
									<li><a href="#">Access Database</a></li>
									<li><a href="#">Manage Responses</a></li>
									<li><a href="#">Report a Problem</a></li>
									<li><a href="#">Mobile Site</a></li>
									<li><a href="#">Jobs by Skill</a></li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-4">
								<h4>Featured Job</h4>
								<ul>
									<li><a href="#">Browse Jobs</a></li>
									<li><a href="#">Premium MBA Jobs</a></li>
									<li><a href="#">Access Database</a></li>
									<li><a href="#">Manage Responses</a></li>
									<li><a href="#">Report a Problem</a></li>
									<li><a href="#">Mobile Site</a></li>
									<li><a href="#">Jobs by Skill</a></li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-4">
								<h4>Featured Job</h4>
								<ul>
									<li><a href="#">Browse Jobs</a></li>
									<li><a href="#">Premium MBA Jobs</a></li>
									<li><a href="#">Access Database</a></li>
									<li><a href="#">Manage Responses</a></li>
									<li><a href="#">Report a Problem</a></li>
									<li><a href="#">Mobile Site</a></li>
									<li><a href="#">Jobs by Skill</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<h4>Featured Job</h4>
						<!-- Newsletter -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter Email">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default"><i class="fa fa-location-arrow font-20"></i></button>
							</span>
						</div>
						
						<!-- Social Box -->
						<div class="f-social-box">
							<ul>
								<li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest pinterest-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
							</ul>
						</div>
						
						<!-- App Links -->
						<div class="f-app-box">
							<ul>
								<li><a href="#"><i class="fa fa-apple"></i>App Store</a></li>
								<li><a href="#"><i class="fa fa-android"></i>Play Store</a></li>
							</ul>
						</div>
						
					</div>
					
				</div>
				
				<!-- Row Start -->
				<div class="row">
					<div class="col-md-12">
						<div class="copyright text-center">
							<p>&copy; Copyright 2018 Erudite IT | Powerd By <a href="#" title="Themez Hub">WeDigTech</a></p>
						</div>
					</div>
				</div>
				
			</div>
		</footer>
		
		<!-- Sign Up Window Code -->
		<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content" id="myModalLabel">
					<div class="modal-body">
						<div class="text-center"><img src="assets/img/logo.png" class="img-responsive"></div>
						
						<ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
							<li class="nav-item active">
								<a class="nav-link" data-toggle="tab" href="#login" role="tab">
								<i class="ti-user"></i> Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#signup" role="tab">
								<i class="ti-user"></i> Sign Up</a>
							</li>
						</ul>
						
							
						<!-- Tab panels -->
						<div class="tab-content">
						
							<!-- Employer Panel 1-->
							<div class="tab-pane fade in show active" id="login" role="tabpanel">
								<form id="login-form" method="post">
									
								<div class="alert alert-danger alert-dismissable" style="display: none" id="err_msg">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									Incorrect Login Details.
								</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" id="email" class="form-control" placeholder="Email" requred>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="pass" id="pass" class="form-control" placeholder="*********" requred>
									</div>
									
									<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>Remember me
										</span>
										<a href="forgot-pass.php" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
									<div class="form-group text-center">
										<button type="submit" class="btn theme-btn full-width btn-m" id="btn" onclick="checkDetails()">LogIn <i class="fa fa-spinner fa-spin" style="display: none;" id="spinner"></i></button>
									</div>
									
								</form>
								
								<div class="log-option"><span>OR</span></div>
								
								<div class="row mrg-bot-20">
									<div class="col-md-12">
										<a href="linkedin.php" title="" class="fb-log-btn log-btn"><i class="fa fa-linkedin"></i>Sign In With Lindedin</a>
									</div>
								</div>
					
							</div>
							<!--/.Panel 1-->
							
							<!-- Candidate Panel 2 -->
							<div class="tab-pane fade" id="signup" role="tabpanel">
								<form action="signup.php" method="post">
									
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="User Name" name="email" require>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="*********" name="pass" require>
									</div>
									
									<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="4" required>
											<label for="4"></label>I agree with the terms and conditions.
										</span>
										<!--<a href="#" title="Forget" class="fl-right">Forgot Password?</a>-->
									</div>
									<div class="form-group text-center">
										<button type="submit" class="btn theme-btn full-width btn-m">Sign Up </button>
									</div>
									
								</form>
								
								<div class="log-option"><span>OR</span></div>
								
								<div class="row mrg-bot-20">
									<div class="col-md-12">
										<a href="linkedin.php" title="" class="fb-log-btn log-btn"><i class="fa fa-linkedin"></i>Sign Up With Linkedin</a>
									</div>
								</div>
								
							</div>
							
							
						</div>
						<!-- Tab panels -->
					</div>
				</div>
			</div>
		</div>   
		<!-- End Sign Up Window -->
		 
		<!-- =================== START JAVASCRIPT ================== -->
		<!-- Jquery js-->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Bootsnav js-->
		<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
		
		<!-- Slick Slider js-->
		<script src="assets/plugins/slick-slider/slick.js"></script>
		
		<!-- autocomplete tag input -->
		<script src="assets/plugins/tag-input/js/bootstrap-tagsinput.js"></script>
		<script src="assets/plugins/tag-input/js/typeahead.js"></script>
		<script>
			var services = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  prefetch: {
				url: 'assets/plugins/tag-input/data/services.json',
				filter: function(list) {
				  return $.map(list, function(name) {
					return { name: name }; });
				}
			  }
			});
			services.initialize();

			var teches = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  prefetch: {
				url: 'assets/plugins/tag-input/data/techs.json',
				filter: function(list) {
				  return $.map(list, function(name) {
					return { name: name }; });
				}
			  }
			});
			teches.initialize();
		
			$('#tags-services').tagsinput({
			  typeaheadjs: {
				name: 'services',
				displayKey: 'name',
				valueKey: 'name',
				source: services.ttAdapter()
			  }
			});

			$('#tags-teches').tagsinput({
			  typeaheadjs: {
				name: 'techs',
				displayKey: 'name',
				valueKey: 'name',
				source: teches.ttAdapter()
			  }
			});
		</script>



		<!-- wysihtml5 editor js
		<script src="assets/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
		 -->

		<!-- Aos Js -->
		<script src="assets/plugins/aos-master/aos.js"></script>
		
		<!-- Date dropper js-->
		<script src="assets/plugins/date-dropper/datedropper.js"></script>
		
		<!-- Nice Select -->
		<script src="assets/plugins/nice-select/js/jquery.nice-select.min.js"></script>
		
		<!-- Custom Js -->
		<script src="assets/js/custom.js"></script>
		
		<!--Company Profile Filters -->
		<script>
			var isFilterOptionsVisible = 0;
			function toggleFilters() {
				
				if(isFilterOptionsVisible==0) {
					$('#filterOptions').slideDown();
					isFilterOptionsVisible = 1;
					$('#btnFilter').html('Filter (-)');
				}
				else {
					$('#filterOptions').slideUp();
					isFilterOptionsVisible = 0;
					$('#btnFilter').html('Filter (+)');
				}
				
			}
		</script>


		<!--Company Profile Full Review Toggle -->
		<script>
			var isFullReviewVisible = 0;
			function toggleFullReview(id) {
				
				if(isFullReviewVisible==0) {
					$('#fullReview-' + id).slideDown();
					isFullReviewVisible = 1;
					$('#btnFullReview-' + id).html('Show Less...');
				}
				else {
					$('#fullReview-' + id).slideUp();
					isFullReviewVisible = 0;
					$('#btnFullReview-' + id).html('Read More...');
				}
				
			}
		</script>

		<script>
			$(document).ready(function() {
				//-------------------------------SELECT CASCADING-------------------------//
				var selectedCountry = (selectedRegion = selectedCity = "");
				
				url =
					"<?php echo $config['URLS']['API_PATH'] . $config['URLS']['GET_COUNTRIES']; ?>";

				// EXTRACT JSON DATA.
				$.getJSON(url, function(data) {
					//console.log(data);
					$.each(data.data, function(index, value) {
					// APPEND OR INSERT DATA TO SELECT ELEMENT.
					//console.log('<option value="' + value.id + '">' + value.name + "</option>");
					$("#country").append(
						'<option value="' + value.id + '">' + value.name + "</option>"
					);
					});
					$('select').niceSelect('update');
				});
				// Country selected --> update region list .
				$("#country").change(function() {
					selectedCountry = this.options[this.selectedIndex].value;
					countryCode = $("#country").val();
					// Populate country select box from battuta API
					url =
					"<?php echo $config['URLS']['API_PATH'] . $config['URLS']['GET_STATES']; ?>" + selectedCountry;
					//console.log(url);
					$.getJSON(url, function(data) {
					$("#region option").remove();
					$('#region').append('<option value="">Please select your region</option>');
					//console.log(data);
					$.each(data.data, function(index, value) {
						// APPEND OR INSERT DATA TO SELECT ELEMENT.
						$("#region").append(
						'<option value="' + value.id + '">' + value.name + "</option>"
						);
					});
					$('select').niceSelect('update');
					});
				});
				// Region selected --> updated city list
				$("#region").on("change", function() {
					selectedRegion = this.options[this.selectedIndex].value;
					// Populate country select box from battuta API
					url =
					"<?php echo $config['URLS']['API_PATH'] . $config['URLS']['GET_CITIES']; ?>" + selectedRegion;
					$.getJSON(url, function(data) {
					console.log(data);
					$("#city option").remove();
					$('#city').append('<option value="">Please select your city</option>');
					$.each(data.data, function(index, value) {
						// APPEND OR INSERT DATA TO SELECT ELEMENT.
						$("#city").append(
						'<option value="' + value.id + '">' + value.name + "</option>"
						);
					});
					$('select').niceSelect('update');
					});
				});
				});

		</script>

		<script>
			function checkDetails() {
				console.log("check kr rha h detail ko >>>>>>>>");
				var email = $("#email").val();
				var pass = $("#pass").val();
				$.get("<?php echo $config['URLS']['API_PATH'] . $config['URLS']['CHECK_REG']; ?>" + email, function(res) {
					console.log(res);
					
					if(res.isRegistered) {
						console.log("org pass ", res.data[0].pass);
						console.log("enter pass", pass);
						if(res.data[0].pass==pass) {
							$("#login-form").attr("action", "php/sendLoginDetail.php");
							$("#login-form").submit();
							return true;
						}
						else {
							$("#err_msg").html("Email/Password is not correct.");
							$("#err_msg").slideDown();
						}
					}
					else {
						$("#err_msg").html("You are not registered yet. Please Sign Up first.");
						$("#err_msg").slideDown();
					}
				});
				return false;
			}
		</script>

		<script>
		$('#myTab a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		})
		</script>
	
		<!-- Date Dropper Script-->
		<script>
			$('#start-date').dateDropper();
			$('#end-date').dateDropper();
			$('#founded').dateDropper();
		</script>
		
		<script>
			AOS.init();
		</script>
			  
    </body>
</html>