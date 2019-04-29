<?php
function bookExists($titre) {
    //le mot clé global est utilisé pour acceder à une variable global à partir d'une fonction
    global $connect;

    $sql = "SELECT * FROM livre WHERE titre = '$titre'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $connect->close();
    // sortie de connection BD
}

function bookAdd() {

    global $connect;

    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $prix = $_POST['prix'];
    $annee = $_POST['annee'];
    $image = $_POST['image'];


        $sql = "INSERT INTO livre (titre, auteur, prix, annee, image)
                VALUES ('$titre', '$auteur', '$prix', '$annee', '$image')";
        $query = $connect->query($sql);
        

    $connect->close();
    // sortie de connection BD
}

function bookData($titre) {
    global $connect;

    $sql = "SELECT * FROM livre WHERE titre = '$titre'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }

    $connect->close();

    // sortie de connextion BD
}

function getBookDataByBookId($id) {
    global $connect;

    $sql = "SELECT * FROM livre WHERE id = $id";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    return $result;

    $connect->close();
}

function book_exists_by_id($id, $titre) {
    global $connect;

    $sql = "SELECT * FROM livre WHERE titre = '$titre' AND id != $id";
    $query = $connect->query($sql);
    if($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

function updateBookInfo($id) {
    global $connect;

    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $prix = $_POST['prix'];
    $annee = $_POST['annee'];

    $sql = "UPDATE livre SET titre = '$titre', auteur = '$auteur', prix = '$prix', annee = '$annee' WHERE id = $id";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
