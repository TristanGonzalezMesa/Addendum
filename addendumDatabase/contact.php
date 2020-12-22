<script src="js/loginregister.js"></script>

<?php
session_start();
include ('database.php'); 
$gebruiker = $_SESSION['Email'];
?>
    <?php if(isset($_SESSION['rol'])){if ($_SESSION['rol'] > 9) {  header('Location: ./index.php');}}?>
    <?php if(isset($_SESSION['Email']) == "Email"){echo "";}else{header('Location: ./index.php');}?>

<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
</head>
<body>
<h2>Stuur een bericht</h2>
  
  <form class="form" action="" method="POST">
    
    <p class="username">
      <input type="text" name="name" id="name" placeholder="Naam" >
      <label for="name">Naam</label>
    </p>
    
    <p class="useremail">
      <input type="text" name="email" id="email" placeholder="email" >
      <label for="email">email</label>
    </p>
    
    <p class="usercontact">
      <input type="text" name="contact" id="contact" placeholder="telnm" >
      <label for="contact">telnmr</label>
    </p>    
  
    <p class="usertext">
      <textarea name="text" placeholder="Wat voor afval ophalen?" ></textarea>
                        <label for="text">Wat voor afval ophalen?</label>
    </p>

    <p class="userdate">
      <input type="date" name="date" placeholder="Wanneer afval ophalen?" ></textarea>
                        <label for="text">Datum?</label>
    </p>
    
    <p class="usersubmit">
      <input type="submit" name="submit" value="Send" >
    </p>
  </form>
</body>
</html>


<?php
include ('database.php'); 
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
include ('database.php'); 
  //ingevoerd
if((isset($_POST['submit'])))
{
  //invoer naar variables
$Name = $con->real_escape_string($_POST['name']);
$Email = $con->real_escape_string($_POST['email']);
$Phone = $con->real_escape_string($_POST['contact']);
$comments = $con->real_escape_string($_POST['text']);
$Date = $_POST['date'];
  //query naar database
$sql="INSERT INTO contactformulier (name, email, phone, comments, Datum, klantid) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."', '".$Date."', '".$klantid."')";
  //error
if(!$result = $con->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   echo "We nemen contact op!";
}
?>

<a href="index.php">Homepage</a>