<?php session_start();
if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    }
    include ('database.php'); 
    $gebruiker = $_SESSION['Email'];
     ?>


<?php if(isset($_SESSION['Email']) == "Email"){echo "";}else{header('Location: ./login.php');}?>

<?php
try{
    $sql = "SELECT * FROM klanten WHERE klantid=$id2";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<h1> Info Afvalaanbieder: </h1>";
        while($row = $result->fetch()){
        
            echo "<br>"; 
            echo "Naam: ";
            echo $row['voornaam'] . " " . $row['tussenvoegsel']. " " . $row['achternaam'];
            echo "<br>";
            echo "Email: ";
            echo $row['email'];
            echo "<br>";
            echo "telefoonnummer: ";
            echo $row['telefoonnummer'];
            echo "<br>";
          }
  
          // Free result set
          unset($result);
      } else{
          echo 'Ik kan de klant niet vinden!';
      }
  } catch(PDOException $e){
      die('ERROR: Could not able to execute $sql. ' . $e->getMessage());
  }
   ?>

<a href="index.php">Homepage</a>