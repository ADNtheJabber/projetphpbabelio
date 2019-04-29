<?php
  session_start();
  require_once 'connexion.php';
  require_once 'utilisateurs.php';
  require_once 'livres.php';

  $_SESSION['username']= 'admin';

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>catalogue</title>
  </head>

  <body>
    <!--header-->
      <header>
        <nav class="container-fluid navigation">
          <div class="container-fluid titre">
            <h1>Babelio</h1>
          </div>

          <div class="container">
            <hr class="separationLine">
          </div>

          <div class="container slogan">
            <h5>Nous allons vous faire aimer la lecture !</h5>
          </div>
          <div class="container-fluid menusecond">
          <ul>

            <li> <?php
            if (logged_in() === TRUE)
                echo "Salut " .$_SESSION['username']  ?>
                <a href="logout.php">Se deconnecter</a>
            </li>
            <li> <?php
            if (not_logged_in() === TRUE) {
              echo "Salut visiteur";
            } ?>
          </li>

          </ul>
          </div>
      </header>






</body>
</html>
