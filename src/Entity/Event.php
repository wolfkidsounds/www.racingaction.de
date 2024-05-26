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
     * Ort des Events
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $location = null;

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
     * Preis für Zuschauer
     *
     * @var float|null
     */
    #[ORM\Column(nullable: true)]
    private ?float $priceVisitor = null;

    /**
     * Preis für Fahrer
     *
     * @var float|null
     */
    #[ORM\Column(nullable: true)]
    private ?float $priceRider = null;

    /**
     * Beginn für Zuschauer
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeStartVisitor = null;

    /**
     * Fahrer anreise
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeArrival = null;

    /**
     * Beginn der Fahrerbesprechung
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeRidersBreefing = null;

    /**
     * Fahrer abreise
     *
     * @var \DateTimeInterface|null
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeDeparture = null;

    /**
     * Erlaubte Klassen
     * 
     * TODO: Enum?
     *
     * @var string|null
     */
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classes = null;

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

    public function getDateTimeArrival(): ?\DateTimeInterface
    {
        return $this->dateTimeArrival;
    }

    public function setDateTimeArrival(?\DateTimeInterface $dateTimeArrival): static
    {
        $this->dateTimeArrival = $dateTimeArrival;

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

    public function getDateTimeDeparture(): ?\DateTimeInterface
    {
        return $this->dateTimeDeparture;
    }

    public function setDateTimeDeparture(?\DateTimeInterface $dateTimeDeparture): static
    {
        $this->dateTimeDeparture = $dateTimeDeparture;

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

    public function getlinks(): ?array
    {
        return $this->links;
    }

    public function setlinks(?array $links): static
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
}
