<?php

namespace App\Entity;

use App\Repository\AwesomeCandidateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AwesomeCandidateRepository::class)
 */
class AwesomeCandidate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $twitterHandle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAwesome;

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

    public function getTwitterHandle(): ?string
    {
        return $this->twitterHandle;
    }

    public function setTwitterHandle(?string $twitterHandle): self
    {
        $this->twitterHandle = $twitterHandle;

        return $this;
    }

    public function getIsAwesome(): ?bool
    {
        return $this->isAwesome;
    }

    public function setIsAwesome(bool $isAwesome): self
    {
        $this->isAwesome = $isAwesome;

        return $this;
    }
}
