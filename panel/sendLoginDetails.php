<?php
    session_start();
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

        $url = $config['URLS']['API_PATH'] . $config['URLS']['ADMIN_LOGIN'];

        $str = sendPostRequest($url, $params);    

        //echo $str;

        $res = json_decode($str);

        if ($res->login) {
            $_SESSION['adminId'] = $res->data[0]->_id;
            $_SESSION['adminName'] = $res->data[0]->name;
        
            header("location: dashboard.php");   
        }
        else {
            header("location: index.php?e=Incorrect email/password.");
        }

    }
    else {
        header('location: ../404.php');
    }

?>