<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="homepage.css">
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
<div id="advertisement">
  <img src="ecommerce-strategies.jpg" alt="shop now">
</div>
<div class="recent">
<section id="recent added">
  <h1>Recently Added</h1>
</section>
<div>
  <?php
  require_once 'Dao.php';
  $dao = new Dao();
  $products= $dao->getProduct_recent();
  foreach ($products as $product) {
    echo '<li><a href = "description.php?Product='.$product['ProductID'].'"><div>
        <span>'.$product['ItemName'].'</span>
        <div id="images"><img src="'.'./'.$product['Image'].'" alt ="Product Image"></div>
      <span>'."$".$product['Price'].'</span>
      </div></a></li>';
    }
      ?>
</div>
</div>
<hr>
<div id="footer">
  <?php require_once "footer.php";?>
</div>
</body>
</html>
