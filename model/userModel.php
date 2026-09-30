<?php

namespace model;

class userModel
{
    public function create(string $nom, string $prenom, string $email, string $password): bool {
        $pdo = init::getPDO();
        $sql = 'INSERT INTO utilisateur (nom, prenom, mot_de_passe, adresse_mail, date_creation) 
                VALUES (:nom, :prenom, :mot_de_passe, :adresse_mail, NOW())';
    }

}
