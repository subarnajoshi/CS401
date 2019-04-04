<?php
session_start();
 ?>
<html>
<head>
<link rel="stylesheet" href="setting.css">
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
  <div class="column left">
<ul>
    <li><a href="history.php"> History </a></li>
    <li><a href="setting.php"> Setting </a></li>
    <li><a href="product.php"> Post </a></li>
</ul>
  </div>
  <div class="column right">
    <h1>Account Setting</h1>
      <hr>
      <form method="post" action="update.php">
      <div> <input type="text" placeholder="First Name" name="fname"
        value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['fname'] : ''; ?>"></div>
      <?php
          if (isset($_SESSION['firstName_err'])) {
            echo "<div>" . $_SESSION['firstName_err'] . "</div>";
          }
          unset($_SESSION['firstName_err']);
          ?>
      <div> <input type="text" placeholder="Last Name" name="lname"
        value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['lname'] : ''; ?>"> </div>
      <?php
          if (isset($_SESSION['lastName_err'])) {
            echo "<div>" . $_SESSION['lastName_err'] . "</div>";
          }
          unset($_SESSION['lastName_err']);
          ?>
      <div> <input type="email" placeholder="Email" name="email"
        value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['email'] : ''; ?>"> </div>
        <?php
          if (isset($_SESSION['email_already'])) {
          echo "<div>" . $_SESSION['email_already'] . "</div>";
        }
        unset($_SESSION['email_already']);
            if (isset($_SESSION['email_err'])) {
              echo "<div>" . $_SESSION['email_err'] . "</div>";
            }
            unset($_SESSION['email_err']);
            ?>
      <div> <input type="password" placeholder="new Password" name="new-password"
        > </div>
      <?php
          if (isset($_SESSION['password_err'])) {
            echo "<div>" . $_SESSION['password_err'] . "</div>";
          }
          unset($_SESSION['password_err']);
          ?>
      <div> <input type="password" placeholder="Confirm Password" name="confirm-password"> </div>
      <?php
          if (isset($_SESSION['repassword_err'])) {
            echo "<div>" . $_SESSION['repassword_err'] . "</div>";
          }
          unset($_SESSION['repassword_err']);
          ?>
      <div>
      <button type="submit" value="Submit">Submit</button>
      <button type="reset" value="Reset">Cancel</button>
      </div>
      <br>
      <?php
          if (isset($_SESSION['message'])) {
            echo "<div id ='message'>" . $_SESSION['message'] . "</div>";
          }
          unset($_SESSION['message']);
          unset($_SESSION['valid']);
          unset($_SESSION['formInput']);
          ?>
    </form>
    </div>
  </div>
</div>
<hr>
<div id="footer">
  <?php include_once "footer.php";?>
</div>
</body>
</html>
