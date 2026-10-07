<?php

namespace modules\controllers;

use modules\models\user_repository_model;

class authentication_controller
{
    public function execute(): void
    {
        $mail = trim($_POST["mail"] ?? '');
        if (empty($mail)) {
            $_SESSION["error"] = "Merci de remplir l'email.";
            header('Location: /login');
            exit;
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Adresse email invalide.";
            header('Location: /login');
            exit;
        }

        $password = trim($_POST["password"] ?? '');
        if ($password === '') {
            $_SESSION["error"] = "Merci de remplir le mot de passe.";
            header('Location: /login');
            exit;
        }

        // Utilisation de repository et de la méthode find_email
        $userRepository = new user_repository_model();
        $user = $userRepository->find_email($mail);

        if ($user === null) {
            $_SESSION["error"] = "Email ou mot de passe incorrect.";
            header('Location: /login');
            exit;
        }

        // Comme find_email retourne un objet user_model, on utilise le getter
        if (!password_verify($password, $user->getMotDePasse())) {
            $_SESSION["error"] = "Email ou mot de passe incorrect.";
            header('Location: /login');
            exit;
        }

        // Nouvel id de session après la connexion (évitequ'un attaquant utilise cet id de session)
        session_regenerate_id(true);

        // On stocke que l'id car l'objet contient le hash du mot de passe)
        $_SESSION['user_id'] = $user->getId();
        // on a beosin de la ligne car on doit récuperer les infos de l'utilisateur
        $_SESSION['user'] = $user;

        header('Location: /home');
        exit;
    }
}