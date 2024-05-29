<?php // src/Enum/Event/Status.php
namespace App\Enum\Event;

enum Status: string
{
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case POSTPONED = 'POSTPONED';
    case CANCELLED = 'CANCELLED';
}