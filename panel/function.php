<?php

function sendGetRequest($endPoint, $params) {
    global $config;

    $ch = curl_init();
    $url = $endPoint . "?" . http_build_query($params);

    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
   
    $response =  curl_exec($ch);

    $result = '';

    if(!curl_errno($ch))
    {
        $info = curl_getinfo($ch);
        if ($info['http_code'] == 200) {
            $result = $response;
        }
    }
    else
    {
        $result = "{'success': false, 'error': " . curl_error($ch) . " }";
    }

    curl_close($ch);

    return $result;
}

function sendPostRequest($url, $parameters) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = [];
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

function uploadImage() {
    $upload_dir ="../NodeJS/public/ProfileImages/";
        echo "upload_dir: " . $upload_dir . "<br>";
        if (file_exists($upload_dir)) {
            if (is_writable($upload_dir)) {
                $target = $upload_dir; //"dirname(__FILE__)" . "photos/";
                $target = $target . 'Visnu.png';
                $moved = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$target");
                echo "isMoved: " . $moved;
            } else {
                echo 'Upload directory is not writable<br>';
            }
        } else {
            echo 'Upload directory does not exist.<br>';
        }
        echo $target . "<br>";
        //  echo dirname(__FILE__)."<br>";
        echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
        echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
        echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["fileToUpload"]["tmp_name"];
}

?>