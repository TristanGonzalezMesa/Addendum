<script src="js/loginregister.js"></script>
<form method="post" action="">
                  <div class="box">
                       <h1>Register</h1>
  	                       <input type="text" value="Voornaam" name="Voornaam" class="InputField" onFocus="field_focus(this, 'Voornaam');" onblur="field_blur(this, 'Voornaam');" required><br>
                             <input type="text" value="Tussenvoegsel" name="Tussenvoegsel" class="InputField" onFocus="field_focus(this, 'Tussenvoegsel');" onblur="field_blur(this, 'Tussenvoegsel');" required><br>
  	                      <input type="text" value="Achternaam" name="Achternaam" class="InputField" onFocus="field_focus(this, 'Achternaam');" onblur="field_blur(this, 'Achternaam');" required><br>
                            <input type="text" value="Geslacht" name="Geslacht" class="InputField" onFocus="field_focus(this, 'Geslacht');" onblur="field_blur(this, 'Geslacht');" required><br>
  	                       <input type="text" value="Straat" name="Straat" class="InputField" onFocus="field_focus(this, 'Straat');" onblur="field_blur(this, 'Straat');" required><br>
                             <input type="text" value="Huisnummer" name="Huisnummer" class="InputField" onFocus="field_focus(this, 'Huisnummer');" onblur="field_blur(this, 'Huisnummer');" required><br>
  	                      <input type="text" value="Postcode" name="Postcode" class="InputField" onFocus="field_focus(this, 'Postcode');" onblur="field_blur(this, 'Postcode');" required><br>
  	                      <input type="text" value="Woonplaats" name="Woonplaats" class="InputField" onFocus="field_focus(this, 'Woonplaats');" onblur="field_blur(this, 'Woonplaats');" required><br>
  	                     <input type="text" value="Email" name="Email" class="InputField" onFocus="field_focus(this, 'Email');" onblur="field_blur(this, 'Email');" required><br>
  	                    <input type="password" name="Password" value="Password" class="InputField" onFocus="field_focus(this, 'Password');" onblur="field_blur(this, 'Password');" required><br>
                      <button type="submit" class="btn" name="Register">Register</button>
                     <a href="index.php"><div id="btn2">Homepage</div></a>
                   </form>


                   <?php

include ('database.php'); 
if (isset($_POST['Register'])) {
    $voornaam=$_POST['Voornaam'];
    $tussenvoegsel=$_POST['Tussenvoegsel'];
    $achternaam=$_POST['Achternaam'];
    $geslacht=$_POST['Geslacht'];
    $straat=$_POST['Straat'];
    $huisnummer=$_POST['Huisnummer'];
    $postcode=$_POST['Postcode'];
    $woonplaats=$_POST['Woonplaats'];
    $email=$_POST['Email'];
    $wachtwoord=$_POST['Password'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
$sql = "INSERT INTO gebruikers (voornaam, achternaam, straat, postcode, woonplaats, email, wachtwoord, tussenvoegsel, Geslacht, huisnummer)
VALUES ('$voornaam', '$achternaam', '$straat', '$postcode', '$woonplaats', '$email', '$wachtwoord', '$tussenvoegsel', '$geslacht', '$huisnummer')";

 try{
$conn->exec($sql);
header('location: login.php');
}
catch(PDOException $e) {
    echo $e->getmessage;
}
}

?>