<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="description.css">
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
<div>
<?php
session_start();
require_once 'Dao.php';
$productId = $_GET['Product'];
$dao = new Dao();
$details= $dao->getProduct_productId($productId);
foreach($details as $detail){
echo'<div id="images">
  <img src="'.$detail['Image'].'" alt="car">
</div>
<hr>
<div class="details">
  <div>
    <p> Item Description: </p>
    <textarea id="detail" type="text" name="Description" readonly>'.$detail['Description'].' </textarea>
  </div>
  <div>
    <p> Availability:
    <input type="text" name="Availability" value="'.$detail['Availability'].'" readonly>
  </p>
  </div>
  <div>
    <p> Price:
    <input type="text" name="Price" value="'."$".$detail['Price'].'" readonly>
  </p>
  </div>
  <div>
    <p id="contact">
      Contact Information:
    </p>
    <p> Email address:
    <input id="email" type="text" name="email" value="'.$detail['Email'].'" readonly></p>
    <p> Phone:
    <input type="number" name="phone" value="'.$detail['Phone'].'" readonly></p>
    <p> Address:
    <input id="address" type="text" name="Address" value="'.$detail['Address'].'" readonly></p>
  </div>
</div>'; }

?>
</div>
<hr>
<div id="footer">
  <?php require_once "footer.php";?>
</div>
</body>
</html>
