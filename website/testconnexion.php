<?php

// test-connexion.php fait par ia et a supprimer avant le rendu
require_once __DIR__ . '/assets/includes/autoloader.php';
require_once __DIR__ . '/assets/includes/init.php';

\assets\includes\init::init(__DIR__, '/assets/images', '/assets/styles');

try {
    $pdo = \assets\includes\init::getPDO();
    echo "Connexion réussie !";
} catch (\Throwable $e) {
    echo "Échec : " . $e->getMessage();
}