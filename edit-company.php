<?php
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php';
	require_once 'function2.php';

	$company = json_decode(sendGetRequest( $config['URLS']['API_PATH'] . $config['URLS']['GET_COMPANY_PROFILE'] . $_GET['companyId'] ));
	$company = $company->data[0];

?>
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title">
			<div class="container">
				<div class="page-caption">
					<h2>Edit Company</h2>
					<p><a href="index.php" title="Home">Home</a> <i class="ti-arrow-right"></i> Edit Company</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		<!-- ======================= Start Create Company ===================== -->
		<section class="create-company">
			<div class="container">
				<form class="c-form" action="php/sendUpdatedCompanyDetail.php" method="post" enctype="multipart/form-data">
					
				<div class="col-md-12 col-sm-12">
					<div class="alert-group">
						<?php 
							if(isset($_GET['success'])) {
								if($_GET['success']==0) { ?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<strong>Oh snap!</strong> Something went wrong while submitting your request.
									</div>
								<?php
								}
							}
						?>
							
						</div>
				</div>

					<!-- General Information -->
					<div class="box">
						<div class="box-header">
							<h4>General Information</h4>
						</div>
						<div class="box-body">
							<div class="row">
							
								<div class="col-sm-4">
									<label>Company Name</label>
									<input type="text" name="name" class="form-control" value="<?php echo $company->name; ?>">
								</div>
								
								<div class="col-sm-4">
									<label>Company Tagline</label>
									<input type="text" name="tagline" class="form-control" value="<?php echo $company->tagline; ?>">
								</div>
								
								<!--
								<div class="col-sm-4">
									<label>Category</label>
									<select class="wide form-control">
										<option data-display="Location">Information Of Technology</option>
										<option value="1">Hardware</option>
										<option value="2">Machanical</option>
									</select>
								</div>
								-->
																
								<div class="col-sm-4">
									<label>Owner Name</label>
									<input type="text" name="ownerName" class="form-control"  value="<?php echo $company->ownerName; ?>">
								</div>
								
								<div class="col-sm-4">
									<label>Company Logo</label>
									<div class="custom-file-upload">
										<input type="file" name="logo" id="file"/>
									</div>
								</div>
								
								<div class="col-sm-4">
									<label>Established</label>
									<input type="text" name="founded" id="founded"  value="<?php echo $company->founded; ?>" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
								</div>

								<div class="col-sm-4">
									<label>Employees</label>
									<select class="wide form-control" name="noOfEmp">
										<option data-display="- None -">- None -</option>
                                        <option value="10">1-10 employees</option>
                                        <option value="50">11-50 employees</option>
                                        <option value="200">51-200 employees</option>
                                        <option value="500">201-500 employees</option>
                                        <option value="1000">501-1000 employees</option>
                                        <option value="5000">1001-5000 employees</option>
                                        <option value="10000">5001-10000 employees</option>
                                        <option value="100000">10000+ employees</option>
									</select>
								</div>
								
								<div class="col-sm-4">
									<label>Minimum Project Size</label>
									<select class="wide form-control" name="minProjectPrice">
										<option data-display="- None -">- None -</option>
										<option value="1000">$1000+</option>
										<option value="5000">$5000+</option>
										<option value="10000">$10000+</option>
										<option value="25000">$25000+</option>
										<option value="50000">$50000+</option>
										<option value="100000">$100000+</option>
										<option value="250000">$250000+</option>
									</select>
								</div>
								
								<div class="col-sm-4">
									<label>Avg. Hourly Rate</label>
									<select class="wide form-control" name="avgPricePerHour">
										<option data-display="- None -">- None -</option>
                                        <option value="25">less than $25</option>
                                        <option value="49">$25-$49</option>
                                        <option value="99">$50-$99</option>
                                        <option value="149">$100-$149</option>
                                        <option value="199">$150-$199</option>
                                        <option value="499">$200-$499</option>
                                        <option value="500">$500+</option>
									</select>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- Company Address -->
					<div class="box">
						<div class="box-header">
							<h4>Company Address</h4>
						</div>
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-4">
									<label>Support Email</label>
									<input type="email" name="emailTechSupport" class="form-control"  value="<?php echo $company->emailTechSupport; ?>">
								</div>

								<div class="col-sm-4">
									<label>Admin Email</label>
									<input type="email" name="emailAdmin" class="form-control" value="<?php echo $company->emailAdmin; ?>">
								</div>
								
								<div class="col-sm-4">
									<label>Website</label>
									<input type="text" name="websiteLink" class="form-control" value="<?php echo $company->websiteLink; ?>">
								</div>

								<div class="col-sm-4">
									<label>Phone No.</label>
									<input type="text" name="mobNo" class="form-control" value="<?php echo $company->mobNo; ?>">
								</div>
								
								<div class="col-sm-4">
									<label>Address</label>
									<input type="text" name="street" class="form-control" value="<?php echo $company->street; ?>">
								</div>
								
								<div class="col-sm-4">
									<label>Country</label>
									<select class="wide form-control" name="country" id="country">
										<option data-display="Country">- Country -</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label>State</label>
									<select class="wide form-control" name="state" id="region">
										<option data-display="State">- State -</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label>City</label>
									<select class="wide form-control" name="city" id="city">
										<option data-display="City">- City -</option>
									</select>
								</div>
								
								<div class="col-sm-4">
									<label>Zip Code</label>
									<input type="text" name="postalCode" class="form-control" value="<?php echo $company->postalCode; ?>">
								</div>			
																
							</div>
						</div>
					</div>
					
					<!-- Social Accounts -->
					<div class="box">
						<div class="box-header">
							<h4>Social Accounts</h4>
						</div>
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-4">
									<label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
									<input type="text" name="twitterProfile" class="form-control" value="<?php echo $company->twitterProfile; ?>">
								</div>
								
								<div class="col-sm-4">
									<label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
									<input type="text" name="facebookProfile" class="form-control" value="<?php echo $company->facebookProfile; ?>">
								</div>
								
							</div>
						</div>
					</div>

					<!-- Services -->
					<div class="box">
						<div class="box-header">
							<h4>Services</h4>
						</div>
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-12">
									<label>Services Offering</label>
									<textarea class="form-control height-120 textarea" name="services" placeholder="Choose From Suggestions" id="tags-services" data-role="tagsinput"><?php echo $company->services; ?></textarea>
								</div>

								<div class="col-sm-12">
									<label>Technologies</label>
									<textarea class="form-control height-120 textarea" name="tech" placeholder="Choose From Suggestions" id="tags-teches" data-role="tagsinput"?>"><?php echo $company->tech; ?></textarea>
								</div>
	
							</div>
						</div>
					</div>
					
					<!-- Company Summery -->
					<div class="box">
						<div class="box-header">
							<h4>Company Summery</h4>
						</div>
						<div class="box-body">
							<div class="row">
								
								<div class="col-sm-12">
									<label>About Company</label>
									<textarea class="form-control height-120 textarea" placeholder="About Company" name="summary"><?php echo $company->summary; ?></textarea>
								</div>

								<div class="col-sm-12">
									<label>Key Clients</label>
									<textarea class="form-control height-120 textarea" placeholder="Key Clients (Comma Seperated)" name="client"><?php echo $company->client; ?></textarea>
								</div>

								<div class="col-sm-12">
									<label>Certifications(Maximun 1000 characters)</label>
									<textarea class="form-control height-120 textarea" placeholder="Certifications (Comma Seperated)" name="cert"><?php echo $company->cert; ?></textarea>
								</div>

								<div class="col-sm-12">
									<label>Accolades</label>
									<textarea class="form-control height-120 textarea" placeholder="Accolades" name="accolades"><?php echo $company->accolades; ?></textarea>
								</div>

								<div class="col-sm-12">
									<label>Detailed Description</label>
									<textarea class="form-control height-120 textarea" placeholder="Detailed Description" name="detailedDes"><?php echo $company->detailedDes; ?></textarea>
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="text-center">
						<input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
                        <input type="hidden" value="<?php echo $_GET['companyId']; ?>" name="companyId">
						<button type="submit" class="btn btn-m theme-btn">Submit & Exit</button>
					</div>
					
				</form>
			</div>
		</section>
		
		<!-- ====================== End Create Company ================ -->
		<?php require_once 'footer.php'; ?>

<script>

document.getElementById('file').onchange = function () {
	$("#file").css("display", "none");
	$(".custom-file-upload").append("<input type='text' disabled class='form-control' value='" + this.value.replace(/\\/g, '/').replace(/.*\//, '') + "'>");
};								

</script>