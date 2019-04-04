<?php
require_once 'Dao.php';

session_start();
$ItemName=$ItemType=$Price=$Conditions=$Availability=$Email=$Description=$Phone=$Address=$UserId="";
$_SESSION['valid'] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ItemName = sanitize($_POST["name"]);
  $ItemType = sanitize($_POST["itemType"]);
  $Price = sanitize($_POST["price"]);
  $Price = validate_price($Price);
  $Conditions = sanitize($_POST["condition"]);
  $Availability = sanitize($_POST["availability"]);
  $email = sanitize($_POST["E-mail"]);
  $email = validate_email($email);
  $Description= sanitize($_POST["description"]);
  $Description= validate_description($Description);
  $Phone = sanitize($_POST["Phone"]);
  $Phone = validate_phone($Phone);
  $Address = sanitize($_POST["Address"]);
  $Address = validate_address($Address);
  $UserId = $_SESSION['userId'];
}
$imagePath = "";
if (count($_FILES) > 0) {
  if ($_FILES["file"]["error"] > 0) {
    $_SESSION['image_err'] = "Please select valid file";
    $_SESSION['valid'] = false;
    //throw new Exception("Error: " . $_FILES["file"]["error"]);
  } else {
    $basePath = "/app";
    $imagePath = "/Pictures/" . $_FILES["file"]["name"];
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $basePath . $imagePath)) {
      $_SESSION['image_err'] = "file move failed";
     $_SESSION['valid'] = false;
  //    throw new Exception("File move failed");
    }
  }
}

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = filter_var($data, FILTER_SANITIZE_STRING);
  return $data;
}

function validate_email($data){
  if(!empty($data)){
    if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data)){
      return $data;
  }
  else{
     $_SESSION['email_error'] = "Please enter valid email address";
     $_SESSION['valid'] = false;
  }
  }
  else{
     $_SESSION['email_error'] = "Please enter email address";
     $_SESSION['valid'] = false;
  }
}

function validate_price($data){
  if (preg_match("/^\d+(\.\d{2})?$/", $data)) {
     return $data;
  }
  else{
    $_SESSION['price_err'] = "Please enter valid price";
    $_SESSION['valid'] = false;
  }
}

function validate_description($data){
  if(strlen($data) > 1000){
    $_SESSION['des_err'] = "Product discription is too long.";
    $_SESSION['valid'] = false;
  }else{
    return $data;
  }
}

function validate_phone($data){
     $filtered_phone_number = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     if (strlen($phone_to_check) >= 10 || strlen($phone_to_check) > 15) {
        return $data;
     } else {
       $_SESSION['phone_err'] = "Please enter valid phone number";
       $_SESSION['valid'] = false;
     }
}

function validate_address($data){
  if (preg_match('/^\\d+ [a-zA-Z ]+ ?., \\d+, [a-zA-Z ]+, [a-zA-Z ]+, [a-zA-Z ]+$/', $data)) {
      return $data;
  }
  else{
    $_SESSION['address_err'] = "Please use this format: street Address, zipcode , city, state ,country";
    $_SESSION['valid'] = false;
  }
}
if($_SESSION['valid'])
{
$dao = new Dao();
$dao->saveProduct($ItemName,$ItemType,$Price,$Conditions,$Availability,$email,$Description,$Phone,$Address,$UserId,$imagePath);
$_SESSION['message'] = "Thanks for Posting Product!";
header('Location: product.php');
}
else{
$_SESSION['formInput'] = $_POST;
header('Location: product.php');
}
exit;
?>
