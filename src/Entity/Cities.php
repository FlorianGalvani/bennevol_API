<?php

namespace App\Entity;

use App\Repository\CitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitiesRepository::class)
 */
class Cities
{
    public function __toString()
    {
        return $this->name;
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Dumpsters::class, mappedBy="city")
     */
    private $dumpsters;

    /**
     * @ORM\ManyToOne(targetEntity=Departements::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    public function __construct()
    {
        $this->dumpsters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Dumpsters[]
     */
    public function getDumpsters(): Collection
    {
        return $this->dumpsters;
    }

    public function addDumpster(Dumpsters $dumpster): self
    {
        if (!$this->dumpsters->contains($dumpster)) {
            $this->dumpsters[] = $dumpster;
            $dumpster->setCity($this);
        }

        return $this;
    }

    public function removeDumpster(Dumpsters $dumpster): self
    {
        if ($this->dumpsters->removeElement($dumpster)) {
            // set the owning side to null (unless already changed)
            if ($dumpster->getCity() === $this) {
                $dumpster->setCity(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?Departements
    {
        return $this->departement;
    }

    public function setDepartement(?Departements $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
}
