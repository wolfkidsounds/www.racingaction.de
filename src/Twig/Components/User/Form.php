<?php

namespace App\Twig\Components\User;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Form
{
    use DefaultActionTrait;
}
