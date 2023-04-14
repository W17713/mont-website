<?php
// define variables and set to empty values
$errors=[];
$data=[];
$name = $email = $message = $phone = $location = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Name"])) {
        $errors["NameErr"] = "Name is required";
      } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $rrors["nameErr"] = "Only letters and white space allowed";
          }else{
        $name = test_input($_POST["Name"]);
          }
      }
    if (empty($_POST["Message"])) {
        $errors["msgErr"] = "Name is required";
      } else {
        $message = test_input($_POST["Message"]);
      }
    
      $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["emailErr"] = "Invalid email format";
      }
  
  $phone = test_input($_POST["phonenumber"]);
  $location = test_input($_POST["location"]);

  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}
}

echo json_encode($data);

function test_input($fielddata) {
  $fielddata = trim($fielddata);
  $fielddata = stripslashes($fielddata);
  $fielddata = htmlspecialchars($fielddata);
  return $fielddata;
}
?>