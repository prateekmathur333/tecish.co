<?php
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php'; 
	require_once 'function2.php';
	$url = $config['URLS']['API_PATH'] . $config['URLS']['MY_COMPANY'] . $_SESSION['userId'];
	$mycompanies = json_decode(sendGetRequest($url, array()));
	$mycompanies = $mycompanies->data;
	//echo $url;
	//print_r($mycompanies);
?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>My Company</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> My Company</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	
	<div class="container">

			<div class="col-md-12 col-sm-12">
				<div class="alert-group">
					<?php 
						if(isset($_GET['success'])) {
							if ($_GET['success']==1) { ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
									<strong>Congrats!</strong> Your company add request sent successfully. It will be reviewed and verify within 48 hrs. Check our email for more details.
								</div>
							<?php
							}
						}
					?>
						
			    </div>
			</div>

			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>Add New Company</h4>
				</div>
				<div class="box-body">
					<p>When creating your company profile, please be as thorough as possible. 
					All company profiles will be reviewed by an analyst prior to publishing. 
					You will be notified via email when your profile is published, which is 
					typically within one day of submission.</p>

					<div>
						<a href="add-company.php"><button class="btn btn-m theme-btn">Create Company</button></a>
					</div>

				</div>
			</div>

			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>My Companies</h4>
				</div>
				<div class="box-body">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>S.R.</th>
						<th>Company Name</th>
						<th>Status</th>
						<th>Profile</th>
						<th>Edit Profile</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$i = 1;
						foreach($mycompanies as $company) {?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><a href="company-profile.php?companyId=<?php echo $company->_id; ?>"><?php echo $company->name; ?></a></td>
								<td><?php 
										echo $company->status;
									?>
								</td>
								<td>
									<div>
										<a href="company-profile.php?companyId=<?php echo $company->_id; ?>"><button class="btn btn-m theme-btn">View</button></a>
									</div>
								</td>
								<td>
									<div>
										<a href="edit-company.php?companyId=<?php echo $company->_id; ?>"><button class="btn btn-m theme-btn">Edit</button></a>
									</div>
								</td>
							</tr>
						<?php
							$i = $i + 1;
						}
					?>
					</tbody>
				</table>

				</div>
			</div>
	</div>
</section>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>