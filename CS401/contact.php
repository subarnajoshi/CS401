<?php
session_start();
 ?>
<html>
<head>
<link rel="stylesheet" href="contact.css">
<link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  <div>
    <?php
    if($_SESSION['loggedIn'] == 1){
    require_once "loggedinheader.php";}
    else{
    require_once "loggedoutheader.php";
  }
    ?>
  </div>
  <div id ="contact">
<h1>Contact Us</h1>
<h2> Mailing Address </h2>
<p>
  860 W sherwood St. Boise city
</p>
<p>   Idaho, 83706 </p>
<h2>Phone</h2>
<p> +18482189398 </p>
<h2>Email</h2>
<p> subarnajoshi@u.boisestate.edu </p>

</div>
<hr>
<div id="footer">
  <?php require_once "footer.php"?>
</div>
</body>
</html>
