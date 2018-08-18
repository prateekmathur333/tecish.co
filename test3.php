<?php
$errmsg = '';
if (isset($_POST['btnUpload']))
{
    $url = "http://139.59.42.1/test4.php"; // e.g. http://localhost/myuploader/test4.php // request URL
    
    print_r($_FILES);

    $filename = $_FILES['imgUrl']['name'];
    $filedata = $_FILES['imgUrl']['tmp_name'];
    $filesize = $_FILES['imgUrl']['size'];
    if ($filedata != '')
    {
        $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
        $postfields = array("filedata" => new \CURLFile(@$filedata), "filename" => $filename);
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,     
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_INFILESIZE => $filesize,
            CURLOPT_RETURNTRANSFER => true
        ); // cURL options
        curl_setopt_array($ch, $options);
        echo curl_exec($ch);
        if(!curl_errno($ch))
        {
            $info = curl_getinfo($ch);
            if ($info['http_code'] == 200)
                $errmsg = "File uploaded successfully";
        }
        else
        {
            $errmsg = curl_error($ch);
        }
        curl_close($ch);
    }
    else
    {
        $errmsg = "Please select the file";
	}
	
	echo $errmsg;
}
?>