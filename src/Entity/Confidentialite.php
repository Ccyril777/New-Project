<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfidentialiteRepository")
 */
class Confidentialite
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
    private $confidentialiteName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SystemInformation", inversedBy="confidentialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $systemInformation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfidentialiteName(): ?string
    {
        return $this->confidentialiteName;
    }

    public function setConfidentialiteName(string $confidentialiteName): self
    {
        $this->confidentialiteName = $confidentialiteName;

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
