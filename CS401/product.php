<?php
session_start();
 ?>
<html>
<head>
<link rel="stylesheet" href="product.css">
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
  <section class="form">
  <form method="post" action="validate_product.php" enctype="multipart/form-data">
    <div>
      <label for="name">Item name:</label>
    <input type="text" id="name" placeholder="Item Name" name="name" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['name'] : ''; ?>" required>
  </div>

  <div>
      <label for="itemType">Item type:</label>
    <select id = "itemType"name="itemType" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['itemType'] : ''; ?>">
  <option value="Electronic">Electronics</option>
  <option value="Furnitures & Home Appliances">Furnitures & Home Appliances</option>
  <option value="Health & Beauty">Health & Beauty</option>
  <option value="Babies & Toys">Babies & Toys</option>
  <option value="Groceries & Pets">Groceries & Pets</option>
  <option value="Home & Lifestyles">Home & Lifestyles</option>
  <option value="Fashion">Fashion</option>
  <option value="Sports & Outdoor">Sports & Outdoor</option>
  <option value="Automobiles">Automobiles</option>
</select>
</div>
<div>
    <label for="price">Price:</label>
    <input type="number" id="price" placeholder="Price" name="price" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['price'] : ''; ?>" required>
  </div>
  <?php
      if (isset($_SESSION['price_err'])) {
        echo '<div id ="err">' . $_SESSION['price_err'] . '</div>';
      }
      unset($_SESSION['price_err']);
      ?>
  <div>
    <label for="condition">Condition:</label>
    <select name="condition" id="condition" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['condition'] : ''; ?>">
  <option value="New">New</option>
  <option value="Like new">Like new</option>
  <option value="Fair">Fair</option>
</select>
</div>
<div>
<label for="file">Item Image:</label>
   <input type="file" id=" file" name="file" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['file'] : ''; ?>">
   <?php
       if (isset($_SESSION['image_err'])) {
         echo '<div id = "err">' . $_SESSION['image_err'] . '</div>';
       }
       unset($_SESSION['image_err']);
       ?>
 </div>
 <div>
<label for="availability">Availability:</label>
<select id="availability" name="availability" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['availability'] : ''; ?>">
<option value="Available">Available</option>
<option value="Sold">Sold</option>
</select>
</div>
<div>
  <label for="description">Description:</label><br>
<textarea id="description" placeholder="About Item" name="description"  required>
  <?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['description'] : ''; ?>
</textarea>
</div>
<?php
    if (isset($_SESSION['des_err'])) {
      echo '<div id = "err">' . $_SESSION['des_err'] . '</div>';
    }
    unset($_SESSION['des_err']);
    ?>
<div>
<label for="phone">Phone:</label>
<input id = "phone" type="number" name="Phone" placeholder="xxx-xxx-xxxx"value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['Phone'] : ''; ?>" required>
</div>
<?php
    if (isset($_SESSION['phone_err'])) {
      echo '<div id ="err">' . $_SESSION['phone_err'] . '</div>';
    }
    unset($_SESSION['phone_err']);
    ?>
<div>
<label for="address">Address:</label>
<input id="address" type="text" name="Address" placeholder="street Address, zipcode , city, state ,country"value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['Address'] : ''; ?>" required>
</div>
<?php
    if (isset($_SESSION['address_err'])) {
      echo '<div id = "err">' . $_SESSION['address_err'] . '</div>';
    }
    unset($_SESSION['address_err']);
    ?>
<div>
<label for="email">Email:</label>
<input id = "email" type="email" name="E-mail" placeholder="____@___.__"class="email" value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['E-mail'] : ''; ?>" required>
</div>
<?php
    if (isset($_SESSION['email_error'])) {
      echo '<div id ="err">' . $_SESSION['email_error'] . '</div>';
    }
    unset($_SESSION['email_error']);

    if (isset($_SESSION['message'])) {
      echo '<div id ="success">' . $_SESSION['message'] . '</div>';
    }
    unset($_SESSION['message']);
    unset($_SESSION['formInput']);

    ?>
<div>
<button type="submit" value="Submit">Post</button>
<button type="reset" value="Reset">Cancel</button>
</div>
  </form>
</section>
</div>
<hr>
<div id="footer">
  <?php require_once "footer.php";?>
</div>
</body>

</html>
