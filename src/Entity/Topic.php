<?php

namespace App\Entity;

use App\Repository\TopicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TopicRepository::class)
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idCate;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudoUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreTopic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenuTopic;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureTopic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCate(): ?int
    {
        return $this->idCate;
    }

    public function setIdCate(int $idCate): self
    {
        $this->idCate = $idCate;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
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

    public function getTitreTopic(): ?string
    {
        return $this->titreTopic;
    }

    public function setTitreTopic(string $titreTopic): self
    {
        $this->titreTopic = $titreTopic;

        return $this;
    }

    public function getContenuTopic(): ?string
    {
        return $this->contenuTopic;
    }

    public function setContenuTopic(?string $contenuTopic): self
    {
        $this->contenuTopic = $contenuTopic;

        return $this;
    }

    public function getDateHeureTopic(): ?\DateTimeInterface
    {
        return $this->dateHeureTopic;
    }

    public function setDateHeureTopic(\DateTimeInterface $dateHeureTopic): self
    {
        $this->dateHeureTopic = $dateHeureTopic;

        return $this;
    }
}
