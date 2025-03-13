<?php

namespace App\Entity;

use App\Repository\ComptebancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptebancaireRepository::class)]
class Comptebancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $proprietaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): static
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;
        return $this;
    }

    public function __construct($proprietaire, $solde)
    {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

    public function retirer(float $montant): float
    {
        if ($this->solde - $montant < 0) {
            throw new \Exception("Solde insuffisant");
        } else {
            $this->solde -= $montant;
            return $this->solde;
        }
    }
}
