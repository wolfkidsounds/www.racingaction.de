<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

#[Route('/', name: 'auth_')]
class SecurityController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }
    
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
        noty()->success('Du wurdest erfolgreich abgemeldet.');
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * Registrieren
     * 
     * Diese Route wird benutzt um einen neuen nutzer zu registrieren.
     *
     * @param Request $request
     * @param UserPasswordHasherInterface $userPasswordHasher
     * @param Security $security
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, Security $security, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('registration@racingaction.de', 'Racing Action'))
                    ->to($user->getEmail())
                    ->subject('Confirm Email Address')
                    ->htmlTemplate('security/confirmation_email.html.twig')
            );

            noty()->success('Du hast dich erfolgreich registriert.');
            noty()->warning('Bitter verifiziere deine Email Adresse.');
            return $security->login($user, 'form_login', 'main');
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/verify/email', name: 'verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
    {
        $id = $request->query->get('id');

        if (null === $id) {
            noty()->error('Leider konnten wir deinen Account nicht verifizieren.');
            return $this->redirectToRoute('auth_register');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            noty()->error('Leider konnten wir deinen Account nicht verifizieren.');
            return $this->redirectToRoute('auth_register');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            //$this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));
            noty()->error($translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('auth_register');
        }

        noty()->success('Dein Account wurde verifiziert.');
        //$this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_index');
    }
}
