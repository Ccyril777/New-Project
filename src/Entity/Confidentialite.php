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
}
