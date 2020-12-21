<?php
session_start();
include ('../database.php'); 
$gebruiker = $_SESSION['Email'];
?>
    <?php if(isset($_SESSION['rol'])){if ($_SESSION['rol'] > 9) {  header('Location: ../index.php');}}?>
    <?php if(isset($_SESSION['Email']) == "Email"){echo "";}else{header('Location: ../index.php');}?>
    
<?php
try{
    $sql = "SELECT * FROM klanten WHERE email='$gebruiker'";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

            $naam = $row['voornaam'];
            echo "<h3> Welkom terug " . $naam . "</h3>";
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


<a href="afvaltoevoegen.php">afval toevoegen</a>
<a href="afvalalles.php">afval alles</a>
<a href="../afval.php">afval bekijken</a>