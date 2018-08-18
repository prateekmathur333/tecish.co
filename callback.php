<?php
	session_start();
	ini_set('display_errors', '1');	
	require_once 'init.php';
	require_once 'config.php';
	require_once 'function2.php';

	$user = json_decode(getCallback());
	
	//check for new or already existing user
	$userType = sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['CHECK_REG'] . $user->emailAddress, array()); 

	$userType = json_decode($userType);

	echo json_encode($user);

	if ($userType->isRegistered) {			
		$_SESSION['userId'] = $userType->data[0]->userId->_id;
		$_SESSION['fullName'] = $userType->data[0]->userId->name;

		header("location: index.php");
	}
	else {
		$fullName = $user->firstName . " " . $user->lastName;
		$pass = random_password();		
		
		if (isset($fullName)) {
			$name = $fullName;
		}
		else {
			$name = " ";
		}

		if (isset($user->emailAddress)) {
			$email = $user->emailAddress;
		}
		else {
			$email = " ";
		}

		if (isset($user->positions->values[0]->title)) {
			$title = $user->positions->values[0]->title;
		}
		else {
			$title = " ";	
		}

		if (isset($user->location->name)) {
			$location = $user->location->name;
		}
		else {
			$location = " ";
		}

		if (isset($user->pictureUrls->values[0])) {
			$dpUrl = $user->pictureUrls->values[0];
		}
		else {
			$dpUrl = "http://139.59.42.1/assets/img/s-logo.png";
		}

		if (isset($user->publicProfileUrl)) {
			$linkedin = $user->publicProfileUrl;
		}
		else {
			$linkedin = " ";
		}

		if (isset($user->industry)) {
			$industry = $user->industry;
		}
		else {
			$industry = " ";
		}

		if (isset($user->headline)) {
			$bio = $user->headline;
		}
		else {
			$bio = " ";
		}

		//Save Details to DB			
		$data = [
			'name' => $name,
			'email' => $email,
			'pass' => $pass,
			'title' => $title,
			'location' => $location,
			'imgUrl' => $dpUrl,
			'linkedinProfile' => $linkedin,
			'industry' => $industry,
			'bio' => $bio
		];	

		echo json_encode($data);	

		$response = sendPostRequest($config['URLS']['API_PATH'] . $config['URLS']['ADD_USER_LINKEDIN'], $data);

		echo json_encode($response);

		$response = json_decode($response);

		if ($response->status == "ok") {
			//check for new or already existing user

			$userType = sendGetRequest($config['URLS']['API_PATH'] . $config['URLS']['CHECK_REG'] . $user->emailAddress, array()); 

			echo json_encode($userType);

			$userType = json_decode($userType);

			if ($userType->isRegistered) {			
				$_SESSION['userId'] = $userType->data[0]->userId->_id;
				$_SESSION['fullName'] = $userType->data[0]->userId->name;
				header("location: signup-msg.php?signup=1");
			} 
			else {
				header("location: signup-msg.php?signup=0");	
			}

		}
		else {
			header("location: signup-msg.php?signup=0");	
		}
	}
?>