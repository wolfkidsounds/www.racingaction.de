<?php

namespace App\Controller\Api;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/events', name: 'api_events_')]
final class ApiEventController extends AbstractController
{
    public function __construct(private EventRepository $eventRepository)
    {
    }

    #[Route('/', name: 'collection')]
    public function collection(): Response
    {
        $events = $this->eventRepository->findAll();
        $formatedEvents = [];

        foreach ($events as $event) {
            $formatedEvents[] = [
                'id'=> $event->getId(),
                'title'=> $event->getTitle(),
                'start'=> $event->getStartAt()->format('Y-m-d H:m'),
                'end'=> $event->getEndAt()->format('Y-m-d H:m'),
                'location'=> $event->getLocation(),
                'description'=> $event->getDescription(),
            ];
        }

        return $this->json($formatedEvents);
    }
}