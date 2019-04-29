<?php
$server="127.0.0.1";
$user="root";
$password="";
$nombd="babeliodb";

$connect= new mysqli ($server,$user,$password,$nombd);

if($connect->connect_error) {
    die("La connexion à la BD a échoué : " . $connect->error);
  } else {
    echo "Connexion établie à la BD: ". $nombd;
  }
?>
