<?php

namespace App\Twig\Components\Admin\Event;

use App\Entity\Event;
use App\Form\Admin\EventFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent()]
final class Form extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?Event $event = null;

    #[ExposeInTemplate]
    private function getEvent(): Event
    {
        if (!$this->event) {
            return new Event();
        } else {
            return $this->event;
        }
    }

    #[ExposeInTemplate]
    private function getForm(): FormInterface
    {
        return $this->createForm(EventFormType::class, $this->getEvent());
    }
}
