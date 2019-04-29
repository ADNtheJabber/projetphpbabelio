<?php

require_once 'init.php';
require_once 'livres.php';

// formulaire d'ajout de livre
if($_POST) {

    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $prix = $_POST['prix'];
    $annee = $_POST['annee'];
    $image = $_POST['image'];

    if($titre == "") {
        echo " * Le titre du livre est requis <br />";
    }

    if($auteur == "") {
        echo " * L'auteur du livre est requis <br />";
    }

    if($prix == "") {
        echo " * Veuillez indiquer un prix s'il vous plait <br />";
    }

    if($annee == "") {
        echo " * L'annee de publication est requise <br />";
    }

    if($image == "") {
        echo " * Joignez une image s'il vous plait <br />";
    }



    if($titre && $auteur && $prix && $annee && $image) {

            if(bookExists($titre) === TRUE) {
                echo $_POST['titre'] . " existe déjà !!";
            } else {
                if(bookAdd() === TRUE) {
                    echo "Livre ajouté avec succès !!!";
                    header('location: catalogue.php');
                } else {
                    echo "Error";
                }
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
    <title>ajout livre</title>
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

<div class="textform">
  <h1>AJOUTER UN LIVRE</h1>
  <div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <label>Titre: </label>
            <input type="text" name="titre" placeholder="titre du livre" autocomplete="off" value="<?php if($_POST) {
                echo $_POST['titre'];
                } ?>" />
        </div>
        <br />

        <div>
            <label>Auteur: </label>
            <input type="text" name="auteur" placeholder="auteur du livre" autocomplete="off" value="<?php if($_POST) {
                echo $_POST['auteur'];
                } ?>" />
        </div>
        <br />

        <div>
            <label>prix: </label>
            <input type="number" name="prix" placeholder="prix du livre" autocomplete="off" value="<?php if($_POST) {
                echo $_POST['prix'];
                } ?>" />
        </div>
        <br />

        <div>
            <label>Année: </label>
            <input type="number" name="annee" placeholder="année de publication" autocomplete="off" value="<?php if($_POST) {
                echo $_POST['annee'];
                } ?>" />
        </div>
        <div>
            <label>Joindre une photo</label>
            <input type="file" enctype:"multipart/form-data" name="image" placeholder="image" autocomplete="off" value="<?php if($_POST) {
                echo $_POST['image'];
                } ?>" />
        </div>

        <div>
            <button class="btn btn-primary btn-md" type="submit">Ajouter</button>

            <button class="btn btn-primary btn-md" type="reset">Annuler</button>
        </div>

    </form>
  </div>

</div>

<footer id="contact"class="container-fluid footer">
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
