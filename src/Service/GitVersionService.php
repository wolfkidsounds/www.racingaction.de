<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class GitVersionService
{
    public function __construct(private ParameterBagInterface $params)
    {
    }

    public function getVersion(): string
    {
        $command = sprintf('cd %s && git describe --tags', escapeshellarg($this->params->get('kernel.project_dir')));

        return shell_exec($command) ?? 'dev';
    }
}
