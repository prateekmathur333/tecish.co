<?php
$uploadpath = "images/";
$filedata = $_FILES['filedata']['tmp_name'];
$filename = $_POST['filename'];
if ($filedata != '' && $filename != '')
    move_uploaded_file($filedata,'/var/www/html/NodeJS/public/ProfileImages/visnu.jpg');


echo $uploadpath.$filename;
?>