<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class EventLink
{
    public string $url;
    public int $size = 32;
    public bool $withIcon = true;

    public function getDomain(): string
    {
        if (!$this->url) {
            return '';
        }

        if (!str_starts_with($this->url, 'http')) {
            $this->url = 'https://' . $this->url;
        }

        $host = parse_url($this->url, PHP_URL_HOST);

        if (!$host) {
            return '';
        }

        // Entfernt www.
        return preg_replace('/^www\./', '', $host);
    }

    public function getIconUrl(): string
    {
        if (!$this->getDomain()) {
            return '';
        }

        return sprintf(
            'https://www.google.com/s2/favicons?domain=%s&sz=%d',
            $this->getDomain(),
            $this->size
        );
    }
}