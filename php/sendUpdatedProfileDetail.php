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

        echo json_encode($params);

        if (isset($_FILES['imgUrl']['tmp_name'])) {
            $imgName = date("Ymdhisa") . $_FILES['imgUrl']['name'];
            $params['imgUrl'] = $imgName;

            //upload profile picture
            $upload_dir ="../NodeJS/public/ProfileImages/";
            //echo "upload_dir: " . $upload_dir . "<br>";
            if (file_exists($upload_dir)) {
                if (is_writable($upload_dir)) {
                    $target = $upload_dir; //"dirname(__FILE__)" . "photos/";
                    $target = $target . $imgName;
                    $moved = move_uploaded_file($_FILES['imgUrl']['tmp_name'], "$target");
                } else {
                    header("location: ../edit-profile.php?success=0");
                }
            } else {
                header("location: ../edit-profile.php?success=0");
            }
        }

        $url = $config['URLS']['API_PATH'] . $config['URLS']['EDIT_USER'];

        $str = sendPostRequest($url, $params);    

        echo $str;

        $res = json_decode($str);

        if ($res->status=="ok") {        
            header("location: ../my-profile.php?success=1");   
        }
        else {
            header("location: ../edit-profile.php?success=0");
        }

    }
    else {
        header('location: ../404.php');
    }

?>