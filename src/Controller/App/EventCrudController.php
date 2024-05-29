<?php

// src/Controller/App/EventCrudController.php

namespace App\Controller\App;

use App\Entity\Event;
use Spatie\CalendarLinks\Generators\Ics;
use Spatie\CalendarLinks\Link;
use App\Form\App\EventFormType;
use App\Form\Event\CreateEventFormType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/app/events', name: 'app_events_')]
class EventCrudController extends AbstractController
{
    /**
     * Alle Events (Index)
     *
     * @param EventRepository $eventRepository
     * @return Response
     */
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('app/pages/events/index.html.twig', [
            'title' => 'Meine Events',
            'events' => $eventRepository->findAll(),
        ]);
    }

    /**
     * Event erstellen (Create)
     *
     * @return Response
     */
    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $event = new Event();
        // TODO: $event->setOwner($this->getUser());

        if (empty($event->getLocation())) {
            $event->setLocation([
                [
                    'name' => '', 
                    'address' => '', 
                    'url' => '', 
                    'description' => '',
                ]
            ]);
        }

        $form = $this->createForm(CreateEventFormType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('app_events_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/pages/events/create.html.twig', [
            'form' => $form,
            'event' => $event,
            'title' => 'Event erstellen',
        ]);
    }

    /**
     * Ein einzelnes Event ansehen (Read)
     * 
     * @return Response
     */
    #[Route('/read/{id}', name: 'read', methods: ['GET'])]
    public function read(Event $event): Response
    {
        return $this->render('app/pages/events/read.html.twig', [
            'title' => 'Event Anzeigen',
            'event' => $event,
        ]);
    }

    /**
     * Ein einzelnes Event ansehen (Read)
     * 
     * @return Response
     */
    #[Route('/read/{id}/public', name: 'read_public', methods: ['GET'])]
    public function read_public(int $id): Response
    {
        return $this->redirectToRoute('public_events_read', [
            'id' => $id,
        ]);
    }


    /**
     * Ein einzelnes Event Aktualisieren/Ändern (update)
     * 
     * @return Response
     */
    #[Route('/update/{id}', name: 'update', methods: ['GET', 'POST'])]
    public function update(Event $event): Response
    {
        return $this->render('app/pages/events/update.html.twig', [
            'title' => 'Event Updaten',
            'event' => $event,
        ]);
    }

    /**
     * Ein Event Exportieren
     * 
     * @param string $format -> Das Format in dem der Export zurück gegeben wird.
     * @param Event $event -> Das Event, dass exportiert werden soll.
     * @return Response
     */
    #[Route('/export/{format}/{id}', name: 'export', methods: ['GET', 'POST'])]
    public function export(?string $format, Event $event): Response
    {
        $link = new Link($event->getName(), $event->getDateStart(), $event->getDateEnd());
        $location = $event->getLocation();
        $link->address($location["address"]);
        $link->description($event->getDescription());

        if ($format = 'google') {
            return $this->redirect($link->google());
        }

        if ($format = 'yahoo') {
            return $this->redirect($link->yahoo());
        }

        if ($format = 'outlook') {
            return $this->redirect($link->webOutlook());
        }

        if ($format = 'office') {
            return $this->redirect($link->webOffice());
        }

        if ($format == 'ics') {
            $ics = $link->ics([], ['format' => 'file']);

            $response = new Response($ics);
            $response->headers->set('Content-Type', 'text/calendar');
            $response->headers->set('Content-Disposition', 'attachment; filename="event.ics"');
            return $response;
        }

        return $this->file($link->google());
    }

    /**
     * Ein Event löschen (delete)
     * 
     * @return Response
     */
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
