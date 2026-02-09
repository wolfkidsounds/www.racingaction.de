<?php

namespace App\Controller\Api;

use App\Service\GitVersionService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/version', name: 'api_version')]
final class ApiVersionController extends AbstractController
{
    public function __construct(private GitVersionService $git)
    {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->json([
            'status' => 'ok',
            'version' => trim($this->git->getVersion()),
        ]);
    }
}