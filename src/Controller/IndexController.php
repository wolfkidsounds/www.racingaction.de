<?php

namespace App\Controller;

use App\Repository\EventRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    public function __construct(private EventRepository $eventRepository){}

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $events = $this->eventRepository->findAll();
        $formatedEvents = [];

        foreach ($events as $event) {
            $formatedEvents[] = [
                'id'=> $event->getId(),
                'title'=> $event->getTitle(),
                'start'=> $event->getStartAt()->format('Y-m-d H:m'),
                'end'=> $event->getEndAt()->format('Y-m-d H:m'),

            ];
        }

        
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
            'events'=> $formatedEvents
        ]);
    }
}
