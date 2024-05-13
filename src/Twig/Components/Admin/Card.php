<?php

namespace App\Twig\Components\Admin;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Card
{
    public ?array $item = [];

    public ?string $style = 'primary';
}
