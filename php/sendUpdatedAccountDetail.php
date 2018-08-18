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

        $url = $config['URLS']['API_PATH'] . $config['URLS']['EDIT_USER'];

        $str = sendPostRequest($url, $params);    

        //echo $str;

        $res = json_decode($str);

        if ($res->status=="ok") {        
            header("location: ../edit-profile.php?password=1");   
        }
        else {
            header("location: ../edit-profile.php?password=0");
        }

    }
    else {
        header('location: ../404.php');
    }

?>