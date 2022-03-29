<?php

namespace App\Entity;

use App\Repository\ProfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfRepository::class)
 */
class Prof
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_naissance;

    /**
     * @ORM\OneToMany(targetEntity=Classe::class, mappedBy="prof", cascade={"persist", "remove"})
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="prof", orphanRemoval=true)
     */
    private $Matieres;

    public function __construct()
    {
        $this->Matieres = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(Classe $classe): self
    {
        // set the owning side of the relation if necessary
        if ($classe->getProfId() !== $this) {
            $classe->setProfId($this);
        }

        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatieres(): Collection
    {
        return $this->Matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->Matieres->contains($matiere)) {
            $this->Matieres[] = $matiere;
            $matiere->setProf($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->Matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getProf() === $this) {
                $matiere->setProf(null);
            }
        }

        return $this;
    }

}
