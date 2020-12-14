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
$sql="INSERT INTO contactformulier (name, email, phone, comments, Datum) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."', '".$Date."')";
  //error
if(!$result = $con->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   echo "We nemen contact op!";
}
?>