<?php
session_start();
 ?>
<html>
<head>
<link rel="stylesheet" href="about.css">
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
  <div id ="about">
<h2>About us</h2>
<p>
  We are Items bazaar, a small but motivated company. We believe passionately in great bargains
   and excellent service, which is why we commit ourselves to giving you the best of both.
If you’re looking for something new, you’re in the right place. We strive to be industrious
 and innovative, offering our customers something they want, putting their desires at the top
  of our priority list.
</p>

</div>
<hr>
<div id="footer">
  <?php require_once "footer.php"?>
</div>
</body>
</html>
