<?php

namespace modules\controllers;

class register_controller {

    public function execute(): void {
        // 1. Si la requête est en POST, on fait la création de compte
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->process_register();
            return;
        }

        // 2. Sinon (GET), on affiche l'inscription(vue)
        (new \modules\views\register_view())->show();
    }

    private function process_register(): void {
        $prenom = trim($_POST['prenom'] ?? '');
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Vérification des champs vides
        if (empty($prenom) || empty($nom) || empty($email) || empty($password)) {
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
            header('Location: register');
            exit;
        }

        // Validation du format e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Adresse email invalide.";
            header('Location: register');
            exit;
        }

        $user_model = new \modules\models\user_model();

        // Vérification de si l'email existe déjà dans la BDD
        if ($user_model->findEmail($email) !== null) {
            $_SESSION['error'] = "Cet email est déjà utilisé.";
            header('Location: register');
            exit;
        }

        // Création du compte en BDD
        $success = $user_model->create($nom, $prenom, $email, $password);

        if ($success) {
            header('Location: login');
            exit;
        } else {
            $_SESSION['error'] = "Erreur lors de l'inscription.";
            header('Location: register');
            exit;
        }
    }
}
