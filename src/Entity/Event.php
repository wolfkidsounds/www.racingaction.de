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

    /**
     * Name des Events
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * Typ des Rennens
     * 
     * TODO: Enum?
     * 
     * Werte:
     * - Rennen
     * - Rennserie
     * - Freies Training
     * - Schulung
     * - Trainingscamp
     * - Sonstiges
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * Beginn des Events
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    /**
     * Ende des Events
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    /**
     * Anmelde-Informationen
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $registration = null;

    /**
     * Liste mit Links
     *
     * @var array|null
     */
    #[ORM\Column(length: 255, nullable: true)]
    private ?array $links = null;

    /**
     * Beschreibung des Events
     *
     * @var string|null
     */
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAllDay = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $schedule = null;

    #[ORM\Column(nullable: true)]
    private ?float $visitorPrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $visitorStart = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $riderClasses = null;

    #[ORM\Column(nullable: true)]
    private ?float $riderPrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $riderStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $riderBreefing = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $riderEnd = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $organizers = [];

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $websites = null;

    #[ORM\Column(length: 255)]
    private ?string $visibility = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $riderRegistration = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $location = [];

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

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): static
    {
        $this->registration = $registration;

        return $this;
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function setLinks(?array $links): static
    {
        $this->links = $links;

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

    public function isAllDay(): ?bool
    {
        return $this->isAllDay;
    }

    public function setAllDay(?bool $isAllDay): static
    {
        $this->isAllDay = $isAllDay;

        return $this;
    }

    public function getSchedule(): ?array
    {
        return $this->schedule;
    }

    public function setSchedule(?array $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getVisitorPrice(): ?float
    {
        return $this->visitorPrice;
    }

    public function setVisitorPrice(?float $visitorPrice): static
    {
        $this->visitorPrice = $visitorPrice;

        return $this;
    }

    public function getVisitorStart(): ?\DateTimeInterface
    {
        return $this->visitorStart;
    }

    public function setVisitorStart(?\DateTimeInterface $visitorStart): static
    {
        $this->visitorStart = $visitorStart;

        return $this;
    }

    public function getRiderClasses(): ?array
    {
        return $this->riderClasses;
    }

    public function setRiderClasses(?array $riderClasses): static
    {
        $this->riderClasses = $riderClasses;

        return $this;
    }

    public function getRiderPrice(): ?float
    {
        return $this->riderPrice;
    }

    public function setRiderPrice(?float $riderPrice): static
    {
        $this->riderPrice = $riderPrice;

        return $this;
    }

    public function getRiderStart(): ?\DateTimeInterface
    {
        return $this->riderStart;
    }

    public function setRiderStart(?\DateTimeInterface $riderStart): static
    {
        $this->riderStart = $riderStart;

        return $this;
    }

    public function getRiderBreefing(): ?\DateTimeInterface
    {
        return $this->riderBreefing;
    }

    public function setRiderBreefing(?\DateTimeInterface $riderBreefing): static
    {
        $this->riderBreefing = $riderBreefing;

        return $this;
    }

    public function getRiderEnd(): ?\DateTimeInterface
    {
        return $this->riderEnd;
    }

    public function setRiderEnd(?\DateTimeInterface $riderEnd): static
    {
        $this->riderEnd = $riderEnd;

        return $this;
    }

    public function getOrganizer(): array
    {
        return $this->organizers;
    }

    public function setOrganizer(array $organizers): static
    {
        $this->organizers = $organizers;

        return $this;
    }

    public function getWebsites(): ?array
    {
        return $this->websites;
    }

    public function setWebsites(?array $websites): static
    {
        $this->websites = $websites;

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRiderRegistration(): ?string
    {
        return $this->riderRegistration;
    }

    public function setRiderRegistration(?string $riderRegistration): static
    {
        $this->riderRegistration = $riderRegistration;

        return $this;
    }

    public function getOrganizers(): array
    {
        return $this->organizers;
    }

    public function setOrganizers(array $organizers): static
    {
        $this->organizers = $organizers;

        return $this;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $location): static
    {
        $this->location = $location;

        return $this;
    }
}
