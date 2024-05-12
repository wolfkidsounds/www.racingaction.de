<?php

namespace App\Twig\Components\Event;

use DateTime;
use DateTimeInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Form
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
    public ?string $linkUrl = null;

    #[LiveProp(writable: true)]
    public ?string $description = null;

    #[LiveProp(writable: true)]
    public ?bool $isEditing = false;

    #[LiveAction]
    public function enableEdit(): void
    {
        $this->isEditing = true;
    }
}
