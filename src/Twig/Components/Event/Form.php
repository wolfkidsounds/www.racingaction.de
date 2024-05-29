<?php

namespace App\Twig\Components\Event;

use DateTime;
use App\Entity\Event;
use DateTimeInterface;
use Symfony\Component\Form\FormView;
use App\Form\Event\CreateEventFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
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
    public function save(EntityManagerInterface $em)
    {
        // Submit the form! If validation fails, an exception is thrown
        // and the component is automatically re-rendered with the errors
        $this->submitForm();

        /** @var Post $post */
        $post = $this->getForm()->getData();
        $em->persist($post);
        $em->flush();

        noty()->success('Saved successfully');

        return $this->redirectToRoute('app_events_index');
    }
}
