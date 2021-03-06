<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
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
     * @ORM\ManyToMany(targetEntity=Note::class, mappedBy="matiere", cascade={"persist", "remove"})
     */
    private $Note;

    /**
     * @ORM\ManyToOne(targetEntity=Prof::class, inversedBy="Matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prof;

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

    public function getNote(): ?Note
    {
        return $this->Note;
    }

    public function setNote(Note $Note): self
    {
        // set the owning side of the relation if necessary
        if ($Note->getMatiere() !== $this) {
            $Note->setMatiere($this);
        }

        $this->Note = $Note;

        return $this;
    }

    public function getProf(): ?Prof
    {
        return $this->prof;
    }

    public function setProf(?Prof $prof): self
    {
        $this->prof = $prof;

        return $this;
    }
}
