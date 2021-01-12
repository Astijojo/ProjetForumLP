<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
    private $idTopic;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUser;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuMess;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureMess;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTopic(): ?int
    {
        return $this->idTopic;
    }

    public function setIdTopic(int $idTopic): self
    {
        $this->idTopic = $idTopic;

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

    public function getContenuMess(): ?string
    {
        return $this->contenuMess;
    }

    public function setContenuMess(string $contenuMess): self
    {
        $this->contenuMess = $contenuMess;

        return $this;
    }

    public function getDateHeureMess(): ?\DateTimeInterface
    {
        return $this->dateHeureMess;
    }

    public function setDateHeureMess(\DateTimeInterface $dateHeureMess): self
    {
        $this->dateHeureMess = $dateHeureMess;

        return $this;
    }
}
