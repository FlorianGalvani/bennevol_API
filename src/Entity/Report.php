<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
{
    public function __toString()
    {
        return $this->id;
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
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $information;

    /**
     * @ORM\ManyToOne(targetEntity=Dumpsters::class, inversedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dumpster;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getDumpster(): ?Dumpsters
    {
        return $this->dumpster;
    }

    public function setDumpster(?Dumpsters $dumpster): self
    {
        $this->dumpster = $dumpster;

        return $this;
    }
}
