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

        $imgName = explode("@", $_POST['email'])[0] . ".jpg";
        $params['imgUrl'] = $imgName;

        //upload profile picture
        $upload_dir ="../NodeJS/public/ProfileImages/";
        //echo "upload_dir: " . $upload_dir . "<br>";
        if (file_exists($upload_dir)) {
            if (is_writable($upload_dir)) {
                $target = $upload_dir; //"dirname(__FILE__)" . "photos/";
                $target = $target . $imgName;
                $moved = move_uploaded_file($_FILES['file']['tmp_name'], "$target");
            } else {
                header("location: ../signup-msg.php?signup=0");
            }
        } else {
            header("location: ../signup-msg.php?signup=0");
        }

        //echo json_encode($params);

        $url = $config['URLS']['API_PATH'] . $config['URLS']['ADD_USER_FORM'];

        //echo $url;

        $str = sendPostRequest($url, $params);    

        //echo json_encode($str);

        $res = json_decode($str);

        //echo $res;

        if ($res->status=="ok") {
            $_SESSION['userId'] = $res->response->_id;
            $_SESSION['fullName'] = $res->response->name;
        
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