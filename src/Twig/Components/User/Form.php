<?php

namespace App\Twig\Components\User;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsLiveComponent]
final class Form extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $password = null;

    public function save(UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();

        $user->setPassword($passwordHasher->hashPassword($user, $this->password));

        return $this->redirectToRoute('/'); //TODO: Bitte als redirect auf einen controller

    }
}

