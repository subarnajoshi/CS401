<?php
session_start();

$_SESSION['loggedIn'] = false;
unset ($_SESSION['userId']);
header('Location: index.php');
 ?>
