<?php
session_start();
require("controllers/AuthenticationController.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    VerifieConnexion();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'connexion';
}

switch ($page) {
    case 'connexion':
        require 'views/connexion.php';
        break;
    default:
        http_response_code(404);
        echo "Page non trouvée";
}