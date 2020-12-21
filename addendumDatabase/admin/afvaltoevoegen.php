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
    $sql = "SELECT * FROM klanten WHERE email='$gebruiker'";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

            $plaatsertnaam = $row['voornaam'];
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

<!-- <form method="post" action="">
                  <div class="box">
                    <h1>Afval toevoegen</h1>
                    Soort afval
                      <input type="text" name="Soort" value="Soort" onFocus="field_focus(this, 'Soort');" onblur="field_blur(this, 'Soort');" class="InputField" /><br>
                    Vanaf 
                      <input type="date" name="datumvan" class="InputField" value="datum"><br>
                    Tot
                      <input type="date" name="datumtot" class="InputField" value="datum"><br>
                         <button type="submit" class="btn" name="afvaltoevoegen">voeg toe</button>
                       </div>
                     </form> -->

<form method="post" action="">
<div class="box">
<h1>Afval toevoegen</h1>
Afvalnaam
<input type="text" name="afvalnaam" value="afvalnaam" onFocus="field_focus(this, 'afvalnaam');" onblur="field_blur(this, 'afvalnaam');" class="InputField" /><br>
Afvalomscrhijving
<input type="text" name="afvalomscrhijving" value="afvalomscrhijving" onFocus="field_focus(this, 'afvalomscrhijving');" onblur="field_blur(this, 'afvalomscrhijving');" class="InputField" /><br>
prijs
<input type="text" name="prijs" value="prijs" onFocus="field_focus(this, 'prijs');" onblur="field_blur(this, 'prijs');" class="InputField" /><br>
Vanaf 
                      <input type="date" name="datumvan" class="InputField" value="datum"><br>
                    Tot
                      <input type="date" name="datumtot" class="InputField" value="datum"><br>

<button type="submit" class="btn" name="afvaltoevoegen1">voeg toe</button>
</div>
</form>



                     <?php

// if (isset($_POST['afvaltoevoegen'])) {
//     $Soort=$_POST['Soort'];
//     $datumvan=$_POST['datumvan'];
//     $datumtot=$_POST['datumtot'];
//     $geplaatstfoor = 
//     $opgehaalddoor = "0";
//     $opgehaald = "0";


// $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
// $sql = "INSERT INTO afspraak (afvalsoort, datumhalenvan, datumhalentot, geplaatstdoor, opgehaalddoor, opgehaald)
// VALUES ('$Soort', '$datumvan', '$datumtot', '$plaatsertnaam', '$opgehaalddoor', '$opgehaald')";

//  try{
// $conn->exec($sql);
// header('location: index.php');
// }
// catch(PDOException $e) {
//     echo $e->getmessage;
// }
// }

// ?>

<?php

if (isset($_POST['afvaltoevoegen1'])) {
    $afvalnaam=$_POST['afvalnaam'];
    $afvalomscrhijving=$_POST['afvalomscrhijving'];
    $prijs=$_POST['prijs'];
    $datumvan=$_POST['datumvan'];
    $datumtot=$_POST['datumtot'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
$sql = "INSERT INTO afval (afvalomschrijving, prijs, afvalnaam,datumhalenvan, datumhalentot, geplaatstdoor)
VALUES ('$afvalomscrhijving', '$prijs', '$afvalnaam', '$datumvan', '$datumtot', '$plaatsertnaam')";

 try{
$conn->exec($sql);
header('location: index.php');
}
catch(PDOException $e) {
    echo $e->getmessage;
    echo $e;
}
}

?>