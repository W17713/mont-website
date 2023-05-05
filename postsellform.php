<?php
include "sendmail.php";
// define variables and set to empty values
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors=[];
$data=[];
$name = $description = $email = $address = $valuation = $beds = $city = $zipcode = $state = $baths ="";
$form = "Sell";
$msg2send ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errors["NameErr"] = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $errors["NameErr"] = "Only letters and white space allowed for name";
          }
      }
    
      if (!empty($_POST["description"])) {
        $description = test_input($_POST["description"]);
          }

      if (!empty($_POST["valuation"])) {
        $valuation = test_input($_POST["valuation"]);
          }

    if (!empty($_POST["beds"])) {
    $beds = test_input($_POST["beds"]);
      }

    if (!empty($_POST["baths"])) {
        $baths = test_input($_POST["baths"]);
          }

    if (!empty($_POST["email"])) {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["emailErr"] = "Invalid email format";
      }
      }else{
        $errors["emailErr"] = "email field cannot be empty";
      }
    
    if (!empty($_POST["address"])) {
      $address = test_input($_POST["address"]);
    }else{
        $errors["addressErr"]="address field cannot be empty";
    }

    if (!empty($_POST["city"])) {
        $city = test_input($_POST["city"]);
      }else{
          $errors["cityErr"]="address field cannot be empty";
      }

      if (!empty($_POST["zipcode"])) {
        $zipcode = test_input($_POST["zipcode"]);
      }else{
          $errors["zipErr"]="address field cannot be empty";
      }

    if (!empty($_POST["state"])) {
      $state = test_input($_POST["state"]);
    }


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

$sql = "INSERT INTO house VALUES ('$description', '$valuation','$beds','$baths','$address','$city', '$state','$zipcode','$name','$email')";

if ($conn->query($sql) === TRUE) {
  $data['success'] = true;
  $data['message'] = 'Form successfully submitted!';
} else {
  $error["connErr"]= "Error: ".$conn->error;
}

$conn->close();
$msg2send ="Name: ".$name."\n"."Wants a valuation for ".$beds." beds, ".$baths." baths ".$valuation." at ".$city; 


}

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