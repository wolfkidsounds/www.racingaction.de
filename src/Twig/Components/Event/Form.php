<?php

namespace App\Twig\Components\Event;

use DateTime;
use App\Entity\Event;
use DateTimeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent]
final class Form extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $name = null;

    #[LiveProp(writable: true)]
    public ?string $type = null;

    #[LiveProp(writable: true)]
    public ?string $location = null;

    #[LiveProp(writable: true)]
    public ?DateTimeInterface $dateStart = null;

    #[LiveProp(writable: true)]
    public ?DateTimeInterface $dateEnd = null;

    #[LiveProp(writable: true)]
    public ?string $priceVisitor = null;

    #[LiveProp(writable: true)]
    public ?string $priceRider = null;

    #[LiveProp(writable: true)]
    public ?DateTime $dateTimeStartVisitor = null;

    #[LiveProp(writable: true)]
    public ?DateTime $dateTimeArriving = null;

    #[LiveProp(writable: true)]
    public ?DateTime $dateTimeRidersbreefing = null;

    #[LiveProp(writable: true)]
    public ?DateTime $dateTimeLeaving = null;

    #[LiveProp(writable: true)]
    public ?string $classes = null;

    #[LiveProp(writable: true)]
    public ?string $registration = null;

    #[LiveProp(writable: true)]
    public ?string $linkUrl1 = null;

    #[LiveProp(writable: true)]
    public ?string $linkUrl2 = null;

    #[LiveProp(writable: true)]
    public ?string $linkUrl3 = null;

    #[LiveProp(writable: true)]
    public ?string $description = null;

    #[LiveProp(writable: true)]
    public ?bool $isEditing = false;

    #[LiveAction]
    public function enableEdit(): void
    {
        $this->isEditing = true;
    }

    #[LiveAction]
    public function save(EntityManagerInterface $em, ?bool $ansehen): Response
    {
        $this->isEditing = false;

        $event = new Event(); // Neues Objekt erzeugen
        $event->setName($this->name);
        $event->setType($this->type);
        $event->setLocation($this->location);
        $event->setDateStart($this->dateStart);
        $event->setDateEnd($this->dateEnd);
        $event->setRegistration($this->registration);
        $event->setDescription($this->description); // Objekt mit infos füllen
        $event->setLinks([
            $this->linkUrl1, 
            $this->linkUrl2, 
            $this->linkUrl3,
        ]);

        $em->persist($event); // Befehl zum Speichern
        $em->flush(); // Alle Befehle Ausführen
        
        noty()->success("Super! Das hat funktioniert");

        if ($ansehen == true) {
            return $this->redirectToRoute('app_events_read');
        }

        return $this->redirectToRoute('app_events_index');
    }
}
