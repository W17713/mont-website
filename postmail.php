<?php
include "sendmail.php";
// define variables and set to empty values
$errors=[];
$data=[];
$name = $email = $message = $phone = $location = $interest ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Name"])) {
        $errors["NameErr"] = "Name is required";
      } else {
        $name = test_input($_POST["Name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $errors["NameErr"] = "Only letters and white space allowed for name field";
          }
      }
    
      if (!empty($_POST["number"])) {
    $phone = test_input($_POST["number"]);
      }

    if (!empty($_POST["email"])) {
    $email = test_input($_POST["email"]);
      }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["emailErr"] = "Invalid email format";
      }

    if (!empty($_POST["interest"])) {
      $interest = test_input($_POST["interest"]);
    }

    if (!empty($_POST["Name"])) {
      $location = test_input($_POST["location"]);
    }
  if (empty($_POST["Message"])) {
    $errors["msgErr"] = "Message is required";
  } else {
    $message = test_input($_POST["Message"]);
  }

  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dm_db";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customer VALUES ('$name','$phone','$email','$interest','$location','$message')";

if ($conn->query($sql) === TRUE) {
  $data['success'] = true;
  $data['message'] = 'Success!';
} else {
  $error["connErr"]= "Error: ".$conn->error;
}

$conn->close();
if(!empty($phone)){
  $id=$phone;
}else{
  $id=$email;
}
if(!empty($interest) | !empty($location)){
$msg2send ="Name: ".$name."\n"."Contact: "$id."\n"."Interested in ".$interest."at ".$location."\n"."Msg ".$message;
}else{
$msg2send ="Name: ".$name."\n"."Contact: "$id."\n"."Interest: NA ".$interest."Location: NA ".$location."\n"."Msg ".$message; 
}
$form="Contact Us";
}


echo json_encode($data);
sendmessage($msg2send,$form);

function test_input($fielddata) {
  $fielddata = trim($fielddata);
  $fielddata = stripslashes($fielddata);
  $fielddata = htmlspecialchars($fielddata);
  return $fielddata;
}
?>