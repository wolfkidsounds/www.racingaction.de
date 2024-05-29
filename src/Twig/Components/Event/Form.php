<?php

namespace App\Twig\Components\Event;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
final class Form extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?Event $initialFormData = null;

    #[LiveProp(writable: true)]
    public ?bool $isEditing = false;

    #[LiveAction]
    public function enableEdit(): void
    {
        $this->isEditing = true;
    }
}
