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

        //echo json_encode($params);

        $url = $config['URLS']['API_PATH'] . $config['URLS']['LOGIN'];

        $str = sendPostRequest($url, $params);    

        $res = json_decode($str);

        if ($res->login) {
            $_SESSION['userId'] = $res->data[0]->_id;
            $_SESSION['fullName'] = $res->data[0]->name;
        
            header("location: ../index.php");   
        }
        else {
            header("location: ../index.php");
        }

    }
    else {
        header('location: ../404.php');
    }

?>