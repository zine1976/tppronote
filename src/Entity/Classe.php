<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Prof::class, inversedBy="classe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prof;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=Eleve::class, mappedBy="classe", cascade={"persist", "remove"})
     */
    private $Eleve;

    

   
    

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getProfId(): ?Prof
    {
        return $this->prof;
    }

    public function setProfId(Prof $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->Eleve;
    }

    public function setEleve(Eleve $Eleve): self
    {
        // set the owning side of the relation if necessary
        if ($Eleve->getClasse() !== $this) {
            $Eleve->setClasse($this);
        }

        $this->Eleve = $Eleve;

        return $this;
    }


     
}
