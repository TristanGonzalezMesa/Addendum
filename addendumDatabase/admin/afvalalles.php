<script src="../js/loginregister.js"></script>
<?php
session_start();
include ('../database.php'); 
$gebruiker = $_SESSION['Email'];
?>
    <?php if(isset($_SESSION['rol'])){if ($_SESSION['rol'] > 9) {  header('Location: ../index.php');}}?>
    <?php if(isset($_SESSION['Email']) == "Email"){echo "";}else{header('Location: ../index.php');}?>



    <?php
try{
    $sql = "SELECT * FROM afvalsoort";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<h1> Beschikbaar Afval: </h1>";
        while($row = $result->fetch()){

        
            echo "<div class='col-xs-6 col-sm-2 mb-20'>
            <div style='border-style: solid;'>";         
            echo "<br>"; 
            echo "Soort afval ";
            echo $row['afvalsoort'];
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

            if($row['opgehaald'] == 1){
                echo "Opgehaald!";
            }
            else{
                echo "Nog niet opgehaald!";
            }
            echo "<br>";

         echo "<a class='' href='./ophalen.php?id=". $row['id']. "  '>Ophalen </a> "; 
                     echo  "</p>
                     </div>
                     </div>
            <br>";
          }
  
          // Free result set
          unset($result);
      } else{
          echo 'MOMENTEEL IS ER GEEN AFVAL OP TE HALEN!';
      }
  } catch(PDOException $e){
      die('ERROR: Could not able to execute $sql. ' . $e->getMessage());
  }
   ?>