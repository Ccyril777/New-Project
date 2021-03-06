<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SystemInformationRepository")
 */
class SystemInformation
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
    private $usual_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siiName;

    /**
     * @ORM\Column(type="string", length=1500, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsualName(): ?string
    {
        return $this->usual_name;
    }

    public function setUsualName(string $usual_name): self
    {
        $this->usual_name = $usual_name;

        return $this;
    }

    public function getSiiName(): ?string
    {
        return $this->siiName;
    }

    public function setSiiName(string $siiName): self
    {
        $this->siiName = $siiName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
