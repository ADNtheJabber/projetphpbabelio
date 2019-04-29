<?php

require_once 'init.php';

// formulaire
if($_POST) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $adresse = $_POST['adresse'];

    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    if($prenom == "") {
        echo " * Votre prenom est requis <br />";
    }

    if($nom == "") {
        echo " * Votre nom de famille est requis <br />";
    }

    if($username == "") {
        echo " * Votre nom d'utilisateur est requis <br />";
    }

    if($password == "") {
        echo " * Mot de passe requis <br />";
    }

    if($confpassword == "") {
        echo " * Confirmation de mot de passe requise <br />";
    }

    if($prenom && $nom && $username && $password && $confpassword && $contact && $adresse) {

        if($password == $confpassword) {
            if(userExists($username) === TRUE) {
                echo $_POST['username'] . " existe déjà !!";
            } else {
                if(registerUser() === TRUE) {
                    echo "Inscription terminée avec succès !!!";
                    header('location: catalogue.php');
                } else {
                    echo "Error";
                }
            }
        } else {
            echo " * les mots de passe saisis ne correspondent pas... <br />";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>inscription</title>
  </head>
<body>

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
    </nav>

  </header>

      <h1>INSCRIPTION</h1>
    <div class="textform">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div>
              <label>Prenom: </label>
              <input type="text" name="prenom" placeholder="prenom" autocomplete="off" value="<?php if($_POST) {
                  echo $_POST['prenom'];
                  } ?>" />
          </div>
          <br />

          <div>
              <label>Nom: </label>
              <input type="text" name="nom" placeholder="nom de famille" autocomplete="off" value="<?php if($_POST) {
                  echo $_POST['nom'];
                  } ?>" />
          </div>
          <br />

          <div>
              <label>Contact: </label>
              <input type="text" name="contact" placeholder="contact" autocomplete="off" value="<?php if($_POST) {
                  echo $_POST['contact'];
                  } ?>" />
          </div>
          <br />

          <div>
              <label>Adresse: </label>
              <input type="text" name="adresse" placeholder="adresse" autocomplete="off" value="<?php if($_POST) {
                  echo $_POST['adresse'];
                  } ?>" />
          </div>
          <br />

          <div>
              <label>Nom d'utilisateur: </label>
              <input type="text" name="username" placeholder="Nom d'utilisateur" autocomplete="off" value="<?php if($_POST) {
                  echo $_POST['username'];
                  } ?>" />
          </div>
          <br />

          <div>
              <label>Mot de passe: </label>
              <input type="password" name="password" placeholder="Mot de passe" autocomplete="off" />
          </div>
          <br />

          <div>
              <label>Confirmation de Mot de passe: </label>
              <input type="password" name="confpassword" placeholder="Resaisir le mot de passe" autocomplete="off" />
          </div>
          <br />
          <div>
              <button type="submit">S'inscrire</button>
              <button type="reset">Annuler</button>
          </div>
          <p>Déjà inscrit(e) ? Cliquez <button class="btn btn-primary" type="button" name="button"><a href="login.php">Se connecter</a></button> </p>

      </form>
  </div>

</section>


<footer id="contact" class="footer">
  <div class="socialinks">
    <ul>
      <li><a href="www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <li><a href="www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
      <li><a href="www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <li><a href="www.youtube.com" target="_blank"><i class="fa fa-youtube"></i></a></li>
    </ul>
  </div>
  <div class="signature">
    <p>Design and code by <a href="#foto1">ADN</a></p>
  </div>
</footer>
</body>
</html>
