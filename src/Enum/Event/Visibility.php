<?php // src/Enum/Event/Visibility.php
namespace App\Enum\Event;

enum Visibility: string
{
    case PRIVATE = 'PRIVATE';
    case PUBLIC = 'PUBLIC';
    case UNLISTED = 'UNLISTED';
}