<?php 
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php'; 
	require_once 'function2.php';
?>

<style>
fieldset, label { margin: 0; padding: 0; }

/****** Style Star Rating Widget *****/

.rating { 
 border: none;
 float: left;
  }

.rating > input { display: none; } 
.rating > label:before { 
 margin: 5px;
 font-size: 1.25em;
 font-family: FontAwesome;
 display: inline-block;
 content: "\f005";
  }

 .rating > .half:before { 
  content: "\f089";
  position: absolute;
   }

   .rating > label { 
    color: #ddd; 
    float: right; 
     }

     /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
     .rating:not(:checked) > label:hover, /* hover current star */
      .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } 
       /*        hover previous stars in list */

       .rating > input:checked + label:hover,
       .rating > input:checked ~ label:hover,
       .rating > label:hover ~ input:checked ~ label, 
       .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Submit A Review</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Submit A Review</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendNewReviewDetail.php" method="post">

			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['success'])) {
							if ($_GET['success']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
									<strong>Congrats!</strong> Your review has beens submitted successfully.
								</div>
							<?php
							}
							else if($_GET['success']==0) { ?>
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
			

			<!-- Company Name -->
			<div class="box">
				<div class="box-header">
					<h4>Company Name</h4>
				</div>
				<div class="box-body">
					<div class="row">
						
						<div class="col-sm-4" id="heading">
							<label>Name of The Reviewing Company</label>
							<input type="text" id="company-name" list="company-datalist" autocomplete="off" class="form-control">
							<datalist id="company-datalist"></datalist>
						</div>
						
					</div>
				</div>
			</div>
			<div style="display: none;" id="review-detail">
			<!-- Project Details -->
			<div class="box">
				<div class="box-header">
					<h4>Project Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Project Title</label>
							<input type="text" name="projectTitle" class="form-control">
						</div>
						
						<div class="col-sm-4">
							<label>Category</label>
							<select class="wide form-control" name="typeOfProject">
								<option data-display="- None -" value="Mobile App developement">- None -</option>
								
								<?php
						
									$url =  $config['URLS']['API_PATH'] . $config['URLS']['GET_CAT'];
															
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

						<div class="col-sm-4">
							<label>Industry</label>
							<select class="wide form-control" name="industry">
								<option data-display="- None -">- None -</option>
								<option value="Advertising &amp; marketing">Advertising &amp; marketing</option>
								<option value="Automotive">Automotive</option>
								<option value="Arts, entertainment &amp; music">Arts, entertainment &amp; music</option>
								<option value="Business services">Business services</option>
								<option value="Consumer products">Consumer products</option>
								<option value="Education">Education</option>
								<option value="Energy &amp; natural resources">Energy &amp; natural resources</option>
								<option value="Financial services">Financial services</option>
								<option value="Gambling">Gambling</option>
								<option value="Gaming">Gaming</option>
								<option value="Government">Government</option>
								<option value="Healthcare">Healthcare</option>
								<option value="Hospitality &amp; leisure">Hospitality &amp; leisure</option>
								<option value="Information technology">Information technology</option>
								<option value="Legal">Legal</option>
								<option value="Manufacturing">Manufacturing</option>
								<option value="Media">Media</option>
								<option value="Nonprofit">Nonprofit</option>
								<option value="Real estate">Real estate</option>
								<option value="Retail">Retail</option>
								<option value="Telecommunications">Telecommunications</option>
								<option value="Transportation">Transportation</option>
								<option value="Utilities">Utilities</option>
								<option value="Other industry">Other industry</option>
							</select>
						</div>
						
						<div class="col-sm-4">
							<label>Cost Range</label>
							<select class="wide form-control" name="cost" required>
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
							<label>Project Start Date</label>
							<input type="text" name="startDate" id="start-date" data-lang="en" data-large-mode="true" data-min-year="1900" data-max-year="2018" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
						</div>

						<div class="col-sm-4">
							<label>Project End Date</label>
							<input type="text" name="endDate" id="end-date" data-lang="en" data-large-mode="true" data-min-year="1900" data-max-year="2018" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
						</div>

					</div>
				</div>
			</div>
			
			<!-- The Review -->

			<!-- Background -->
			<div class="box">
				<div class="box-header">
					<h4>Background</h4>
				</div>
				<div class="box-body">
					<div class="row">

						<div class="col-sm-12">
							<label>Your company and position there</label>
							<textarea class="form-control height-120 textarea" placeholder="Company & Position" name="background"></textarea>
						</div>

					</div>
				</div>
			</div>

			<!-- challenges -->
			<div class="box">
				<div class="box-header">
					<h4>Challenge</h4>
				</div>
				<div class="box-body">
					<div class="row">

						<div class="col-sm-12">
							<label>For what projects/services did this company hired?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="cService"></textarea>
						</div>

						<div class="col-sm-12">
							<label>What were your goals for this project?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="cGoal"></textarea>
						</div>

					</div>
				</div>
			</div>

			<!-- Solution -->
			<div class="box">
				<div class="box-header">
					<h4>Solution</h4>
				</div>
				<div class="box-body">
					<div class="row">

						<div class="col-sm-12">
							<label>How did you select this vendor?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="vendor"></textarea>
						</div>

						<div class="col-sm-12">
							<label>Describe the project in detail.</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="projectDetail"></textarea>
						</div>

						<div class="col-sm-12">
							<label>What was the team composition?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="teamComposition"></textarea>
						</div>

					</div>
				</div>
			</div>

			<!-- Results & Feedback -->
			<div class="box">
				<div class="box-header">
					<h4>Results & Feedback</h4>
				</div>
				<div class="box-body">
					<div class="row">

						<div class="col-sm-12">
							<label>Can you share any outcomes from the project that demonstrate progress or success?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="outcome"></textarea>
						</div>

						<div class="col-sm-12">
							<label>How effective was the workflow between your team and theirs?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="effective"></textarea>
						</div>

						<div class="col-sm-12">
							<label>What did you find most impressive about this company?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="keyFeature"></textarea>
						</div>

						<div class="col-sm-12">
							<label>Are there any areas for improvement?</label>
							<textarea class="form-control height-120 textarea" placeholder="Write your details here" name="improvements"></textarea>
						</div>

					</div>
				</div>
			</div>

			<!-- Rating -->
			<div class="box">
				<div class="box-header">
					<h4>Rating</h4>
				</div>
				<div class="box-body">
					<div class="row">
						
						<div class="col-sm-6">
							<label>How was the quality of work?</label>
							<div class="col-sm-12">
							<fieldset class="rating">
								<input type="radio" id="star5_1" name="qRating" value="5" /><label class = "full" for="star5_1" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half_1" name="qRating" value="4.5" /><label class="half" for="star4half_1" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4_1" name="qRating" value="4" /><label class = "full" for="star4_1" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half_1" name="qRating" value="3.5" /><label class="half" for="star3half_1" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3_1" name="qRating" value="3" /><label class = "full" for="star3_1" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half_1" name="qRating" value="2.5" /><label class="half" for="star2half_1" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2_1" name="qRating" value="2" /><label class = "full" for="star2_1" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half_1" name="qRating" value="1.5" /><label class="half" for="star1half_1" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1_1" name="qRating" value="1" /><label class = "full" for="star1_1" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf_1" name="qRating" value="0.5" /><label class="half" for="starhalf_1" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
							<input type="text" name="qDetail" placeholder="Write Something here" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
							<label>How was scheduling?</label>
							<div class="col-sm-12">
							<fieldset class="rating">
								<input type="radio" id="star5_2" name="sRating" value="5" /><label class = "full" for="star5_2" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half_2" name="sRating" value="4.5" /><label class="half" for="star4half_2" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4_2" name="sRating" value="4" /><label class = "full" for="star4_2" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half_2" name="sRating" value="3.5" /><label class="half" for="star3half_2" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3_2" name="sRating" value="3" /><label class = "full" for="star3_2" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half_2" name="sRating" value="2.5" /><label class="half" for="star2half_2" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2_2" name="sRating" value="2" /><label class = "full" for="star2_2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half_2" name="sRating" value="1.5" /><label class="half" for="star1half_2" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1_2" name="sRating" value="1" /><label class = "full" for="star1_2" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf_2" name="sRating" value="0.5" /><label class="half" for="starhalf_2" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
							<input type="text" name="sDetail" placeholder="Write Something here" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
							<label>How was the cost of work?</label>
							<div class="col-sm-12">
							<fieldset class="rating">
								<input type="radio" id="star5_3" name="cRating" value="5" /><label class = "full" for="star5_3" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half_3" name="cRating" value="4.5" /><label class="half" for="star4half_3" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4_3" name="cRating" value="4" /><label class = "full" for="star4_3" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half_3" name="cRating" value="3.5" /><label class="half" for="star3half_3" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3_3" name="cRating" value="3" /><label class = "full" for="star3_3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half_3" name="cRating" value="2.5" /><label class="half" for="star2half_3" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2_3" name="cRating" value="2" /><label class = "full" for="star2_3" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half_3" name="cRating" value="1.5" /><label class="half" for="star1half_3" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1_3" name="cRating" value="1" /><label class = "full" for="star1_3" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf_3" name="cRating" value="0.5" /><label class="half" for="starhalf_3" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
							<input type="text" name="cDetail" placeholder="Write Something here" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
							<label>How likely are you to refer this company to a friend?</label>
							<div class="col-sm-12">
							<fieldset class="rating">
								<input type="radio" id="star5_4" name="rRating" value="5" /><label class = "full" for="star5_4" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half_4" name="rRating" value="4.5" /><label class="half" for="star4half_4" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4_4" name="rRating" value="4" /><label class = "full" for="star4_4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half_4" name="rRating" value="3.5" /><label class="half" for="star3half_4" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3_4" name="rRating" value="3" /><label class = "full" for="star3_4" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half_4" name="rRating" value="2.5" /><label class="half" for="star2half_4" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2_4" name="rRating" value="2" /><label class = "full" for="star2_4" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half_4" name="rRating" value="1.5" /><label class="half" for="star1half_4" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1_4" name="rRating" value="1" /><label class = "full" for="star1_4" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf_4" name="rRating" value="0.5" /><label class="half" for="starhalf_4" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
							<input type="text" name="rDetail" placeholder="Write Something here" class="form-control">
							</div>
						</div>

						<div class="col-sm-6">
							<label>Give company an overall rating.</label>
							<div class="col-sm-12">
							<fieldset class="rating">
								<input type="radio" id="star5_5" name="oRating" value="5" /><label class = "full" for="star5_5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4half_5" name="oRating" value="4.5" /><label class="half" for="star4half_5" title="Pretty good - 4.5 stars"></label>
								<input type="radio" id="star4_5" name="oRating" value="4" /><label class = "full" for="star4_5" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3half_5" name="oRating" value="3.5" /><label class="half" for="star3half_5" title="Meh - 3.5 stars"></label>
								<input type="radio" id="star3_5" name="oRating" value="3" /><label class = "full" for="star3_5" title="Meh - 3 stars"></label>
								<input type="radio" id="star2half_5" name="oRating" value="2.5" /><label class="half" for="star2half_5" title="Kinda bad - 2.5 stars"></label>
								<input type="radio" id="star2_5" name="oRating" value="2" /><label class = "full" for="star2_5" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1half_5" name="oRating" value="1.5" /><label class="half" for="star1half_5" title="Meh - 1.5 stars"></label>
								<input type="radio" id="star1_5" name="oRating" value="1" /><label class = "full" for="star1_5" title="Sucks big time - 1 star"></label>
								<input type="radio" id="starhalf_5" name="oRating" value="0.5" /><label class="half" for="starhalf_5" title="Sucks big time - 0.5 stars"></label>
							</fieldset>
							<input type="text" name="oDetail" placeholder="Write Something here" class="form-control">
							</div>
						</div>

					</div>
				</div>
			</div>
			
			<!-- The Reviewer -->
			<div class="box">
				<div class="box-header">
					<h4>The Reviewer</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Full Name</label>
							<input type="text" name="fullName" class="form-control">
						</div>

						<div class="col-sm-4">
							<label>Position</label>
							<input type="text" name="position" class="form-control">
						</div>

						<div class="col-sm-4">
							<label>Company Name</label>
							<input type="text" name="companyName" class="form-control">
						</div>
						
						<div class="col-sm-4">
							<label>Company Size</label>
							<select class="wide form-control" name="companySize">
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
							<label>Country</label>
							<select class="wide form-control" name="country" id="country" required>
								<option data-display="Country">- Country -</option>
							</select>
						</div>

						<div class="col-sm-4">
							<label>Your Email</label>
							<input type="text" name="email" class="form-control">
						</div>

						<div class="col-sm-4">
							<label>Your Phone Number</label>
							<input type="text" name="mobNo" class="form-control">
						</div>

					</div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
				<input type="hidden" value="" name="companyId" id="cId">
				<button type="submit" class="btn btn-m theme-btn">Submit & Exit</button>
			</div>
			</div>
		</form>
	</div>
</section>

<script>

	var dataList = document.getElementById('company-datalist');
	var input = document.getElementById('company-name');

	// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();

// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
	  console.log("status: ", request.status);
    if (request.status === 200) {
	  // Parse the JSON
	  console.log("res: ", request.responseText);
      var jsonOptions = JSON.parse(request.responseText);
		var companyList = jsonOptions.data;
		console.log(jsonOptions, companyList);
      // Loop over the JSON array.
      companyList.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item._id;
	option.innerHTML = item.name;
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
      });

      // Update the placeholder text.
      input.placeholder = "e.g. datalist";
    } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
    }
  }
};

// Update the placeholder text.
input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', 'http://139.59.42.1:8181/company/only/name/list/', true);
request.send();

</script>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>

<script>
//on company id selected 
$("#company-name").on('input', function () {
	var val = this.value;
    if($('#company-datalist').find('option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //send ajax request
        
	// Create a new XMLHttpRequest.
	var requestName = new XMLHttpRequest();

	requestName.onreadystatechange = function(response) {
  		if (requestName.readyState === 4) {
    			if (requestName.status === 200) {
					  // Parse the JSON
					
					  var companyObj = JSON.parse(requestName.responseText);
					  console.log("comObj", companyObj);
					  var comObj = companyObj.data[0];
				$("#heading").html("<h3>" + comObj.name + "</h3>");
				document.getElementById('cId').value = val;
				$("#review-detail").slideDown();
	      		} else {
      				input.placeholder = "Couldn't load datalist options :(";
    			}
  		}
	};

	// Set up and make the request.
	requestName.open('GET', 'http://139.59.42.1:8181/company/' + this.value, true);
	requestName.send();
    }
});

</script>