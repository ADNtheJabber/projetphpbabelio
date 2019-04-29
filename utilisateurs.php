<?php
 function logged_in() {
    if(isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}
function userExists($username) {
    //le mot clé global est utilisé pour acceder à une variable global à partir d'une fonction
    global $connect;

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $connect->close();
    // sortie de connection BD
}

function registerUser() {

    global $connect;

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $adresse = $_POST['adresse'];

    if($password) {
        $sql = "INSERT INTO users (prenom, nom, username, password, contact,adresse)
                VALUES ('$prenom', '$nom', '$username', '$password', '$contact', '$adresse')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $connect->close();
    // sortie de connection BD
}
function login($username, $password) {
    global $connect;
    $userdata = userdata($username);

    if($userdata) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = $connect->query($sql);

        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $connect->close();
    // sortie de connextion BD
}

function userdata($username) {
    global $connect;
    $sql = "SELECT * FROM users WHERE username = '$username'";
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
function not_logged_in() {
    if(isset($_SESSION['id']) === FALSE) {
        return true;
    } else {
        return false;
    }
}

function getUserPrenomByUserUsername($username) {
    global $connect;

    $sql = "SELECT prenom FROM users WHERE username = $username";
    $query = $connect->query($sql);
    return $query;

    $connect->close();
}

function users_exists_by_id($id, $username) {
    global $connect;

    $sql = "SELECT * FROM users WHERE username = '$username' AND id != $id";
    $query = $connect->query($sql);
    if($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

function updateInfo($id) {
    global $connect;

    $username = $_POST['username'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $contact = $_POST['contact'];
    $adresse = $_POST['adresse'];

    $sql = "UPDATE users SET username = '$username', prenom = '$prenom', nom = '$nom', contact = '$contact', adresse = '$adresse' WHERE id = $id";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
function passwordMatch($id, $password) {
    global $connect;

    $userdata = getUserDataByUserId($id);

    $makePassword = makePassword($password, $userdata['salt']);

    if($makePassword == $userdata['password']) {
        return true;
    } else {
        return false;
    }

    // sortie connection BD
    $connect->close();
}

function changePassword($id, $password) {
    global $connect;

    $sql = "UPDATE users SET password = '$password' WHERE id = $id";
    $query = $connect->query($sql);

    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
