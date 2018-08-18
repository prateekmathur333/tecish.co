<?php
// define variables and set to empty values

$name = $email = $gender = $comment = $website = "";



    /*img k liye

    array(
        'file' =>
            '@'            . $_FILES['file']['tmp_name']
            . ';filename=' . $_FILES['file']['name']
            . ';type='     . $_FILES['file']['type']
    ));

    */
   
    
  $name = test_input($_GET["name"]);
  $email = test_input($_GET["email"]);
  $website = test_input($_GET["website"]);
  $comment = test_input($_GET["comment"]);
  $gender = test_input($_GET["gender"]);
 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

?>