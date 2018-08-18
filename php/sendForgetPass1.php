<?php
    //session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

    require_once '../config.php';
    require_once '../function2.php';

    if ($_SERVER['REQUEST_METHOD']=="POST") {
            
        foreach($_POST as $key => $value) {
            $params[$key] = $value;
        }

        //echo json_encode($params);

        $url = $config['URLS']['API_PATH'] . $config['URLS']['FORGOT_PASS_1'];

        $str = sendPostRequest($url, $params);    

        $res = json_decode($str);

        if ($res->status=="ok") {
            /*$_SESSION['userId'] = $res->data[0]->_id;
            $_SESSION['fullName'] = $res->data[0]->name;*/
        
            header("location: ../verify-otp.php");   
        }
        else {
            header("location: ../forgot-pass.php?e=1&m=" . $res->msg);
        }

    }
    else {
        header('location: ../404.php');
    }

?>