<?php

namespace App\Twig\Components\Event;

use DateTime;
use App\Entity\Event;
use DateTimeInterface;
use App\Form\Event\OrganizerType;
use Symfony\Component\Form\FormView;
use App\Form\Event\CreateEventFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
final class Form extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(writable: true)]
    public ?Event $initialFormData = null;

    #[LiveProp(writable: true)]
    public ?bool $isEditing = false;

    #[LiveAction]
    public function enableEdit(): void
    {
        $this->isEditing = true;
    }

    protected function instantiateForm(): FormInterface
    {
        // we can extend AbstractController to get the normal shortcuts
        return $this->createForm(CreateEventFormType::class, $this->initialFormData);
    }

    #[LiveAction]
    public function addSchedule()
    {
        // "formValues" represents the current data in the form
        // this modifies the form to add an extra comment
        // the result: another embedded form!
        $this->formValues['schedule'][] = [];
    }

    #[LiveAction]
    public function removeSchedule(#[LiveArg] int $index)
    {
        unset($this->formValues['schedule'][$index]);
    }

    #[LiveAction]
    public function addOrganizer()
    {
        // "formValues" represents the current data in the form
        // this modifies the form to add an extra comment
        // the result: another embedded form!
        $this->formValues['organizers'][] = [];
    }

    #[LiveAction]
    public function removeOrganizer(#[LiveArg] int $index)
    {
        unset($this->formValues['organizers'][$index]);
    }

    #[LiveAction]
    public function addWebsite()
    {
        // "formValues" represents the current data in the form
        // this modifies the form to add an extra comment
        // the result: another embedded form!
        $this->formValues['websites'][] = [];
    }

    #[LiveAction]
    public function removeWebsite(#[LiveArg] int $index)
    {
        unset($this->formValues['websites'][$index]);
    }
}
