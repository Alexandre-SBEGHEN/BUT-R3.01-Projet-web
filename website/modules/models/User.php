<?php

namespace modules\models;

class User
{
    public function __construct(
        private ?int $id,
        private string $nom,
        private string $prenom,
        private string $motDePasse,
        private string $adresseMail,
        private string $dateCreation,
        private ?string $token = null,
        private ?string $tokenDateExpiration = null
    ) {}

    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getMotDePasse(): string { return $this->motDePasse; }
    public function getAdresseMail(): string { return $this->adresseMail; }
    public function getDateCreation(): ?string { return $this->dateCreation; }
    public function getToken(): ?string { return $this->token; }
    public function getTokenDateExpiration(): ?string { return $this->tokenDateExpiration; }
}