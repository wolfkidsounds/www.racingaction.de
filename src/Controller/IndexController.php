<?php // src/Controller/IndexController.php

namespace App\Controller;

use App\Repository\EventRepository;
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
     * TODO
     *
     * @return Response
     */
    #[Route('/', name: 'index')]
    public function index(EventRepository $repository): Response
    {
        $events = $repository->findAll();

        return $this->render('pages/index.html.twig', [
            'events' => $events,
        ]);
    }

    /**
     * Tracks
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/tracks', name: 'tracks')]
    public function tracks(): Response
    {
        //TODO: $tracks = $repository->findAll();

        return $this->render('pages/tracks.html.twig', [
            // 'tracks' => $tracks,
        ]);
    }

    /**
     * Organizer
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/organizers', name: 'organizers')]
    public function organizers(): Response
    {
        // $organizers = $repository->findAll();

        return $this->render('pages/organizers.html.twig', [
            // 'organizers' => $organizers,
        ]);
    }

    /**
     * Brands
     * 
     * Anzahl: Mehrere (Übersicht)
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/brands', name: 'brands')]
    public function brands(): Response
    {
        // $brands = $repository->findAll();

        return $this->render('pages/brands.html.twig', [
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
     * TODO
     *
     * @return Response
     */
    #[Route('/rider', name: 'rider')]
    public function rider(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (pages/rider.html.twig)?
        // einzahl oder mehrzahl? (riders -> viele)

        // $riders = $repository->findBy('Status', RiderStatus::PUBLIC);

        return $this->render('pages/user/rider/index.html.twig', [
            // 'riders' => $riders,
        ]);
    }

    /**
     * Event (Übersicht?)
     * 
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/events', name: 'events')]
    public function event(): Response
    {
        //TODO: Bestimmen ob das eine Private oder Öffentliche Seite ist?
        // entsprechends template wählen (pages/event.html.twig)?
        // einzahl oder mehrzahl? (evnts -> viele)

        // $events = $repository->findBy('Status', EventStatus::PUBLIC);
        return $this->render('pages/calendar/event/index.html.twig', [
            // 'events' => $events,
        ]);
    }

    /**
     * About
     * 
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig');
    }

    /**
     * Impressum
     * 
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     *
     * @return Response
     */
    #[Route('/imprint', name: 'imprint')]
    public function imprint(): Response
    {
        return $this->render('pages/imprint.html.twig');
    }

    /**
     * Datenschutz
     * 
     * Anzahl: /
     * Sichtbarkeit: Öffentlich
     * TODO
     *
     * @return Response
     */
    #[Route('/privacy', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('pages/privacy.html.twig');
    }
}