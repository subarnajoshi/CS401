<?php

session_start();
require_once 'Dao.php';

$id = $_GET['arg'];

$dao = new Dao();
$detail= $dao->getProduct_productId($id);
echo '<a>'.print_r($detail).'</a>';
?>
