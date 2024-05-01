<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/users', name: 'admin_users_')]
class UserController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(UserRepository $repository): Response
    {
        return $this->render('admin/pages/users/index.html.twig', [
            'users' => $repository->findAll(),
        ]);
    }
}
