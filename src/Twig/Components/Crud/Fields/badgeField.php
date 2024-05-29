<?php // src/Twig/Components/Crud/Fields/badgeField.php

namespace App\Twig\Components\Crud\Fields;

use App\Twig\Traits\DefaultCrudFieldTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class badgeField
{
    use DefaultCrudFieldTrait;
}