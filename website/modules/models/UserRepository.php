<?php

namespace modules\models;

use assets\includes\init;
use PDOException;
use PDO;

class UserRepository
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

    public function findEmail(string $email): ?User {
        $pdo = init::getPDO();
        $sql = 'SELECT * FROM utilisateur WHERE adresse_mail = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $this->hydrate($result) : null;
        } catch (PDOException $e) {
            error_log('Erreur findEmail : ' . $e->getMessage());
            return null;
        }
    }

    public function findID(int $id): ?User {
        $pdo = init::getPDO();
        $sql = 'SELECT * FROM utilisateur WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $this->hydrate($result) : null;
        } catch (PDOException $e) {
            error_log('Erreur findID : ' . $e->getMessage());
            return null;
        }
    }

    public function changePassword(int $id, string $password): bool {
        $pdo = init::getPDO();
        $sql = 'UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->bindValue('mot_de_passe', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erreur modification mot de passe : ' . $e->getMessage());
            return false;
        }
    }

    public function deleteUser(int $id): bool {
        $pdo = init::getPDO();
        $sql = 'DELETE FROM utilisateur WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erreur destruction utilisateur : ' . $e->getMessage());
            return false;
        }
    }

    public function createToken(int $id): string|false {
        $pdo = init::getPDO();
        $token = bin2hex(random_bytes(16));
        $sql = 'UPDATE utilisateur SET token = :token, token_date_expiration = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->bindValue('token', $token, PDO::PARAM_STR);

        try {
            $stmt->execute();
            return $token;
        } catch (PDOException $e) {
            error_log('Erreur création token : ' . $e->getMessage());
            return false;
        }
    }

    public function findToken(string $token): ?int {
        $pdo = init::getPDO();
        $sql = 'SELECT utilisateur_id FROM utilisateur WHERE token = :token AND token_date_expiration >= NOW()';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('token', $token, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $id = $stmt->fetchColumn();
            return $id !== false ? (int) $id : null;
        } catch (PDOException $e) {
            error_log('Erreur findToken : ' . $e->getMessage());
            return null;
        }
    }

    public function deleteToken(int $id): bool {
        $pdo = init::getPDO();
        $sql = 'UPDATE utilisateur SET token = null, token_date_expiration = null WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erreur destruction token : ' . $e->getMessage());
            return false;
        }
    }

    private function createUserObjet(array $row): User {
        return new User(
            id: (int) $row['utilisateur_id'],
            nom: $row['nom'],
            prenom: $row['prenom'],
            motDePasse: $row['mot_de_passe'],
            adresseMail: $row['adresse_mail'],
            dateCreation: $row['date_creation'] ?? null,
            token: $row['token'] ?? null,
            tokenDateExpiration: $row['token_date_expiration'] ?? null
        );
    }

}