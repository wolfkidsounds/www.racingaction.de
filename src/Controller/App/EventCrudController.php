<?php

// src/Controller/App/EventCrudController.php

namespace App\Controller\App;

use App\Entity\Event;
use App\Form\App\EventFormType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/app/events', name: 'app_events_')]
class EventCrudController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('app/pages/events/index.html.twig', [
            'title' => 'Meine Events',
            'events' => $eventRepository->findAll(),
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(): Response
    {
        return $this->render('app/pages/events/create.html.twig', [
            'title' => 'Event erstellen',
        ]);
    }

    #[Route('/read/{id}', name: 'read', methods: ['GET'])]
    public function read(Event $event): Response
    {
        return $this->render('app/pages/events/read.html.twig', [
            'title' => 'Event Anzeigen',
            'event' => $event,
        ]);
    }

    #[Route('/update/{id}', name: 'update', methods: ['GET', 'POST'])]
    public function update(Event $event): Response
    {
        return $this->render('app/pages/events/edit.html.twig', [
            'title' => 'Event Updaten',
            'event' => $event,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_events_index', [], Response::HTTP_SEE_OTHER);
    }
}
