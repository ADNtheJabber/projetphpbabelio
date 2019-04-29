<?php
  session_start();
  require_once 'connexion.php';
  require_once 'init.php';
  if(logged_in() === TRUE) {
      header('location: catalogue.php');
   }
 ?>
 <?php

 // informations du formulaire
 if($_POST) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     if($username == "") {
         echo " * Le nom d'utilisateur est requis <br />";
     }

     if($password == "") {
         echo " * Le mot de passe est requis <br />";
     }

     if($username && $password) {
         if(userExists($username) == TRUE) {
             $login = login($username, $password);
             if($login) {
                 $userdata = userdata($username);

                 $_SESSION['id'] = $userdata['id'];

                 header('location: catalogue.php');
                 exit();

             } else {
                 echo "Nom d'utilisateur ou Mot de passe incorrect";
             }
         } else{
             echo "Nom d'utilisateur inexistant";
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
  <title>connexion</title>
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


    <section class:"container-fluid formlog">
      <div class="authentification">
        <h1>CONNEXION</h1>
        <div class="textform">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <div>
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="Nom d'utilisateur" />
            </div>
            <br />

            <div>
                <label>Mot de passe</label>
                <input type="password" name="password" id="password" autocomplete="off" placeholder="Mot de passe" />
            </div>
            <br />

            <div>
                <button type="submit">Se connecter</button>
                <button type="reset">Annuler</button>
            </div>

        </form>

        <p>Pas encore inscrit(e) ? Cliquez <button class="btn btn-primary" type="button" name="button"><a href="inscription.php">S'inscrire</a></button> </p>

        </div>
      </div>
    </section>

  </body>
</html>
