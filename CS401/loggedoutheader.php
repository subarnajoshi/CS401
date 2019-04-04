<?php
session_start();
echo'
<head>
<link rel="stylesheet" href="header.css">
<link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>
<div>
  <div><a href="index.php"><img class="logo" src="Logo.png" alt="B"></a></div>
  <div class="list">
    <ul class ="menu">
      <li><a href="index.php"> Home </a></li>
      <li class="dropdown">
        <a class="dropbtn">Shop by category</a>
        <div class="dropdown-content">
          <a href="category.php?category=Electronics">Electronics</a>
          <a href="category.php?category=Furnitures">Furnitures & Home Appliances</a>
          <a href="category.php?category=Health">Health & Beauty</a>
          <a href="category.php?category=Babies">Babies & Toys</a>
          <a href="category.php?category=Groceries">Groceries & Pets</a>
          <a href="category.php?category=Home">Home & Lifestyle</a>
          <a href="category.php?category=Fashion">Fashion</a>
          <a href="category.php?category=Sports">Sports & Outdoor</a>
          <a href="category.php?category=Automobiles">Automobiles</a>
        </div>
      </li>
  <li id="search"><div class="search">
  <form method="get" action="search.php">
     <input type="text" placeholder="Search.." name="search"
    >
  </form>
</div>
</li>
<li id="signin"><a href="signin.php"> Sign In </a></li>
  <li id="signup"><a href="signup.php"> Sign Up </a></li>
</ul>
</div>
  <hr>
<div class="navigation">
<div>
</div>
<hr>
</div>
</div>'
?>
