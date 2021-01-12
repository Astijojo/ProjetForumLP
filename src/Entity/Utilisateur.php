<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $pseudoUser;

    /**
     * @ORM\Column(type="text")
     */
    private $mailUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitAdmin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoUser(): ?string
    {
        return $this->pseudoUser;
    }

    public function setPseudoUser(string $pseudoUser): self
    {
        $this->pseudoUser = $pseudoUser;

        return $this;
    }

    public function getMailUser(): ?string
    {
        return $this->mailUser;
    }

    public function setMailUser(string $mailUser): self
    {
        $this->mailUser = $mailUser;

        return $this;
    }

    public function getMdpUser(): ?string
    {
        return $this->mdpUser;
    }

    public function setMdpUser(string $mdpUser): self
    {
        $this->mdpUser = $mdpUser;

        return $this;
    }

    public function getDroitAdmin(): ?bool
    {
        return $this->droitAdmin;
    }

    public function setDroitAdmin(bool $droitAdmin): self
    {
        $this->droitAdmin = $droitAdmin;

        return $this;
    }
}
