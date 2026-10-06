<?php

namespace modules\controllers;

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

            $user_repository = new \modules\models\user_repository_model();
            $user = $user_repository->find_email($mail);

            // Message générique de sécurité
            $_SESSION["success"] = "Si cet email est associé à un compte, un lien de réinitialisation a été généré.";

            if ($user !== null) {
                // Génération du token en BDD (valide 10 min)
                $user_repository->create_token($user->getId());
            }

            header('Location: forgotpassword');
            exit;
        }

        (new \modules\views\forgotpassword_view())->show();
    }
}