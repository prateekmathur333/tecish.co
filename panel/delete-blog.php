<?php
    require_once 'config.php';
    require_once 'function.php';

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $url = $config['URLS']['API_PATH'] . $config['URLS']['DELETE_BLOG'] . $_POST['blogId'];
        $res = sendPostRequest($url, array());
        $result = json_decode($res);
        
        echo $url;
        echo json_encode($res);

        if ($result->status == "ok") {
            header("location: all-blogs.php?success=1");
        }
        else {
            header("location: all-blogs.php?success=0");
        }
    }
    else {
        header("location: 404.php");
    }
?>