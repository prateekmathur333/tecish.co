<?php 
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php';
?>

<style>
/* Custom Checkbox */
.checkbox-wrapper {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox-wrapper input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.checkbox-wrapper:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checkbox-wrapper input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.checkbox-wrapper input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.checkbox-wrapper .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Add Solution</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Add Solution</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendNewSolutionDetail.php" method="post" enctype="multipart/form-data" onsubmit="getPricingOptions()">
			
			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['success'])) {
							if ($_GET['success']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
									<strong>Congrats!</strong> Your solution listing request has beens submitted successfully.
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


			<!-- General Information -->
			<div class="box">
				<div class="box-header">
					<h4>General Information</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Software Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						
						<div class="col-sm-4">
							<label>Tagline</label>
							<input type="text" name="tagline" class="form-control" required>
						</div>
						
						<div class="col-sm-4">
							<label>Category</label>
							<select class="wide form-control" name="softwareCat" required>
								<option data-display="- None -">- None -</option>
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
								<option value="Website builders">Website builders</option>
							</select>
						</div>
														
						<div class="col-sm-4">
							<label>Website Link</label>
							<input type="text" name="websiteLink" class="form-control" required>
						</div>
						
						<div class="col-sm-4">
							<label>Company Logo</label>
							<div class="custom-file-upload">
								<input type="file" name="logo" id="file" required/>
							</div>
						</div>

						<div class="col-sm-4">
							<label>Employees</label>
							<select class="wide form-control" name="noOfEmp" required>
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
							<label>Directory Short Description</label>
							<input type="text" name="des" class="form-control" required>
						</div>

					</div>
				</div>
			</div>
			
			<!-- Solution Pricing Details -->
			<div class="box">
				<div class="box-header">
					<h4>Solution Summery</h4>
				</div>
				<div class="box-body">
					<div class="row">

						<div class="col-sm-4">
							<label>Price Range</label>
							<input type="text" name="priceRange" class="form-control" required>
						</div>
						
						<div class="col-sm-4">
							<label>Price Page (Provide the url for your pricing page e.g. http://www.mycompany/pricing)</label>
							<input type="text" name="PricingPage" class="form-control" required>
						</div>

						<div class="col-sm-12">
							<label class="col-sm-12">Pricing Options</label>
							<input type="hidden" value="" id="pricingOptions" name="pricingOptions" required>
							<div class="col-sm-4">
								<label class="checkbox-wrapper"> Monthly Subscription
									<input type="checkbox" value="Monthly Subscription" class="pricing-option">
 									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-sm-4">
								<label class="checkbox-wrapper"> Annual Subscription
									<input type="checkbox" value="Annual Subscription" class="pricing-option">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="col-sm-4">
								<label class="checkbox-wrapper"> One Time License
									<input type="checkbox" value="One Time License" class="pricing-option">
									<span class="checkmark"></span>
								</label>
							</div>
							
						</div>
						
						<div class="col-sm-12">
							<label>Pricing Intro Text</label>
							<textarea class="form-control height-120 textarea" placeholder="Pricing Intro Text" name="introText" required></textarea>
						</div>

						<div class="col-sm-12">
							<label>Options to Start</label>
							<textarea class="form-control height-120 textarea" placeholder="Options to Start" name="optionToStart" required></textarea>
						</div>
						
						<div class="col-sm-12">
							<label>Pricing Plan Summary (Provide 1-2 sentences overview of the rangeto your plans and a pricing range)</label>
							<textarea class="form-control height-120 textarea" placeholder="Pricing Plan Summary" name="summary" required></textarea>
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
							<label>Industry Focus</label>
							<textarea class="form-control height-120 textarea"  required name="service" placeholder="Choose From Suggestions" id="tags-services" data-role="tagsinput" ></textarea>
						</div>

					</div>
				</div>
			</div>
			
			<!-- Company Summery -->
			<div class="box">
				<div class="box-header">
					<h4>Solution Summery</h4>
				</div>
				<div class="box-body">
					<div class="row">
						
						<div class="col-sm-12">
							<label>Software Summary</label>
							<textarea class="form-control height-120 textarea" placeholder="Software Summary" name="softwareSummary" required></textarea>
						</div>

						<div class="col-sm-12">
							<label>Key Clients</label>
							<textarea class="form-control height-120 textarea" placeholder="Key Clients (Comma Seperated)" name="client" required></textarea>
						</div>
					
					</div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
				<button type="submit" class="btn btn-m theme-btn">Submit & Exit</button>
			</div>
			
		</form>
	</div>
</section>

<script>
	function getPricingOptions() {
		var checkedValue = ""; 
		var inputElements = document.getElementsByClassName('pricing-option');
		for(var i=0; inputElements[i]; ++i){
			if(inputElements[i].checked){
				if(i==0) {
					checkedValue = inputElements[i].value;
				}
				else {
					checkedValue += ", " + inputElements[i].value;
				}
			}
		}
		$("#pricingOptions").val(checkedValue);
	}
</script>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>

<script>

document.getElementById('file').onchange = function () {
	$("#file").css("display", "none");
	$(".custom-file-upload").append("<input type='text' disabled class='form-control' value='" + this.value.replace(/\\/g, '/').replace(/.*\//, '') + "'>");
};								

</script>