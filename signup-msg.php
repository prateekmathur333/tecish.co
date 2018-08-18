<?php require_once 'header.php'; ?>

<!-- ======================= Start Create Company ===================== -->
<section class="create-company">
	<div class="container">
			
            <?php
                if(isset($_GET['signup'])) {
                    if ($_GET['signup']==1) {?> 

                        <!-- Add Portfolio -->
                        <div class="box">
                            <div class="box-header">
                                <h4><i class="fa fa-check-circle" style="font-size: 1.6em;" aria-hidden="true"></i>&nbsp;&nbsp;New Account Created</h4>
                            </div>
                            <div class="box-body">
                                <p>
                                    Welcomem to Tecish!<br><br>
                                        Your new account has been created successfully. Please check your email for the 
                                        login details. Now you can start browsing companies or create your own.
                                </p>
                                <div class="text-center">
                                    <a href="index.php"><button class="btn btn-m theme-btn">Home</button></a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    else if($_GET['signup']==0) {?>

                        <!-- Add Portfolio -->
                        <div class="box">
                            <div class="box-header">
                                <h4><i class="fa fa-exclamation-circle" style="font-size: 1.6em;" aria-hidden="true"></i>&nbsp;&nbsp;Error</h4>
                            </div>
                            <div class="box-body">
                                <p>
                                    Due to internal server error your account creation request was not completed successfully. 
                                    Please try again after some time.
                                </p>
                                <div class="text-center">
                                    <a href="linkedin.php"><button class="btn btn-m theme-btn">Try Again</button></a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
            ?>
            
			
		</form>
	</div>
</section>

<!-- ====================== End Create Company ================ -->
<?php require_once 'footer.php'; ?>