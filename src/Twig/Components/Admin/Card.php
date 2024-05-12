<?php

namespace App\Twig\Components\Admin;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Card
{
    /**
     * Undocumented variable
     * ? für kann auch leer sein
     * typ: array
     * name: $items
     * wert: null
     *
     * @var array|null
     */
    public ?array $item = [];

    public ?string $style = 'primary';
}
