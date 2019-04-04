<?php
require_once 'Dao.php';
session_start();
$email=$pass="";
$_SESSION['valid'] = true;
$_SESSION['loggedIn'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = sanitize($_POST["email"]);
  $email = validate_email($email);
  $pass = sanitize($_POST["password"]);
  $pass = validate_password($pass);
}

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_email($data){
  if(!empty($data)){
    if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data)){
      if(exist_email($data) > 0){
      return $data;
    }
      else{
        $_SESSION['email_doesnot'] = "This email you entered doesn't match any account";
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

function validate_password($data){
  if(!empty($data)){
  if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $data) === 0){
$_SESSION['password_err'] = "Please enter the correct password";
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

function exist_email($eml){
  $dao1 = new Dao();
  $Email = $dao1->getUser($eml);
  return $Email;
}
function getUserId($eml, $password){
  $dao1 = new Dao();
  $id = $dao1->get_userId($eml, $password);
  return $id;
}
function exist_account($eml, $passWord){
  $dao1 = new Dao();
  $Email = $dao1->verify_Password($eml, $passWord);
  return $Email;
}

if($_SESSION['valid'])
{
if(exist_account($email,$pass) > 0){
  $Id = getUserId($email,$pass);
  $_SESSION['userId'] = $Id['UserID'];
  $_SESSION['loggedIn'] = true;
header('Location: index.php');
}else{
    $_SESSION['formInput'] = $_POST;
  if (!isset($_SESSION['email_doesnot'])) {
  $_SESSION['password_err'] = "Please enter the correct password";
}
header('Location: signin.php');
}
}
else{
  $_SESSION['formInput'] = $_POST;
header('Location: signin.php');
}
exit;
?>
