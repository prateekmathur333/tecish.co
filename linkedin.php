<?php 	
    require_once 'init.php';
    header("location: https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=" . 
		$client_id . "&redirect_uri=" . $redirect_uri . "&state=" . $csrf_token . "&scope=" . $scope ); 
?>