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
			<h2>Add Portfolio</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Add Portfolio</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendNewPortfolioDetail.php" method="post" enctype="multipart/form-data" onsubmit="getPricingOptions()">

			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['success'])) {
							if ($_GET['success']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
									<strong>Congrats!</strong> Image successfully added into your portfolio.
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
			

			<!-- Add Portfolio -->
			<div class="box">
				<div class="box-header">
					<h4>Portfolio Details</h4>
				</div>
				<div class="box-body">
					<div class="row">

                        <div class="col-sm-4">
							<label>Title</label>
							<input type="text" name="title" id="company-name" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Company Profile</label>
							<select class="wide form-control" name="companyId" id="region" required>
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

                        <div class="col-sm-6">
                            <label>Image</label>
                            <div class="custom-file-upload">
                                <input type="file" name="imgUrl" id="file" required/>
                            </div>
                        </div>

						<!-- video need to be added in db 
                        <div class="col-sm-6">
                            <label>Video</label>
                            <div class="custom-file-upload">
                                <input type="file" name="videoName" id="file"/>
                            </div>
                        </div>
						-->
                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control height-120 textarea" placeholder="Project Description" name="description" required></textarea>
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

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>

<script>

	document.getElementById('file').onchange = function () {
		$("#file").css("display", "none");
		$(".custom-file-upload").append("<input type='text' disabled class='form-control' value='" + this.value.replace(/\\/g, '/').replace(/.*\//, '') + "'>");
	};								

</script>