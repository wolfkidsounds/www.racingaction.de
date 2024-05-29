<?php // src/Twig/Components/Crud/Fields/dateField.php

namespace App\Twig\Components\Crud\Fields;

use App\Twig\Traits\DefaultCrudFieldTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class dateField
{
    use DefaultCrudFieldTrait;
}