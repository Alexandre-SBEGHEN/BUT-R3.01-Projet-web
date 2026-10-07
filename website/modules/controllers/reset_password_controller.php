<?php

namespace modules\controllers;

use modules\models\user_repository_model;

class reset_password_controller {
    public function execute(): void {
        $token = trim($_GET['token'] ?? $_POST['token'] ?? '');

        if (empty($token)) {
            header('Location: login');
            exit;
        }

        $user_repository = new user_repository_model();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'] ?? '';
            $passwordConfirm = $_POST['password_confirm'] ?? '';

            if (empty($password) || $password !== $passwordConfirm) {
                $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
                header('Location: reset-password?token=' . $token);
                exit;
            }

            $userId = $user_repository->find_token($token);

            if ($userId === null) {
                $_SESSION['error'] = "Lien invalide ou expiré.";
                header('Location: forgotpassword');
                exit;
            }

            $user_repository->change_password($userId, $password);
            $user_repository->delete_token($userId);

            $_SESSION['success'] = "Mot de passe modifié avec succès.";
            header('Location: login');
            exit;
        }

        $userId = $user_repository->find_token($token);
        if ($userId === null) {
            $_SESSION['error'] = "Lien invalide ou expiré.";
            header('Location: forgotpassword');
            exit;
        }

        (new \modules\views\reset_password_view())->show($token);
    }
}