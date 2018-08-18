<?php 
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php';
	require_once 'function2.php';
?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Add Reference</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Add Reference</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendNewReferenceDetail.php" method="post">

			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['success'])) {
							if ($_GET['success']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
									<strong>Congrats!</strong> References added successfully.
								</div>
							<?php
							}
							else if($_GET['success']==0) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
									<strong>Oh snap!</strong> Something went wrong while submitting your request.
								</div>
							<?php
							}
						}
					?>
					
				</div>
			</div>
			

			<!-- Company Name -->
			<div class="box">
				<div class="box-header">
					<h4>Company Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						
						<div class="col-sm-4">
							<label>Company Profile</label>
							<select class="wide form-control" name="companyId" id="companyId" required>
                                <option data-display="- Company -">- Company -</option>
								<?php
						
									$url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_COMPANY_USER_WISE'] . $_SESSION['userId'];
									
									$data = sendGetRequest($url, array());
									
									$json = json_decode($data);
								
									$json = $json->data;
					
									foreach($json as $obj) {
										// echo "<script>console.log('vipul')</script>"  ;     
											echo "<option value=" . $obj->_id . ">" . $obj->name . "</option>";
									}    
									
								?>
                            </select>
						</div>
						
					</div>
				</div>
			</div>

			<!-- Client Details -->
			<div class="box">
				<div class="box-header">
					<h4>Client Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>First Name</label>
							<input type="text" name="fName" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Last Name</label>
							<input type="text" name="lName" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Company</label>
							<input type="text" name="company" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Position</label>
							<input type="text" name="positionAtCompany" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="mobNo" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required>
						</div>

                        <div class="col-sm-4">
                            <label>Country</label>
                            <select class="wide form-control" name="country" id="country" required>
                                <option data-display="Country">- Country -</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label>State</label>
                            <select class="wide form-control" name="state" id="region" required>
				<option data-display="State">- State -</option>
			    </select>                        
			</div>

                        <div class="col-sm-4">
                            <label>City</label>
                            <select class="wide form-control" name="city" id="city" required>
				<option data-display="City">- City -</option>
	         	    </select>                        
			</div>

                        <div class="col-sm-4">
                            <label>Minimum Project Size</label>
                            <select class="wide form-control" name="projectCost" required>
                                <option data-display="- None -">- None -</option>
                                <option value="1">Less than $5,000</option>
								<option value="2">$5,000 - $10,000</option>
								<option value="3">$10,000 - $25,000</option>
								<option value="4">$25,000 - $50,000</option>
								<option value="5">$50,000 - $100,000</option>
								<option value="6">$100,000 - $250,000</option>
								<option value="7">$250,000 - $500,000</option>
								<option value="8">$500,000 - $1,000,000</option>
								<option value="9">$1,000,000 - $5,000,000</option>
								<option value="10">$5,000,000+</option>
								<option value="11">Confidential</option>
                            </select>
                        </div>

						<!-- not in db -->
                        <div class="col-sm-4">
							<label>Project Length (eg. June 2018-August 2018)</label>
							<input type="text" name="projectLength" class="form-control" required>
						</div>

                        <div class="col-sm-12">
                            <label>Project Description</label>
                            <textarea class="form-control height-120 textarea" placeholder="Project Description" name="projectDescription" required></textarea>
                        </div>

					</div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
				<button type="submit" class="btn btn-m theme-btn">Add Reference</button>
			</div>
			
		</form>
	</div>
</section>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>