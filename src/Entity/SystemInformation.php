<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $usualInformationName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siiName;

    /**
     * @ORM\Column(type="string", length=1500, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Confidentialite", mappedBy="systemInformation", orphanRemoval=true)
     */
    private $confidentialite;

    public function __construct()
    {
        $this->confidentialite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsualInformationName(): ?string
    {
        return $this->usualInformationName;
    }

    public function setUsualInformationName(string $usualInformationName): self
    {
        $this->usualInformationName = $usualInformationName;

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

    /**
     * @return Collection|Confidentialite[]
     */
    public function getConfidentialite(): Collection
    {
        return $this->confidentialite;
    }

    public function addConfidentialite(Confidentialite $confidentialite): self
    {
        if (!$this->confidentialite->contains($confidentialite)) {
            $this->confidentialite[] = $confidentialite;
            $confidentialite->setSystemInformation($this);
        }

        return $this;
    }

    public function removeConfidentialite(Confidentialite $confidentialite): self
    {
        if ($this->confidentialite->contains($confidentialite)) {
            $this->confidentialite->removeElement($confidentialite);
            // set the owning side to null (unless already changed)
            if ($confidentialite->getSystemInformation() === $this) {
                $confidentialite->setSystemInformation(null);
            }
        }

        return $this;
    }
}
