<?php

namespace modules\controllers;

class authentication_controller
{
    public function execute()
    {
        $username = trim($_POST["username"] ?? '');
        if (empty($username)) {
            $_SESSION["error"] = "Merci de remplir le nom d'utilisateur.";
            header('Location: login');
            exit;
        }
        $password = trim($_POST["password"] ?? '');
        if ($password === '') {
            $_SESSION["error"] = "Merci de remplir le mot de passe.";
            header('Location: login');
            exit;
        }
    }
}