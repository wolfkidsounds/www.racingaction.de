<?php

namespace App\Twig\Components\Admin\Crud;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Toolbar
{
    public ?string $path;
    public $entity = null;
    public ?bool $back = false;
    public ?bool $create = false;
    public ?bool $update = false;
    public ?bool $delete = false;
}
