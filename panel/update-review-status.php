<?php
    //session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

    require_once 'config.php';
    require_once 'function.php';

    if ($_SERVER['REQUEST_METHOD']=="POST") {
            
        foreach($_POST as $key => $value) {
            $params[$key] = $value;
        }

        //echo json_encode($params);

        $url = $config['URLS']['API_PATH'] . $config['URLS']['UPDATE_REVIEW_STATUS'];

        $str = sendPostRequest($url, $params);    

        $res = json_decode($str);

        if ($res->status=="ok") {
            header("location: all-reviews.php?success=1");   
        }
        else {
            header("location: all-reviews.php?success=0");
        }

    }
    else {
        header('location: ../404.php');
    }

?>