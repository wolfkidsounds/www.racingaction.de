<?php

// src/Controller/ApiController.php

namespace App\Controller;

use DateTime;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/_api', name: 'api_')]
class ApiController extends AbstractController
{
    
    #[Route('/calendar/feed', name: 'calendar_feed')]
    public function calendar_feed(Request $request, EventRepository $repository): Response
    {
        $start = new DateTime($request->get('start'));
        $end = new DateTime($request->get('end'));

        $events = $repository->findBy([
            'dateStart' => $start,
            'dateEnd' => $end,
        ]);

        return $this->json($events);
    }
}
