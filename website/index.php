<?php

if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
}
require 'assets/includes/autoloader.php';
require("modules/controllers/authentication_controller.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    VerifieConnexion();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

try {
    switch ($page) {
        case 'home':
            (new \modules\controllers\home_controller())->execute();
            break;
        case 'login':
            (new \modules\controllers\login_controller())->execute();
            break;
        default:
            throw new Exception("La page que vous cherchez est introuvable");
    }
} catch (Exception $e) {
    http_response_code(404);
    echo "Page non trouvée";
}
