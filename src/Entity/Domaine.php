<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomaineRepository")
 */
class Domaine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaineName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SystemInformation", inversedBy="domain")
     * @ORM\JoinColumn(nullable=false)
     */
    private $systemInformation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaineName(): ?string
    {
        return $this->domaineName;
    }

    public function setDomaineName(string $domaineName): self
    {
        $this->domaineName = $domaineName;

        return $this;
    }

    public function getSystemInformation(): ?SystemInformation
    {
        return $this->systemInformation;
    }

    public function setSystemInformation(?SystemInformation $systemInformation): self
    {
        $this->systemInformation = $systemInformation;

        return $this;
    }
}
