<?php
session_start();
 ?>

<html>
<head>
<link rel="stylesheet" href="history.css">
<link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>
<body>
  <div>
    <?php require_once "loggedinheader.php";?>
<div class="row">
  <div class="column left">
<ul>
    <li><a href="history.php"> History </a></li>
    <li><a href="setting.php"> Setting </a></li>
    <li><a href="product.php"> Post </a></li>
</ul>
  </div>
  <div class="column right">
    <div>
      <section>
        <h1>Posted</h1>
      </section>
     <div>
       <?php
       require_once 'Dao.php';
           if (isset($_SESSION['userId'])) {
             $input = $_SESSION['userId'];
             $dao = new Dao();
       $products= $dao->getProduct_UserId($input);
       foreach ($products as $product) {
         echo '<li><a href = "description.php?Product='.$product['ProductID'].'"><div>
             <span>'.$product['ItemName'].'</span>
             <div id="images"><img src="'.'./'.$product['Image'].'" alt ="Product Image"></div>
           <span>'."$".$product['Price'].'</span>
           </div></a></li>';
          }
           }
           ?>
     </div>
    </div>

  </div>
</div>
<hr>
<div id="footer">
  <?php include_once "footer.php";?>
</div>
</body>
</html>
