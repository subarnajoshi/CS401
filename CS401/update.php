
<?php
require_once 'Dao.php';
session_start();
$firstName=$lastName=$email=$pass=$rePass=$userId="";
$_SESSION['valid'] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = sanitize($_POST["fname"]);
  $firstName = validate_firstname($firstName);
  $lastName = sanitize($_POST["lname"]);
  $lastName = validate_lastname($lastName);
  $email = sanitize($_POST["email"]);
  $email = validate_email($email);
  $pass = sanitize($_POST["new-password"]);
  $rePass= sanitize($_POST["confirm-password"]);
  $pass = validate_password($pass);
  $rePass = validate_conformpassword($pass,$rePass);
  $userId = $_SESSION['userId'];
}


function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = filter_var($data, FILTER_SANITIZE_STRING);
  return $data;
}
function validate_firstname($data){
  if(!empty($data)){
    if(preg_match("/^([a-zA-Z']+)$/",$data)){
      return $data;
 }else{
     $_SESSION['firstName_err'] =  "Please enter valid first Name";
     $_SESSION['valid'] = false;
 }
  }
  else{
    $_SESSION['firstName_err'] = "Please enter the first name";
    $_SESSION['valid'] = false;
  }
}

function validate_lastname($data){
  if(!empty($data)){
    if(preg_match("/^([a-zA-Z']+)$/",$data)){
      return $data;
 }else{
     $_SESSION['lastName_err'] =  "Please enter valid last Name";
     $_SESSION['valid'] = false;
 }
  }
  else{
    $_SESSION['lastName_err'] = "Please enter the last name";
    $_SESSION['valid'] = false;
  }
}

function validate_email($data){
  if(!empty($data)){
    if(preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $data)){
      if(exist_email($data) <= 0){
      return $data;
    }
      else{
        $_SESSION['email_already'] = "This email already exists";
        $_SESSION['valid'] = false;
      }
  }
  else{
     $_SESSION['email_err'] = "Please enter valid email address";
     $_SESSION['valid'] = false;
  }
  }
  else{
     $_SESSION['email_err'] = "Please enter email address";
     $_SESSION['valid'] = false;
  }
}

function exist_email($eml){
  $dao1 = new Dao();
  $Email = $dao1->getUser($eml);
  return $Email;
}

function validate_password($data){
  if(!empty($data)){
  if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $data) === 0){
$_SESSION['password_err'] = "Password must be at least 8 characters and must contain at least one lower case
letter, one upper case letter and one digit";
$_SESSION['valid'] = false;
}
else{
  return $data;
}
}
else{
    $_SESSION['password_err'] = "Please enter the password";
     $_SESSION['valid'] = false;
}
}

function validate_conformpassword($data,$redata){
  if(!empty($data) && !empty($redata) && ($data === $redata)){
  return $redata;
}
if (!empty($data) && !empty($redata) && ($data != $redata)){
  $_SESSION['repassword_err'] = "The password and confirm password do not match";
  $_SESSION['valid'] = false;
}
if (!empty($data) && empty($redata)){
  $_SESSION['password_err'] = "Please enter confirm password";
  $_SESSION['valid'] = false;
}
}

if($_SESSION['valid'])
{
$dao = new Dao();
$dao->updateUser($firstName,$lastName,$email,$pass,$rePass,$userId);
$_SESSION['message'] = "You have successfully updated your Account!";
header('Location: setting.php');
}else{
  $_SESSION['formInput'] = $_POST;
header('Location: setting.php');
}
exit;
?>
