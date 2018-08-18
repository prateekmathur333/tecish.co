<?php

    require_once 'config.php';

    function getData($params) {
        global $config;
        $url =  $config['URLS']['API_PATH'] . $params;
        $data = file_get_contents($url);
        $json = json_decode($data, true);
        return $json;    
    }

    function sendGetRequest($endPoint, $params) {
        global $config;

        $ch = curl_init();
        $url = $config['URLS']['API_PATH'] . $endPoint . "?" . http_build_query($params);

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

    function sendPostRequest($endPoint, $postfields) {
        global $config;

        $ch = curl_init();
        $url = $config['URLS']['API_PATH'] . $endPoint;

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
       
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
            $result = "{'success': false, 'error': " . curl_error($con) . " }";
        }

        curl_close($ch);

        return $result;
    }

    function sendPostRequestWithImage($endPoint, $postfields) {
        global $config;

        $headers = array(
            "Cache-Control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
          ); // cURL headers for file uploading
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'http://139.59.42.1:8181/' . $endPoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_PORT, "8181");
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
        curl_setopt($ch, CURLOPT_REFERER, 'http://139.59.42.1/');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $result = '';
        echo $response;

        if(!curl_errno($ch))
        {
            $info = curl_getinfo($ch);
            if ($info['http_code'] == 200) {
                $result = $response;
                echo "code 200";
            }
            else {
                echo $info['http_code'];
            }
        }
        else
        {
            $result = "{'success': false, 'error': " . curl_error($ch) . " }";
            echo "error agai.";
        }

        curl_close($ch);

        return $result;
    }

    /*function sendPostRequestWithImage($endPoint, $postfields) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8181",
            CURLOPT_URL => "http://139.59.42.1:8181/user/add/form",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => array(
              "Cache-Control: no-cache",
              "Content-Type: application/x-www-form-urlencoded",
              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            echo $response;
          }
    }*/



?>