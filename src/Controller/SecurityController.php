<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/', name: 'auth_')]
class SecurityController extends AbstractController
{
    /**
     * Login.
     *
     * Auf dieser Seite können sich nutzer anmelden.
     * Wenn das Formular dieser Route abgeschickt wird,
     * wird es von der Firewall abgefangen.
     *
     * Route: auth_login
     */
    #[Route(path: '/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * Logout.
     *
     * Diese Route wird direkt von der Firewall abgefangen.
     * Der Nutzer wird direkt ausgelogged.
     *
     * Route: auth_logout
     */
    #[Route(path: '/logout', name: 'logout')]
    public function logout(): void
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
