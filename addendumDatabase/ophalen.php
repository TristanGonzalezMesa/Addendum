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
    $sql = "SELECT * FROM gebruikers WHERE email='$gebruiker'";   
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


try{
    $sql = "SELECT * FROM afspraak WHERE id=$id2";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

            $van = $row['datumhalenvan'];
            $tot = $row['datumhalentot'];
            echo "<div class='col-xs-6 col-sm-2 mb-20'>
            <div style='border-style: solid;'>";         
            echo "<br>"; 
            echo "Soort afval ";
            echo $row['afspraak'];
            echo "<br>";
            echo "Op te halen van: ";
            echo $row['datumhalenvan'];
            echo "<br>";
            echo "Op te halen tot: ";
            echo $row['datumhalentot'];
            echo "<br>";
            echo "Geplaatst door: ";   
            echo $row['geplaatstdoor'];
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
    $ophalen1 = $_POST['datumhalen'];
    $hoelaat = $_POST['hoelaat'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
$sql = "UPDATE afspraak SET
opgehaalddoor = '$klantid',
opgehaald = '$opgehaald',
datumhalen = '$ophalen1',
tijd = '$hoelaat'
WHERE id=$id2";

if ($conn->query($sql) == TRUE) {
    echo "Gelukt!";
    header( "refresh:2;url=afval.php" );
  } else {
  }
  }

?>