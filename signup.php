<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    }
    else {
        header("location: 404.php");
    }
    require_once 'header.php'; 
?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Sign Up</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Sign Up</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		<form class="c-form" action="php/sendSignUpDetail.php" method="post" enctype="multipart/form-data">				

			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>Profile Details</h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-4">
							<label>Name</label>
							<input type="text" name="name" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Headline (Job Title)</label>
							<input type="text" name="title" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Location</label>
							<input type="text" name="location" class="form-control">
						</div>

                        <div class="col-sm-4">
                            <label>Profile Picture</label>
                            <div class="custom-file-upload">
                                <input type="file" name="file" id="file"/>
                            </div>
                        </div>

                        <div class="col-sm-4">
							<label>Public Profile URL</label>
							<input type="text" name="linkedinProfile" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Twitter Link</label>
							<input type="text" name="twitterProfile" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Industry</label>
							<input type="text" name="industry" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="mobNo" class="form-control">
						</div>

                        <div class="col-sm-4">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Password</label>
							<input type="password" name="pass" id="pass" class="form-control"  value="<?php echo $pass; ?>">
						</div>

                        <div class="col-sm-4">
							<label>Confirm Password</label>
							<input type="password" name="conPass" id="conPass" class="form-control">
						</div>

                        <div class="col-sm-12">
                            <label>Bio</label>
                            <textarea class="form-control height-120 textarea" placeholder="Bio" name="bio"></textarea>
                        </div>

					</div>
				</div>
			</div>
			
			<div class="text-center">
				<button type="submit" class="btn btn-m theme-btn">Create Account</button>
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