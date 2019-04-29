<?php
require_once 'connexion.php';
require_once 'init.php';
function logout() {
    if(logged_in() === TRUE){
        // supprime toutes les donnees de session actuelle
        session_unset();

        // met fin a la session
        session_destroy();
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
    <title>deconnexion</title>
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
<?php if (logout==TRUE) {
  <div class="retouraccueil">
  <button class="btn btn-primary btn-lg" type="button" name="button"><a href="accueil.html">accueil</a></button>
   ?>
   </div>
}


  </body>
</html>
