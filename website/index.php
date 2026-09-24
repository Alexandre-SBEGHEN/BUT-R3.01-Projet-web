<?php
if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
}
require("modules/controllers/AuthentificationController.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    VerifieConnexion();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'connexion';
}

try {
    switch ($page) {
        case 'connexion':
            (new \modules\controllers\connexion_controller())->execute();
            break;
        case 'inscription':
            (new \modules\controllers\inscription_controller())->execute();
            break;
        case 'mdp_oublie':
            (new \modules\controllers\mdp_oublie_controller())->execute();
            break;
        case 'deconnexion':
            (new \modules\controllers\deconnexion_controller())->execute();
            break;
        default:
            throw new Exception("La page que vous cherchez est introuvable");
    }
} catch (Exception $e) {
    http_response_code(404);
    echo "Page non trouvée";
}
