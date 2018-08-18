<?php
    session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

    require_once '../config.php';
    require_once '../function2.php';

    if ($_SERVER['REQUEST_METHOD']=="POST") {
            
        foreach($_POST as $key => $value) {
            $params[$key] = $value;
        }

        echo json_encode($params);

        $url = $config['URLS']['API_PATH'] . $config['URLS']['FORGOT_PASS_3'];

        $str = sendPostRequest($url, $params);    

        echo json_encode($str);

        $res = json_decode($str);

        if ($res->status=="ok") {
            $_SESSION['fullName'] = $res->data[0]->name;
        
            header("location: ../index.php");   
        }
        else {
            header("location: ../verify-otp.php?e=1&m=incorrect otp");
        }

    }
    else {
        header('location: ../404.php');
    }
?>