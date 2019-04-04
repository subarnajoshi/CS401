<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="signin.css">
<link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>

<body>
  <div class="background">
  <div><a href="index.php"><img src="Logo.png" alt="B"></a></div>
  <div id="form"><section>
<form method="post" action="login_verification.php">
  <h1>Sign In</h1>
  <hr>
<div><input type="email" placeholder="Email" name="email"
  value="<?php echo isset($_SESSION['formInput']) ? $_SESSION['formInput']['email']: ''; ?>"></div>
<?php
  if (isset($_SESSION['email_doesnot'])) {
  echo '<div id ="err">' . $_SESSION['email_doesnot'] . '</div>';
}
unset($_SESSION['email_doesnot']);
    if (isset($_SESSION['email_err'])) {
      echo '<div id ="err">' . $_SESSION['email_err'] . '</div>';
    }
    unset($_SESSION['email_err']);
    ?>
<div><input type="password" placeholder="Password" name="password"></div>
<?php
    if (isset($_SESSION['password_err'])) {
      echo '<div id ="err">'. $_SESSION['password_err'] . '</div>';
    }
    unset($_SESSION['password_err']);
    unset($_SESSION['formInput']);
    ?>
    <div><input type="submit" value="Sign In">
    <input type ="reset" value="Cancel" ></div>
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
