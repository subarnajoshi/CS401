<?php
require_once 'KLogger.php';
class Dao {



  private $host = "localhost";
  private $db = "bazzar";
  private $user = "root";
  private $pass = "joshi";

//  private $host = "us-cdbr-iron-east-03.cleardb.net";
//  private $db = "heroku_2e869a01842dadf";
//  private $user = "bcf722a10d603b";
//  private $pass = "dca67af5";



  protected $logger;
  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }
  public function getConnection () {
    $this->logger->LogDebug("Getting a connection.");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      $this->logger->LogError(__CLASS__ . "::" . __FUNCTION__ . " The database exploded " . print_r($e,1));
      echo print_r($e,1);
      exit;
    }
    return $conn;
  }
  public function getUser ($email) {
    $this->logger->LogWarn("getting User [{$email}]");
    $conn = $this->getConnection();
    $q = $conn->prepare("SELECT count(Email) from User where Email = :email");
    $q->bindParam(":email",$email);
    $q->execute();
    $user= $q->fetchColumn();
    return $user;
  }
  public function get_userId ($email, $password) {
    $this->logger->LogWarn("getting User [{$email}]");
    $conn = $this->getConnection();
    $q = $conn->prepare("SELECT UserID from User where Email = :email And Password = :pass");
    $q->bindParam(":email",$email);
    $q->bindParam(":pass",$password);
    $q->execute();
    $user= $q->setFetchMode(PDO::FETCH_ASSOC);
    $user= $q->fetch();
    return $user;
  }

    public function getProduct ($data) {
    //$this->logger->LogWarn("getting User [{$product}]");
    $conn = $this->getConnection();
    $data = "%".$data."%";
    $q = $conn->prepare("SELECT * from Product where ItemName like :data or ItemType like :data or Description like :data");
    $q->bindParam(":data",$data);
    $q->execute();
    $product= $q->setFetchMode(PDO::FETCH_ASSOC);
    $product= $q->fetchAll();
    return $product;
  }

  public function getProduct_UserId ($data) {
  //$this->logger->LogWarn("getting User [{$product}]");
  $conn = $this->getConnection();
  $q = $conn->prepare("SELECT * from Product where UserId = :data");
  $q->bindParam(":data",$data);
  $q->execute();
  $product= $q->setFetchMode(PDO::FETCH_ASSOC);
  $product= $q->fetchAll();
  return $product;
}

public function getProduct_productId ($data) {
//$this->logger->LogWarn("getting User [{$product}]");
$conn = $this->getConnection();
$q = $conn->prepare("SELECT * from Product where ProductID = :data");
$q->bindParam(":data",$data);
$q->execute();
$product= $q->setFetchMode(PDO::FETCH_ASSOC);
$product= $q->fetchAll();
return $product;
}

   public function getProduct_category ($data) {
//$this->logger->LogWarn("getting User [{$product}]");
    $conn = $this->getConnection();
    $q = $conn->prepare("SELECT * from Product where ItemType = :data");
    $q->bindParam(":data",$data);
    $q->execute();
    $product= $q->setFetchMode(PDO::FETCH_ASSOC);
    $product= $q->fetchAll();
    return $product;
    }

    public function getProduct_recent () {
    //$this->logger->LogWarn("getting User [{$product}]");
     $conn = $this->getConnection();
     $q = $conn->prepare("SELECT * from Product order by ProductID desc limit 6");
     $q->execute();
     $product= $q->setFetchMode(PDO::FETCH_ASSOC);
     $product= $q->fetchAll();
     return $product;
     }

  public function verify_Password ($email, $password) {
    $this->logger->LogInfo("getting password [{$email}]");
    $conn = $this->getConnection();
    $q = $conn->prepare("SELECT count(Email) from User where Email = :email  And Password = :pass");
    $q->bindParam(":email",$email);
    $q->bindParam(":pass",$password);
    $q->execute();
    $password= $q->fetchColumn();
    return $password;
  }


  public function saveUser ($firstName,$lastName,$email,$password,$rePassword) {
   $this->logger->LogInfo("creating User [{$email}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into User (Firstname, LastName, Password, RePassword, Email) values (:firstname, :lastname,
     :password, :repassword, :email)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":firstname",$firstName);
    $q->bindParam(":lastname",$lastName);
    $q->bindParam(":password",$password);
    $q->bindParam(":repassword",$rePassword);
    $q->bindParam(":email",$email);
    $q->execute();
  }

  public function updateUser ($firstName,$lastName,$email,$password,$rePassword, $userId) {
  // $this->logger->LogInfo("creating User [{$email}]");
    $conn = $this->getConnection();
    $saveQuery = "update User set Firstname = :firstname, LastName = :lastname,
     Password = :password, RePassword = :repassword, Email = :email where UserID = :userId";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":firstname",$firstName);
    $q->bindParam(":lastname",$lastName);
    $q->bindParam(":password",$password);
    $q->bindParam(":repassword",$rePassword);
    $q->bindParam(":email",$email);
    $q->bindParam(":userId",$userId);
    $q->execute();
  }

  public function saveProduct ($itemName,$itemType,$price,$condition,$availability,$email,$description,$phone,$address,$userId,$imagePath) {
   $this->logger->LogInfo("creating User [{$itemName}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into Product(ItemName, ItemType, Price, Conditions, Availability, Email, Description, Phone, Address, UserId, Image) values (:itemName, :itemType,
     :price, :condition, :availability, :email, :description, :phone, :address, :userId, :imagePath)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":itemName",$itemName);
    $q->bindParam(":itemType",$itemType);
    $q->bindParam(":price",$price);
    $q->bindParam(":condition",$condition);
    $q->bindParam(":availability",$availability);
    $q->bindParam(":email",$email);
    $q->bindParam(":description",$description);
    $q->bindParam(":phone",$phone);
    $q->bindParam(":address",$address);
    $q->bindParam(":userId",$userId);
    $q->bindParam(":imagePath",$imagePath);
    $q->execute();
  }
}
?>
