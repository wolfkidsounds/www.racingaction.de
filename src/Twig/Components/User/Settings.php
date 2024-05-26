<?php

namespace App\Twig\Components\User;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

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
}

