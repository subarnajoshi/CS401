<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="signup.css">
<link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>

<body>
  <div class ="background">
  <div><a href="index.php"><img src="Logo.png" alt="Logo"></a></div>
  <div id = "form">
<section id="sign up">
  <form method="post" action="account_validation.php">
  <h1>Sign Up</h1>
    <p>Please fill in this form to create an items bazaar account!</p>
    <hr>
  <div> <input type="text" placeholder="First Name" name="fname"
    value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['fname'] : ''; ?>"></div>
    <?php
        if (isset($_SESSION['firstName_err'])) {
          echo '<div id ="error">' . $_SESSION['firstName_err'] . '</div>';
        }
        unset($_SESSION['firstName_err']);
        ?>
  <div><input type="text" placeholder="Last Name" name="lname"
    value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['lname'] : ''; ?>"> </div>
  <?php
      if (isset($_SESSION['lastName_err'])) {
        echo '<div id ="error">' . $_SESSION['lastName_err'] . '</div>';
      }
      unset($_SESSION['lastName_err']);
      ?>
  <div> <input type="email" placeholder="Email" name="email"
    value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['email'] : ''; ?>"> </div>
  <?php
    if (isset($_SESSION['email_already'])) {
    echo '<div id ="error">' . $_SESSION['email_already'] . '</div>';
  }
  unset($_SESSION['email_already']);
      if (isset($_SESSION['email_err'])) {
        echo '<div id ="error">' . $_SESSION['email_err'] . '</div>';
      }
      unset($_SESSION['email_err']);
      ?>
  <div> <input type="password" placeholder="Password" name="password"
    > </div>
  <?php
      if (isset($_SESSION['password_err'])) {
        echo '<div id="error">' . $_SESSION['password_err'] . '</div>';
      }
      unset($_SESSION['password_err']);
      ?>
  <div> <input type="password" placeholder="Confirm Password" name="re-password"
    > </div>
  <?php
      if (isset($_SESSION['repassword_err'])) {
        echo '<div id="error">' . $_SESSION['repassword_err'] . '</div>';
      }
      unset($_SESSION['repassword_err']);
      ?>
  <div id="agreement"> <input type="checkbox" name="Agree" value="agree" required> I accept the <a href="terms.php">Terms of Use</a>
     & <a href="privacy.php">Privacy Policy </a></div>
  <div>  <input type="submit" value="Sign Up">
  <input type="button" value="Cancel"></div>
  <?php
      if (isset($_SESSION['message'])) {
        echo "<div>" . $_SESSION['message'] . "</div>";
      }
      unset($_SESSION['message']);
      unset($_SESSION['valid']);
      unset($_SESSION['formInput']);
      ?>
</form>
</section>
</div>
</div>
<hr>
<div id="footer">
  <?php require_once "footer.php"?>
</div>
</body>
</html>
