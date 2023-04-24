<?php
require "myphpconfigs.php";
include "sendmail.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// define variables and set to empty values
$errors=[];
$data=[];
$name = $email = $message = $phone = $location = $interest = $id ="";
$form="Contact Us";
$msg2send ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Name"])) {
        $errors["NameErr"] = "Name is required";
      } else {
        $name = test_input($_POST["Name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $errors["NameErr"] = "Only letters and white space allowed for name field";
          }
        /*if (strlen($name) < 2) {
            $errors["NameErr"] = "Name field cannot be less than 2 characters";
          }*/
      }
    
      if (!empty($_POST["phonenumber"])) {
        //$phone=$_POST["number"];
    $phone = test_input($_POST["phonenumber"]);
    if(!is_numeric($phone)){
      $errors["numberErr"]="Phone number should be only numbers";
    }else{
    if(strlen($phone) != 10 ){
      $errors["numberErr"]="Phone number should be 10 digits";
    }
  }
      }

    if (!empty($_POST["email"])) {
      //$errors["emailErr"] = "Invalid email format";}
      //$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
      //$email = test_input($_POST["email"]);
      if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST["email"]; 
        }else{
          $errors["emailErr"] = "Email format should be user@domain.com";
        }
      }else{
        $errors["emailErr"] = "Email field cannot be empty";
      }
    


    if (!empty($_POST["interest"])) {
      $interest = test_input($_POST["interest"]);
    }

    if (!empty($_POST["location"])) {
      $location = test_input($_POST["location"]);
    }

  if (empty($_POST["Message"])) {
    $errors["msgErr"] = "Message is required";
  } else {
    $message = test_input($_POST["Message"]);
  }
}
  //echo json_encode($errors);

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {


  $servername = getenv('servername');
  $username = getenv('username');
  $password = getenv('password');
  $dbname = getenv('dbname');

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customer VALUES ('$name','$phone','$email','$interest','$location','$message')";

if ($conn->query($sql) === TRUE) {
  $data['success'] = true;
  $data['message'] = 'Form successfully submitted!';

} else {
  $error["connErr"]= "Error: ".$conn->error;
}

$conn->close();

if(!empty($phone)){
  $id=$phone;
}else{
  $id=$email;
}
if(!empty($interest) || !empty($location)){
$msg2send ="Name: ".$name."\n"."Contact: ".$id."\n"."Interested in ".$interest." at ".$location."\n"."Msg: ".$message;
}else{
$msg2send ="Name: ".$name."\n"."Contact: ".$id."\n"."Interest: NA ".$interest." Location: NA ".$location."\n"."Msg: ".$message; 
}

//echo json_encode($msg2send);

//echo json_encode($data);

//sendmessage($msg2send,$form);
}
//}

echo json_encode($data);
sendmessage($msg2send,$form);





function test_input($fielddata) {
  $fielddata = trim($fielddata);
  $fielddata = stripslashes($fielddata);
  $fielddata = htmlspecialchars($fielddata);
  return $fielddata;
}


?>