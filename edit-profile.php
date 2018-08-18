<?php 
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php';
	require_once 'function2.php'; 
	$user = json_decode(sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['GET_USER_PROFILE'] . $_SESSION['userId'], array()));
?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Edit Profile</h2>
			<p><a href="index.php" title="Home">Home</a> <i class="ti-arrow-right"></i> Edit Profile</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendUpdatedProfileDetail.php" method="post" enctype="multipart/form-data">
		
			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['profile'])) {
							if ($_GET['profile']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									Your Profile Updated Successfully.
								</div>
							<?php
							}
							else if($_GET['profile']==0) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<strong>Oh snap!</strong> Something went wrong while submitting your request.
								</div>
							<?php
							}
						}
					?>
						
			    </div>
			</div>


			<!-- Edit Profile -->
			<div class="box">
				<div class="box-header">
					<h4>Profile Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Headline (Job Title)</label>
							<input type="text" name="title" class="form-control" value="<?php echo $user->title; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Location</label>
							<input type="text" name="location" class="form-control" value="<?php echo $user->location; ?>">
						</div>

						<div class="col-sm-4">
							<label>Profile Picture</label>
							<div class="custom-file-upload">
								<input type="file" name="imgUrl" id="file"/>
							</div>
						</div>

                        <div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="mobNo" class="form-control" value="<?php echo $user->mobNo; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Public Profile URL</label>
							<input type="text" name="linkedinProfile" class="form-control" value="<?php echo $user->linkedinProfile; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Twitter Link</label>
							<input type="text" name="twitterProfile" class="form-control" value="<?php echo $user->twitterProfile; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Industry</label>
							<input type="text" name="industry" class="form-control" value="<?php echo $user->industry; ?>">
						</div>

                        <div class="col-sm-12">
                            <label>Bio</label>
                            <textarea class="form-control height-120 textarea" placeholder="Bio" name="bio"><?php echo $user->bio; ?></textarea>
                        </div>

					</div>
				</div>
			</div>

			<div class="text-center">
				<input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
				<button type="submit" class="btn btn-m theme-btn">Update Profile</button>
			</div>
			
		</form>

		<form class="c-form" action="php/sendUpdatedAccountDetail.php" method="post" onsubmit="checkPass()">

            <!-- Account Detail -->
			<div class="box">
				<div class="box-header">
					<h4>Account Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
	
						<?php
							if (isset($_GET['password'])) {
								if ($_GET['password']==0) {
									?>
									<div class="alert alert-danger alert-dismissable col-sm-12">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										Incorrect current Password. Please make sure you type correct current password.
									</div>
								<?php
								}
								else if($_GET['password']==1){
									?>
									<div class="alert alert-success alert-dismissable col-sm-12">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										Your Account Details Updated.
									</div>
									<?php
								}
							}
						?>
			
						<div class="col-sm-4">
							<label>Email</label>
							<input type="email" name="email" class="form-control" disabled value="<?php echo $user->email; ?>" required>
						</div>

                        <div class="col-sm-4">
							<label>Password</label>
							<input type="password" name="pass" id="newPass" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Confirm Password</label>
							<input type="password" name="conPass" id="conPass" class="form-control" required>
						</div>

                        <div class="col-sm-4">
							<label>Current Password</label>
							<input type="password" name="currPass" id="currPass" class="form-control" required>
						</div>

					</div>
				</div>
			</div>
			
			<div class="text-center">
				<input type="hidden" value="<?php echo $_SESSION['regId']; ?>" name="regId">
				<button type="submit" class="btn btn-m theme-btn">Chnage Password</button>
			</div>
			
		</form>
	</div>
</section>

<script>
	function checkPass() {
		var newPass = $('#newPass').val();
		var conPass = $('#conPass').val();
		if(newPass !== conPass) {
			console.log("Password not matched.");
		}
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