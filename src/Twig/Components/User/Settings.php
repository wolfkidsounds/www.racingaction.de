<?php

namespace App\Twig\Components\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsLiveComponent]
final class Settings extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $theme;

    #[LiveProp(writable: true)]
    public ?string $locale;

    #[ExposeInTemplate()]
    public function getTheme(): string
    {
        /** @var User $user */
        $user = $this->getUser();
        return $user->getTheme();
    }

    #[ExposeInTemplate()]
    public function getLocale(): string
    {
        /** @var User $user */
        $user = $this->getUser();
        return $user->getLocale();
    }

    #[LiveAction]
    public function saveTheme(EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $user->setTheme($this->theme);
        $em->persist($user);
        $em->flush();

        noty()->success('Your theme settings have been saved.');
        return $this->redirectToRoute('app_user_settings');
    }

    #[LiveAction]
    public function saveLocale(EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $user->setLocale($this->locale);
        $em->persist($user);
        $em->flush();

        noty()->success('Your language settings have been saved.');
        return $this->redirectToRoute('app_user_settings');
    }
}

