<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{
    public function __construct(private EventRepository $repository){}

    #[Route('/events/{eventId}', name: 'app_events_id')]
    public function index(int $eventId): Response
    {
        $event = $this->repository->find($eventId);

        return $this->render('pages/event.html.twig', [
            'controller_name' => 'EventController',
            'event'=> $event
        ]);
    }
}
