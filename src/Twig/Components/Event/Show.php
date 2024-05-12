<?php

namespace App\Twig\Components\Event;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Show
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?Event $event = null;

    public ?string $name = null;

    #[LiveProp(writable: true)]
    public ?bool $isEditing = false;

    #[LiveAction]
    public function enableEdit(): void
    {
        $this->isEditing = true;
    }
}
