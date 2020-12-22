
<?php
include ('database.php'); 
try{
    $sql = "SELECT * FROM afval WHERE opgehaald='0'";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<h1> Beschikbaar Afval: </h1>";
        while($row = $result->fetch()){

        
            echo "<div class='col-xs-6 col-sm-2 mb-20'>
            <div style='border-style: solid;'>";         
            echo "<br>"; 
            echo "Soort afval ";
            echo $row['afvalnaam'];
            echo "<br>";
            echo "Omschrijving ";
            echo $row['afvalomschrijving'];
            echo "<br>";
            echo "Op te halen van: ";
            echo $row['datumhalenvan'];
            echo "<br>";
            echo "Op te halen tot: ";
            echo $row['datumhalentot'];
            echo "<br>";

         echo "<a class='' href='./ophalen.php?id=". $row['afvalnummer']. "  '>Ophalen </a> "; 
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

<a href="index.php">Homepage</a>