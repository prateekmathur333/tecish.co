<?php
    require_once 'function.php';

    foreach($_GET as $key => $value) {
        $params[$key] = $value;
    }

    $isImage = isset($_FILES['file']['tmp_name']);

    if ($isImage) {
        $params['file'] = new \CURLFile(@$_FILES['file']['tmp_name']);
    }
    else {
        echo "no image";
    }

    /*foreach($_FILES as $key => $value) {
        foreach($value as $k => $v) {
            $params[$k] = $v;  
            'file' =>
            
        }
    }*/
    
    echo "result: ";
    echo sendGetRequest('test-result.php', $params);
?>