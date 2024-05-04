<?php // src/Entity/Event.php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateTimeBegin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeEnd = null;

    #[ORM\Column]
    private ?bool $isOpenEnd = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDateTimeBegin(): ?\DateTimeInterface
    {
        return $this->dateTimeBegin;
    }

    public function setDateTimeBegin(\DateTimeInterface $dateTimeBegin): static
    {
        $this->dateTimeBegin = $dateTimeBegin;

        return $this;
    }

    public function getDateTimeEnd(): ?\DateTimeInterface
    {
        return $this->dateTimeEnd;
    }

    public function setDateTimeEnd(?\DateTimeInterface $dateTimeEnd): static
    {
        $this->dateTimeEnd = $dateTimeEnd;

        return $this;
    }

    public function isOpenEnd(): ?bool
    {
        return $this->isOpenEnd;
    }

    public function setOpenEnd(bool $isOpenEnd): static
    {
        $this->isOpenEnd = $isOpenEnd;

        return $this;
    }
}
