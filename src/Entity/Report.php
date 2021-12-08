<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
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
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $information;

    /**
     * @ORM\ManyToOne(targetEntity=Dumpsters::class, inversedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dumpsters;

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

    public function getDumpsters(): ?Dumpsters
    {
        return $this->dumpsters;
    }

    public function setDumpsters(?Dumpsters $dumpsters): self
    {
        $this->dumpsters = $dumpsters;

        return $this;
    }
}
