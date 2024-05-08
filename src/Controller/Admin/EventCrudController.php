<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/events', name: 'admin_events_')]
class EventCrudController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('admin/pages/events/index.html.twig', [
            'page_title' => 'Events',
            'events' => $eventRepository->findAll(),
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('admin_events_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/pages/events/create.html.twig', [
            'page_title' => 'Create Event',
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/read/{id}', name: 'read', methods: ['GET'])]
    public function read(Event $event): Response
    {
        return $this->render('admin/pages/events/read.html.twig', [
            'page_title' => 'Show',
            'event' => $event,
        ]);
    }

    #[Route('/update/{id}', name: 'update', methods: ['GET', 'POST'])]
    public function edit(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_events_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/pages/events/update.html.twig', [
            'page_title' => 'Update',
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_events_index', [], Response::HTTP_SEE_OTHER);
    }
}
