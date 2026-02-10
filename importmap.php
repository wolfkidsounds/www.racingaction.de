<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@fortawesome/fontawesome-free/css/all.min.css' => [
        'version' => '7.0.0',
        'type' => 'css',
    ],
    '@tabler/icons-webfont/dist/tabler-icons.min.css' => [
        'version' => '3.36.1',
        'type' => 'css',
    ],
    'bootstrap' => [
        'version' => '5.3.6',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    'tom-select/dist/css/tom-select.default.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    'tom-select/dist/css/tom-select.bootstrap5.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    'tom-select/dist/css/tom-select.bootstrap4.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    'tom-select' => [
        'version' => '2.4.5',
    ],
    '@orchidjs/sifter' => [
        'version' => '1.1.0',
    ],
    '@orchidjs/unicode-variants' => [
        'version' => '1.1.2',
    ],
    'tom-select/dist/css/tom-select.default.min.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    '@schedule-x/calendar' => [
        'version' => '4.1.0',
    ],
    '@schedule-x/theme-default/dist/index.css' => [
        'version' => '4.1.0',
        'type' => 'css',
    ],
    'temporal-polyfill/global' => [
        'version' => '0.3.0',
    ],
    '@fortawesome/fontawesome-free/css/all.css' => [
        'version' => '7.1.0',
        'type' => 'css',
    ],
    'preact' => [
        'version' => '10.28.2',
    ],
    'preact/jsx-runtime' => [
        'version' => '10.28.2',
    ],
    'preact/hooks' => [
        'version' => '10.28.2',
    ],
    'preact/compat' => [
        'version' => '10.28.2',
    ],
    '@preact/signals' => [
        'version' => '2.5.1',
    ],
    '@preact/signals-core' => [
        'version' => '1.12.1',
    ],
];
