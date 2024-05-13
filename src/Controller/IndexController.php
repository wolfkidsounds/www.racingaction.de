<?php

// src/Controller/IndexController.php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'public_')]
class IndexController extends AbstractController
{
    /**
     * Übersichts-Seite (Frontpage).
     *
     * Diese Seite ist die erste, die man sieht.
     * Besucher können hier einen Kalender sehen (?)
     *
     * Sichtbarkeit: Öffentlich
     * Route: public_index
     *
     * TODO
     */
    #[Route('/', name: 'index')]
    public function index(EventRepository $repository): Response
    {
        $events = $repository->findAll();

        return $this->render('public/pages/index.html.twig', [
            'events' => $events,
        ]);
    }

    /**
     * Tracks.
     *
     * Anzahl: Mehrere
     * Sichtbarkeit: Öffentlich
     * Route: public_tracks
     *
     * TODO
     */
    #[Route('/tracks', name: 'tracks')]
    public function tracks(): Response
    {
        // TODO: $tracks = $repository->findAll();

        return $this->render('public/pages/tracks.html.twig', [
            // 'tracks' => $tracks,
        ]);
    }

    /**
     * Organizer.
     *
     * Anzahl: Mehrere
     * Sichtbarkeit: Öffentlich
     * Route: public_organizers
     *
     * TODO
     */
    #[Route('/organizers', name: 'organizers')]
    public function organizers(): Response
    {
        // $organizers = $repository->findAll();

        return $this->render('public/pages/organizers.html.twig', [
            // 'organizers' => $organizers,
        ]);
    }

    /**
     * Brands.
     *
     * Anzahl: Mehrere
     * Sichtbarkeit: Öffentlich
     * Route: public_brands
     *
     * TODO
     */
    #[Route('/brands', name: 'brands')]
    public function brands(): Response
    {
        // $brands = $repository->findAll();

        return $this->render('public/pages/brands.html.twig', [
            // 'brands' => $brands,
        ]);
    }

    /**
     * Rider (Übersicht?).
     *
     * JJ: Ja, Daten nach Öffentlichkeitsstatus.
     * Wenn Rider (privat) ausgewählt,
     * dann wird er in der Liste mit "FAHRER" angezeigt
     *
     * Anzahl: Mehrere
     * Sichtbarkeit: Öffentlich
     * Route: public_rider
     *
     * aktuell 'singular' route
     *
     * TODO
     */
    #[Route('/rider', name: 'rider')]
    public function rider(): Response
    {
        // TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/pages/rider.html.twig)?
        // einzahl oder mehrzahl? (riders -> viele)

        // $riders = $repository->findBy('Status', RiderStatus::PUBLIC);

        return $this->render('public/pages/user/rider/index.html.twig', [
            // 'riders' => $riders,
        ]);
    }

    /**
     * Events (Übersicht?).
     *
     * Anzahl: Mehrere
     * Sichtbarkeit: Öffentlich
     * Route: public_events
     *
     * TODO
     */
    #[Route('/events', name: 'events')]
    public function event(): Response
    {
        // TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (public/pages/event.html.twig)?
        // einzahl oder mehrzahl? (evnts -> viele)

        // $events = $repository->findBy('Status', EventStatus::PUBLIC);
        return $this->render('public/pages/calendar/event/index.html.twig', [
            // 'events' => $events,
        ]);
    }

    /**
     * About.
     *
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * Route: public_about
     *
     * TODO
     */
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('public/pages/about.html.twig');
    }

    /**
     * Impressum.
     *
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * Route: public_imprint
     */
    #[Route('/imprint', name: 'imprint')]
    public function imprint(): Response
    {
        return $this->render('public/pages/imprint.html.twig');
    }

    /**
     * Datenschutz.
     *
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * Route: public_privacy
     *
     * TODO:
     */
    #[Route('/privacy', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('public/pages/privacy.html.twig');
    }

    /**
     * Arbeiten
     * 
     * Eine Temporäre Seite auf der gezeigt wird, dass die Inhalte aktuell noch nicht verfügbar sind.
     * 
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * Route: public_arbeiten
     * 
     */
    #[Route('/arbeiten', name: 'arbeiten')]
    public function arbeiten(): Response
    {
        return $this->render('public/pages/arbeiten.html.twig');
    }
}
