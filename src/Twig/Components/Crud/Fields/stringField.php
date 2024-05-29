<?php // src/Twig/Components/Crud/Fields/stringField.php

namespace App\Twig\Components\Crud\Fields;

use App\Twig\Traits\DefaultCrudFieldTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class stringField
{
    use DefaultCrudFieldTrait;
}