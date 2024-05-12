<?php

// src/Entity/Event.php

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

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $priceVisitor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $priceRider = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeStartVisitor = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeArriving = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeRidersBreefing = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeLeaving = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classes = null;

    #[ORM\Column(length: 255)]
    private ?string $registration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkUrl = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getPriceVisitor(): ?string
    {
        return $this->priceVisitor;
    }

    public function setPriceVisitor(string $priceVisitor): static
    {
        $this->priceVisitor = $priceVisitor;

        return $this;
    }

    public function getPriceRider(): ?string
    {
        return $this->priceRider;
    }

    public function setPriceRider(string $priceRider): static
    {
        $this->priceRider = $priceRider;

        return $this;
    }

    public function getDateTimeStartVisitor(): ?\DateTimeInterface
    {
        return $this->dateTimeStartVisitor;
    }

    public function setDateTimeStartVisitor(?\DateTimeInterface $dateTimeStartVisitor): static
    {
        $this->dateTimeStartVisitor = $dateTimeStartVisitor;

        return $this;
    }

    public function getDateTimeArriving(): ?\DateTimeInterface
    {
        return $this->dateTimeArriving;
    }

    public function setDateTimeArriving(?\DateTimeInterface $dateTimeArriving): static
    {
        $this->dateTimeArriving = $dateTimeArriving;

        return $this;
    }

    public function getDateTimeRidersBreefing(): ?\DateTimeInterface
    {
        return $this->dateTimeRidersBreefing;
    }

    public function setDateTimeRidersBreefing(?\DateTimeInterface $dateTimeRidersBreefing): static
    {
        $this->dateTimeRidersBreefing = $dateTimeRidersBreefing;

        return $this;
    }

    public function getDateTimeLeaving(): ?\DateTimeInterface
    {
        return $this->dateTimeLeaving;
    }

    public function setDateTimeLeaving(?\DateTimeInterface $dateTimeLeaving): static
    {
        $this->dateTimeLeaving = $dateTimeLeaving;

        return $this;
    }

    public function getClasses(): ?string
    {
        return $this->classes;
    }

    public function setClasses(?string $classes): static
    {
        $this->classes = $classes;

        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): static
    {
        $this->registration = $registration;

        return $this;
    }

    public function getLinkUrl(): ?string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(?string $linkUrl): static
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
