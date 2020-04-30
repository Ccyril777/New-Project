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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Domaine", mappedBy="systemInformation")
     */
    private $domain;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TypologyMI", mappedBy="systemInformation")
     */
    private $type;

    public function __construct()
    {
        $this->confidentialite = new ArrayCollection();
        $this->domain = new ArrayCollection();
        $this->type = new ArrayCollection();
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

    /**
     * @return Collection|Domaine[]
     */
    public function getDomain(): Collection
    {
        return $this->domain;
    }

    public function addDomain(Domaine $domain): self
    {
        if (!$this->domain->contains($domain)) {
            $this->domain[] = $domain;
            $domain->setSystemInformation($this);
        }

        return $this;
    }

    public function removeDomain(Domaine $domain): self
    {
        if ($this->domain->contains($domain)) {
            $this->domain->removeElement($domain);
            // set the owning side to null (unless already changed)
            if ($domain->getSystemInformation() === $this) {
                $domain->setSystemInformation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypologyMI[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(TypologyMI $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setSystemInformation($this);
        }

        return $this;
    }

    public function removeType(TypologyMI $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
            // set the owning side to null (unless already changed)
            if ($type->getSystemInformation() === $this) {
                $type->setSystemInformation(null);
            }
        }

        return $this;
    }
}