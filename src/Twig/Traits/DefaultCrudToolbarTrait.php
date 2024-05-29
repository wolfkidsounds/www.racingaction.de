<?php

// src/Twig/Traits/DefaultCrudToolbarTrait.php

namespace App\Twig\Traits;

trait DefaultCrudToolbarTrait
{
    public ?string $path = null;
    public ?bool $back = false;
    public ?bool $create = false;
    public ?bool $update = false;
    public ?bool $delete = false;
}
