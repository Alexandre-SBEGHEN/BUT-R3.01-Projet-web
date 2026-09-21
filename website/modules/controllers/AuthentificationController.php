<?php

function VerifieConnexion() {
    $username = $_POST["username"];
    if(empty($username)) {
        $_SESSION["error"] = "Merci de remplir le nom d'utilisateur.";
        header('Location: index.php');
        exit;
    }
    $password = $_POST["password"];
    if(empty($password)) {
        $_SESSION["error"] = "Merci de remplir le mot de passe.";
        header('Location: index.php');
        exit;
    }
}