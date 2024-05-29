<?php // src/Twig/Components/Event/Read.php

namespace App\Twig\Components\Event;

use App\Entity\Event;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent]
final class Read
{
    use DefaultActionTrait;

    public ?Event $event = null;
    public ?bool $isCrud = false;
}
