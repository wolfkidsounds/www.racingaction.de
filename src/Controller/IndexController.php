<?php

namespace App\Controller;

use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $events = [
            [
            'id' => 1,
            'title' => 'Coffee with John',
            'start' => '2026-02-09 10:05',
            'end' => '2026-02-09 10:35',
            ]
        ];
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
            'events'=> $events
        ]);
    }
}
