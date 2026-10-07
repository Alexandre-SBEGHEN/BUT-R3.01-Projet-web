<?php

namespace modules\controllers;

class logout_controller {
    public function execute(): void {
        // Vider le tableau de session
        $_SESSION = [];

        // Détruire la session côté serveur
        session_destroy();

        // Rediriger
        header('Location: /');
        exit;
    }
}