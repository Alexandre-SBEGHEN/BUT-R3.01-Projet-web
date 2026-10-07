<?php

namespace modules\controllers;

use modules\models\user_repository_model;
use assets\includes\mailer;

class forgotpassword_controller {
    public function execute(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = trim($_POST["mail"] ?? '');

            if (empty($mail)) {
                $_SESSION["error"] = "Merci de remplir l'email.";
                header('Location: forgotpassword');
                exit;
            }

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["error"] = "Adresse email invalide.";
                header('Location: forgotpassword');
                exit;
            }

            $user_repository = new user_repository_model();
            $user = $user_repository->find_email($mail);

            // Message générique de sécurité
            $_SESSION["success"] = "Si cet email est associé à un compte, un lien de réinitialisation a été généré.";

            if ($user !== null) {
                $token = $user_repository->create_token($user->getId());

                if ($token !== false) {
                    $resetLink = 'http://' . $_SERVER['HTTP_HOST'] . '/reset-password?token=' . $token;
                    $subject = 'Réinitialisation de votre mot de passe';
                    $message = "Bonjour,\n\nVoici votre lien de réinitialisation (valide 10 minutes) :\n$resetLink\n\nSi vous n'êtes pas à l'origine de cette demande, ignorez cet email.";

                    mailer::send($mail, $subject, $message);
                }
            }

            header('Location: forgotpassword');
            exit;
        }

        (new \modules\views\forgotpassword_view())->show();
    }
}