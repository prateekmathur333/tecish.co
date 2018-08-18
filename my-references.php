<?php
	session_start();

	if(!isset($_SESSION['userId'])) {
		header("location: 404.php");
	}
	require_once 'header.php'; 
	require_once 'function2.php';
	$url = $config['URLS']['API_PATH'] . $config['URLS']['MY_REFERENCES'] . $_SESSION['userId'];
	$myreferences = json_decode(sendGetRequest($url, array()));
	$myreferences = $myreferences->data;
	//print_r($myreferences);
?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>My References</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> My References</p>
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
			
			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>Add New Reference</h4>
				</div>
				<div class="box-body">
					<p>Your analyst will contact your references via email to schedule a call. 
                        After the interview is conducted, their feedback will be published to your profile.
                        <br><br>
                        Your clients' contact information is always kept confidential, and they are given 
                        the option to keep their review anonymous. Reach out to your analyst with any 
                        questions.</p>

					<div>
						<a href="add-reference.php"><button class="btn btn-m theme-btn">Add Reference</button></a>
					</div>

				</div>
			</div>

			<!-- Add Profile -->
			<div class="box">
				<div class="box-header">
					<h4>My References</h4>
				</div>
				<div class="box-body">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>S.R.</th>
						<th>Company Name</th>
						<th>Client Name</th>
						<th>Post Date</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$i = 1;
						foreach($myreferences as $reference) {?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $reference->company; ?></td>
								<td><?php echo $reference->fName . " " . $reference->lName; ?></td>
								<td><?php echo substr($reference->createdAt, 0, 10); ?>
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