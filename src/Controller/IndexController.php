<?php // src/Controller/IndexController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name:'public_')]
class IndexController extends AbstractController
{
    /**
     * Übersichts-Seite (Frontpage)
     * 
     * Diese Seite ist die erste, die man sieht.
     * Besucher können hier einen Kalender sehen (?)
     * 
     * Sichtbarkeit: Öffentlich
     *
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        //TODO: Kalender in das Template schicken
        return $this->render('public/index.html.twig', [
            'controller_name' => 'IndexController',
            // 'calender' => $calendar,
        ]);
    }

    /**
     * Organizer (Übersicht?)
     * 
     * Sichtbarkeit: Öffentlich
     *
     * @return Response
     */
    #[Route('/organizer', name: 'organizer')]
    public function organizer(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/organizer.html.twig)?
        // einzahl oder mehrzahl? (organizers -> viele)
        return $this->render('seiten/user/organizer/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * Rider (Übersicht?)
     * 
     * Sichtbarkeit: Öffentlich
     *
     * @return Response
     */
    #[Route('/rider', name: 'rider')]
    public function rider(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/rider.html.twig)?
        // einzahl oder mehrzahl? (riders -> viele)
        return $this->render('seiten/user/rider/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * Event (Übersicht?)
     * 
     * Sichtbarkeit: Öffentlich
     *
     * @return Response
     */
    #[Route('/event', name: 'event')]
    public function event(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/event.html.twig)?
        // einzahl oder mehrzahl? (evnts -> viele)
        return $this->render('seiten/calendar/event/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}