<?php require_once 'header.php'; ?>

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Forgot Password</h2>
			<p><a href="create-company.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Forgot Password</p>
		</div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
		
            <form class="c-form" action="php/sendForgetPass1.php" method="post">

                <div class="col-md-12 col-sm-12">
                    <div class="alert-group">
                        <?php 
                            if(isset($_GET['e'])) {
                                if ($_GET['e']==1) { ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                                        <?php echo $_GET['m']; ?>
                                    </div>
                                <?php
                                }
                            }
                        ?>        
                    </div>
                </div>

                <!-- Step 1 -->
                <div class="box">
                    <div class="box-header">
                        <h4>Account Detail</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Email</label>
                                <input type="text" name="email" id="company-name" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-m theme-btn">Send OTP</button>
                </div>
            </form>
        
    	</div>
</section>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>