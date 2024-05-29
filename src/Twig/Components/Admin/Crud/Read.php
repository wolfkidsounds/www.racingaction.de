<?php

namespace App\Twig\Components\Admin\Crud;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Read
{
    public ?string $path;
    public $entity = null;
    public ?array $properties = null;
}
