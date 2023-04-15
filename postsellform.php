<?php
include "sendmail.php";
// define variables and set to empty values
$errors=[];
$data=[];
$name = $email = $message = $phone = $location = $interest ="";

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
        $beds = test_input($_POST["Valuation-type"]);
          }

    if (!empty($_POST["beds"])) {
    $beds = test_input($_POST["Number-of-beds"]);
      }

    if (!empty($_POST["baths"])) {
        $beds = test_input($_POST["Number-of-baths"]);
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
        $address = test_input($_POST["zipcode"]);
      }else{
          $errors["zipErr"]="address field cannot be empty";
      }

    if (!empty($_POST["state"])) {
      $name = test_input($_POST["state"]);
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

$sql = "INSERT INTO house VALUES ('$desctiption', '$valuation','$beds','$baths','$address','$city', '$state','$zipcode','$name','$email')";

if ($conn->query($sql) === TRUE) {
  $data['success'] = true;
  $data['message'] = 'Success!';
} else {
  $error["connErr"]= "Error: ".$conn->error;
}

$conn->close();



echo json_encode($data);

function test_input($fielddata) {
  $fielddata = trim($fielddata);
  $fielddata = stripslashes($fielddata);
  $fielddata = htmlspecialchars($fielddata);
  return $fielddata;
}
?>