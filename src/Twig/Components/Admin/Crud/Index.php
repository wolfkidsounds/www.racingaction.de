<?php

namespace App\Twig\Components\Admin\Crud;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Index
{
    public ?string $path;
    public ?array $entities;
    public ?bool $selector = false;
    public ?array $actions = null;
    public ?array $properties = null;
}
