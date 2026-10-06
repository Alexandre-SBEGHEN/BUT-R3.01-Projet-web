<?php
/**
 * user_repository_model.php
 *
 * Gère toutes les interactions avec la table utilisateur.
 *
 * create() permet de rajouter un utilisateur.
 * find_email() permet de retrouver un utilisateur (user_model) depuis son email.
 * find_id() pareil que find_email() avec l'id.
 * change_password() permet de changer le mot de passe d'un utilisateur avec son id.
 * delete_user() permet de supprimer un utilisateur et toutes ses données.
 * create_token() crée un token et sa date d'expiration (valide 10 min).
 * find_token() vérifie si un token existe et est toujours valide, renvoie l'id de l'utilisateur.
 * delete_token() efface le token lié à un id.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\models;

use assets\includes\init;
use PDOException;
use PDO;

class user_repository_model
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

    public function find_email(string $email): ?user_model {
        $pdo = init::getPDO();
        $sql = 'SELECT * FROM utilisateur WHERE adresse_mail = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $this->create_user_objet($result) : null;
        } catch (PDOException $e) {
            error_log('Erreur find_email : ' . $e->getMessage());
            return null;
        }
    }

    public function find_id(int $id): ?user_model {
        $pdo = init::getPDO();
        $sql = 'SELECT * FROM utilisateur WHERE utilisateur_id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $this->create_user_objet($result) : null;
        } catch (PDOException $e) {
            error_log('Erreur find_id : ' . $e->getMessage());
            return null;
        }
    }

    public function change_password(int $id, string $password): bool {
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

    public function delete_user(int $id): bool {
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

    public function create_token(int $id): string|false {
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

    public function find_token(string $token): ?int {
        $pdo = init::getPDO();
        $sql = 'SELECT utilisateur_id FROM utilisateur WHERE token = :token AND token_date_expiration >= NOW()';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('token', $token, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $id = $stmt->fetchColumn();
            return $id !== false ? (int) $id : null;
        } catch (PDOException $e) {
            error_log('Erreur find_token : ' . $e->getMessage());
            return null;
        }
    }

    public function delete_token(int $id): bool {
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

    private function create_user_objet(array $row): user_model {
        return new user_model(
            id: (int) $row['utilisateur_id'],
            nom: $row['nom'],
            prenom: $row['prenom'],
            mot_de_passe: $row['mot_de_passe'],
            adresse_mail: $row['adresse_mail'],
            date_creation: $row['date_creation'],
            token: $row['token'] ?? null,
            token_date_expiration: $row['token_date_expiration'] ?? null
        );
    }
}