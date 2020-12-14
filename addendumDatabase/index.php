<?php session_start(); ?>
<ul>
        <li><a href="login.php">login</a></li>
        <li><a href="register.php">register</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="afval.php">afval</a></li>
        <li><a href="uitloggen.php">uitloggen</a></li>
        <?php if(isset($_SESSION['rol'])){if ($_SESSION['rol'] == 9) {echo "<li><a href='admin/index.php'>CMS</a></li>";}}?>
      </ul>