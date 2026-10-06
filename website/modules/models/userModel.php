<?php

namespace modules\models;

use model\init;
use model\PDOException;
use PDO;

class userModel
{
    public function create(string $nom, string $prenom, string $email, string $password): bool {
        $pdo = init::getPDO();
        $sql = 'INSERT INTO utilisateur (nom, prenom, mot_de_passe, adresse_mail, date_creation) 
                VALUES (:nom, :prenom, :mot_de_passe, :adresse_mail, NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue('prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue('mot_de_passe', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue('adresse_mail', $email, PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erreur create utilisateur : ' . $e->getMessage());
            return false;
        }
    }

    public function findEmail(string $email): ?array{
        $pdo = init::getPDO();
        $sql = 'SELECT * FROM utilisateur WHERE adresse_mail = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);

        try
        {
            $stmt->execute(); // Exécution de la requête.
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        }
        catch (PDOException $e)
        {
            error_log('Erreur findEmail : ' . $e->getMessage());
            return null;
        }


    }

    public function changePassword(int $id, string $password): bool {
        $pdo = init::getPDO();
        $sql = 'UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('mot_de_passe', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erreur modification mot de passe' . $e->getMessage());
            return false;
        }
    }




}
