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
     * Status: Template
     *
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // $events = $repository->findAll();

        //TODO: Kalender in das Template schicken
        return $this->render('public/index.html.twig', [
            // 'events' => $events,
        ]);
    }

    /**
     * Tracks
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * Status: Template
     *
     * @return Response
     */
    #[Route('/tracks', name: 'tracks')]
    public function tracks(): Response
    {
        //TODO: $tracks = $repository->findAll();

        return $this->render('public/tracks.html.twig', [
            // 'tracks' => $tracks,
        ]);
    }

    /**
     * Organizer
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * Status: Template
     *
     * @return Response
     */
    #[Route('/organizers', name: 'organizers')]
    public function organizers(): Response
    {
        // $organizers = $repository->findAll();

        return $this->render('public/organizers.html.twig', [
            // 'organizers' => $organizers,
        ]);
    }

    /**
     * Brands
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * Status: Template
     *
     * @return Response
     */
    #[Route('/brands', name: 'brands')]
    public function brands(): Response
    {
        // $brands = $repository->findAll();

        return $this->render('public/brands.html.twig', [
            // 'brands' => $brands,
        ]);
    }

    /**
     * Rider (Übersicht?) 
     * 
     * JJ: Ja, Daten nach Öffentlichkeitsstatus.
     * Wenn Rider (privat) ausgewählt, 
     * dann wird er in der Liste mit "FAHRER" angezeigt
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * Status: TODO:
     *
     * @return Response
     */
    #[Route('/rider', name: 'rider')]
    public function rider(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/rider.html.twig)?
        // einzahl oder mehrzahl? (riders -> viele)

        // $riders = $repository->findBy('Status', RiderStatus::PUBLIC);

        return $this->render('seiten/user/rider/index.html.twig', [
            // 'riders' => $riders,
        ]);
    }

    /**
     * Event (Übersicht?)
     * 
     * Sichtbarkeit: Öffentlich
     * Status: TODO:
     *
     * @return Response
     */
    #[Route('/events', name: 'events')]
    public function event(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/event.html.twig)?
        // einzahl oder mehrzahl? (evnts -> viele)

        // $events = $repository->findBy('Status', EventStatus::PUBLIC);
        return $this->render('seiten/calendar/event/index.html.twig', [
            // 'events' => $events,
        ]);
    }

    /**
     * About
     * 
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * Status: Template
     *
     * @return Response
     */
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('public/about.html.twig');
    }
}