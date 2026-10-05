<?php
/**
 * user_model.php
 *
 * Entité représentant un utilisateur.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\models;

class user_model
{
    public function __construct(
        private ?int $id,
        private string $nom,
        private string $prenom,
        private string $mot_de_passe,
        private string $adresse_mail,
        private string $date_creation,
        private ?string $token = null,
        private ?string $token_date_expiration = null
    ) {}

    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getMotDePasse(): string {
        return $this->mot_de_passe;
    }

    public function getAdresseMail(): string {
        return $this->adresse_mail;
    }

    public function getDateCreation(): string {
        return $this->date_creation;
    }

    public function getToken(): ?string {
        return $this->token;
    }

    public function getTokenDateExpiration(): ?string {
        return $this->token_date_expiration;
    }
}