<?php
require_once 'Dao.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $search = sanitize($_GET["search"]);
  $_SESSION['search'] = $search;
}

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = filter_var($data, FILTER_SANITIZE_STRING);
  return $data;
}

//$dao = new Dao();
//$products= $dao->getProduct($search);
//foreach ($products as $product) {
//    echo $product['ProductID'];
  //  echo "-";
//  }





header('Location: category.php');
exit;
?>
