<?php session_start(); ?>
<ul>
<?php if(isset($_SESSION['Email'])){
  if ($_SESSION['Email'] == $_SESSION['Email']) {
    echo "";}
    }
    else{
      echo "<li><a href='login.php'>login</a></li>";
      echo "<li><a href='register.php'>register</a></li>";
    }
    ?>
        <li><a href="contact.php">contact</a></li>
        <li><a href="afval.php">afval</a></li>
        <li><a href="afspraak.php">afspraak</a></li>
        <li><a href="uitloggen.php">uitloggen</a></li>
        <?php if(isset($_SESSION['rol'])){if ($_SESSION['rol'] == 9) {echo "<li><a href='admin/index.php'>CMS</a></li>";}}?>
      </ul>
