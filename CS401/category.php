<?php
session_start();
 ?>
<html>
<head>
<link rel="stylesheet" href="category.css">
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
<div class="row">
  <div class="column right">
  <!--  <li><a href = "description.php"><img src="item.jpeg" alt="car">
      <span> Range Rover </span>
    <span>$90,000 </span></a>
  </li> -->
  <?php
          $arg1 = $_GET['category'];
          if($arg1 === 'Electronics'){
            $_SESSION['category'] = "Electronic";
          }
         if($arg1 === 'Furnitures'){
            $_SESSION['category'] = "Furnitures &amp; Home Appliances";
          }

          if($arg1 === 'Health'){
             $_SESSION['category'] = "Health &amp; Beauty";
           }

           if($arg1 === 'Babies'){
              $_SESSION['category'] = "Babies &amp; Toys";
            }
            if($arg1 === 'Groceries'){
               $_SESSION['category'] = "Groceries &amp; Pets";
             }
           if($arg1 === 'Home'){
                $_SESSION['category'] = "Home &amp; Lifestyles";
            }
          if($arg1 === 'Fashion'){
             $_SESSION['category'] = "Fashion";
           }
          if($arg1 === 'Sports'){
            $_SESSION['category'] = "Sports &amp; Outdoor";
          }
        if($arg1 === 'Automobiles'){
           $_SESSION['category'] = "Automobiles";
         }
        ?>
        <?php
            if (isset($_SESSION['category'])) {
              $input = $_SESSION['category'];
              echo "<section>
                  <h1>".$input."</h1>
                </section>";
            }
            if (isset($_SESSION['search'])) {
              $input = $_SESSION['search'];
              echo "<section>
                  <h1>".$input."</h1>
                </section>";
            }
         ?>

  <?php
  require_once 'Dao.php';
      if (isset($_SESSION['search'])) {
        $input = $_SESSION['search'];
        $dao = new Dao();
  $products= $dao->getProduct($input);
  foreach ($products as $product) {
    echo '<li><a href = "description.php?Product='.$product['ProductID'].'"><div>
        <span>'.$product['ItemName'].'</span>
        <div id = "images"><img src="'.'./'.$product['Image'].'" alt = "Product Image"></div>
      <span>'."$".$product['Price'].'</span>
      </div></a></li>';
       }
      }
      unset($_SESSION['search']);
      ?>

            <?php
            require_once 'Dao.php';
                if (isset($_SESSION['category'])) {
                  $input = $_SESSION['category'];
                  $dao = new Dao();
            $products= $dao->getProduct_category($input);
            foreach ($products as $product) {
              echo '<li><a href = "description.php?Product='.$product['ProductID'].'"><div>
                  <span>'.$product['ItemName'].'</span>
                  <div id ="images" ><img src="'.'./'.$product['Image'].'" alt="Product Image"></div>
                <span>'."$".$product['Price'].'</span>
                </div></a></li>';
                 }
                }
                unset($_SESSION['category']);
                ?>


</div>
</div>
<hr>
<div id="footer">
  <?php require_once "footer.php";?>
</div>
</body>
</html>
