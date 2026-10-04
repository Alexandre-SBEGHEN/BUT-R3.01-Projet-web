<?php

namespace modules\controllers;

class authentication_controller
{
    public function execute()
    {
        $mail = trim($_POST["mail"] ?? '');
        if (empty($mail)) {
            $_SESSION["error"] = "Merci de remplir l'email";
            header('Location: login');
            exit;
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Adresse email invalide.";
            header('Location: login');
            exit;
        }

        $password = trim($_POST["password"] ?? '');
        if ($password === '') {
            $_SESSION["error"] = "Merci de remplir le mot de passe.";
            header('Location: login');
            exit;
        }

        $user = (new \modules\models\user_model())->findEmail($mail);

        if ($user === null) {
            $_SESSION["error"] = "Email ou mot de passe incorrect.";
            header('Location: login');
            exit;
        }

        if (!password_verify($password, $user['mot_de_passe'])) {
            $_SESSION["error"] = "Email ou mot de passe incorrect.";
            header('Location: login');
            exit;
        }

        $_SESSION['user'] = $user;
        header('Location: home');
        exit;
    }
}