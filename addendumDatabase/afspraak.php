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


try{
    $sql = "SELECT * FROM klantafspraakregel WHERE klantid=$klantid";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){
            $afvalnummer = $row['afvalnummer'];
            $datumhalen = $row['datum'];
            $tijdhalen = $row['tijd'];

            try{
                $sql = "SELECT * FROM afval WHERE afvalnummer=$afvalnummer";   
                $result1 = $pdo->query($sql);
                if($result1->rowCount() > 0){
                    while($row = $result1->fetch()){
                        echo "Afvalsoort: ";
                        echo $row['afvalnaam'];
                        echo "<br>";
                        echo "Contactpersoon: ";
                        echo $row['geplaatstdoor'];
                        echo "<br>";
                      }
              
                      // Free result set
                      unset($result1);
                  } else{
                      echo 'Niks te vinden';
                  }
              } catch(PDOException $e){
                  die('ERROR: Could not able to execute $sql. ' . $e->getMessage());
              }

            echo "Datum: ";
            echo $datumhalen;
            echo "<br>";;
            echo "Tijd: ";
            echo $tijdhalen;
            echo "<br>";;

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