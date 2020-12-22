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
    $sql = "SELECT * FROM klanten WHERE email='$gebruiker'";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

            $klantid = $row['klantid'];
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
  <?php

  try{
      $sql = "SELECT * FROM afval";   
      $result = $pdo->query($sql);
      if($result->rowCount() > 0){
          while($row = $result->fetch()){
              $klantidgeplaatst = $row['geplaatstdoor'];
            }
    
            // Free result set
            unset($result);
        } else{
            echo 'Kon niet vinden';
        }
    } catch(PDOException $e){
        die('ERROR: Could not able to execute $sql. ' . $e->getMessage());
    }
  
  
  try{
      $sql = "SELECT * FROM klanten WHERE klantid='$klantidgeplaatst'";   
      $result = $pdo->query($sql);
      if($result->rowCount() > 0){
          while($row = $result->fetch()){
  
              $plaatsernaam = $row['voornaam'];
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
<?php 
try{
    $sql = "SELECT * FROM afval WHERE afvalnummer=$id2";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

            $van = $row['datumhalenvan'];
            $tot = $row['datumhalentot'];
            echo "<div class='col-xs-6 col-sm-2 mb-20'>
            <div style='border-style: solid;'>";         
            echo "<br>"; 
            echo "Soort afval ";
            echo $row['afvalnaam'];
            $afvalsoort1 = $row['afvalnaam'];
            echo "<br>";
            echo "Op te halen van: ";
            echo $row['datumhalenvan'];
            echo "<br>";
            echo "Op te halen tot: ";
            echo $row['datumhalentot'];
            echo "<br>";
            echo "Geplaatst door: ";   
            echo $plaatsernaam;
            echo "<br>";

            echo '<form class="form" action="" method="POST">';
            echo '<input type="date" name="datumhalen"
            min="'. $van . '" max="'. $tot . '">';
            echo '<input type="time" name="hoelaat"
            min="09:00" max="18:00" required>';
            echo '<button type="submit" class="btn" name="ophalen">ophalen</button>';
            echo '</form>';

                     echo  "</p>
                     </div>
                     </div>
            <br>";
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


<?php

if (isset($_POST['ophalen'])) {

    $opgehaald = "1";
    $datumophalen = $_POST['datumhalen'];
    $tijdophalen = $_POST['hoelaat'];

$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO klantafspraakregel (klantid, afvalnummer, datum, tijd)
VALUES ('$klantid', '$id2', '$datumophalen', '$tijdophalen')";

if ($conn->query($sql) == TRUE) {
  } else {
  }
 

$sql = "UPDATE afval SET
opgehaald = '$opgehaald'
WHERE afvalnummer=$id2";

if ($conn->query($sql) == TRUE) {
    echo "Gelukt!";
    header( "refresh:2;url=afval.php" );
  } else {
  }
  }
  

?>

<a href="index.php">Homepage</a>