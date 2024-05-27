<?php

namespace App\Twig\Components\Crud;

use App\Twig\Traits\DefaultCrudToolbarTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Toolbar
{
    use DefaultCrudToolbarTrait;
    public $entity = null;
}
