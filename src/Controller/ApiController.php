<?php

/**
 * API Controller
 * 
 * Der API Controller ist ein 'versteckter' controller.
 * Anfrage gehen an die Route "_api".
 */

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
    /**
     * Kalender-Feed
     * 
     * FullCalendar.js fragt über diese Adresse die Events aus der API ab.
     *
     * @param Request $request // anfrage aus der wir dann die Parameter Sammeln können
     * @param EventRepository $repository // Repository unter dem alle events gespeichert sind
     * @return Response // eine JSON Response als "Feed"
     */
    #[Route('/calendar/feed', name: 'calendar_feed')]
    public function calendar_feed(Request $request, EventRepository $repository): Response
    {
        $start = new DateTime($request->get('start'));
        $end = new DateTime($request->get('end'));
        $events = $repository->findBetweenDates($start, $end);

        // Da FullCalendar.js die events in einem bestimmten format benötigt, müssen wir ein "re-mapping" machen.
        // Also $events -> $mappedEvents wo die Werte so heißen, wie FullCalendar.js sie erwartet.
        // Mehr Informationen: https://fullcalendar.io/docs/event-object
        $transformedEvents = array_map(function($event) {
            return [
                'id' => $event->getId(), // bleibt
                'title' => $event->getName(), // name -> title
                //'type' => $event->getType(),
                //'location' => $event->getLocation(),
                'start' => $event->getDateStart()->format(DateTime::ATOM), // dateStart -> start + Konvertieren zu DateTime Objekt
                'end' => $event->getDateEnd()->format(DateTime::ATOM), // dateEnd -> end + Konvertieren zu DateTime Objekt
                //'priceVisitor' => $event->getPriceVisitor(),
                //'priceRider' => $event->getPriceRider(),
                //'dateTimeStartVisitor' => $event->getDateTimeStartVisitor() ? $event->getDateTimeStartVisitor()->format(DateTime::ATOM) : null,
                //'dateTimeArrival' => $event->getDateTimeArrival() ? $event->getDateTimeArrival()->format(DateTime::ATOM) : null,
                //'dateTimeRidersBreefing' => $event->getDateTimeRidersBreefing() ? $event->getDateTimeRidersBreefing()->format(DateTime::ATOM) : null,
                //'dateTimeDeparture' => $event->getDateTimeDeparture() ? $event->getDateTimeDeparture()->format(DateTime::ATOM) : null,
                //'classes' => $event->getClasses(),
                //'registration' => $event->getRegistration(),
                //'links' => $event->getLinks(),
                //'description' => $event->getDescription(),
                'url' => $this->generateUrl('public_events_read', ['id' => $event->getId()]), // url -> generierte URL zum besuchen des events.
            ];
        }, $events);

        return $this->json($transformedEvents); // Wir schicken JSON zurück!
    }
}
