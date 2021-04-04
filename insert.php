<?php
 header("Location: index.html");
$servername = "aa1j2ay19mvo8dl.cew1fvzp06l6.us-east-2.rds.amazonaws.com";
$username = "cap";
$password = "capstonedb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ebdb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, 
email, upassword) 
VALUES (:firstname, :lastname, :email, :upassword)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':upassword', $upassword);

// insert a row
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $upassword = $_POST["upassword"];
    $stmt->execute();


    echo "New records created successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>