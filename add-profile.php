<?php 
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php'; 
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
		<form class="c-form" action="<?php echo $config['URLS']['API_PATH'] . $config['URLS']['ADD_PROFILE']; ?>" method="post">				

			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>Profile Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Headline (Job Title)</label>
							<input type="text" name="title" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Location</label>
							<input type="text" name="location" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="mobNo" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Public Profile URL</label>
							<input type="text" name="linkedinProfile" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Twitter Link</label>
							<input type="text" name="twitterProfile" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Industry</label>
							<input type="text" name="industry" class="form-control" required>
						</div>

                        <div class="col-sm-12">
                            <label>Bio</label>
                            <textarea class="form-control height-120 textarea" placeholder="Bio" name="bio" required></textarea>
                        </div>

					</div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" value="<?php echo $_POST['regId']; ?>" name="regId">
				<button type="submit" class="btn btn-m theme-btn">Submit & Exit</button>
			</div>
			
		</form>
	</div>
</section>

<!-- ====================== End Create Company ================ -->
<script>

	document.getElementById('file').onchange = function () {
		$("#file").css("display", "none");
		$(".custom-file-upload").append("<input type='text' disabled class='form-control' value='" + this.value.replace(/\\/g, '/').replace(/.*\//, '') + "'>");
	};								

</script>