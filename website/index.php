<?php
/**
 * index.php
 *
 * Routeur du site web.
 *
 * Permet d'accéder aux différentes pages du site web via l'URL,
 * sans passer par une requête de type GET. Si la page cherchée
 * n'est pas trouvée, une réponse 404 est renvoyée et une page
 * personnalisée peut être affichée.
 *
 * @author MANKAI Adam
 * @author SBEGHEN Alexandre
 */

// Pré-requis
session_start();
require 'assets/includes/autoloader.php';

// Obtenir la page cible en fonction de l'URL
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$page = ($path === '') ? 'home' : $path;

// Essayer d'obtenir la page désirée
try {
    switch ($page) {
        case 'home':
            (new \modules\controllers\home_controller())->execute();
            break;
        case 'login':
            (new \modules\controllers\login_controller())->execute();
            break;
        default:
            throw new Exception('Page introuvable');
    }
} catch (Exception $e) {
    http_response_code(404);
    echo 'Page non trouvée';
}
