<?php


$servername = "localhost";
$dbname = "addendum";
$username= "root";
$password = "";

  //connectie
  $con=mysqli_connect("localhost","root","","addendum") or die(mysqli_error());
  ?>


<?php

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}