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
        'version' => '3.34.0',
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
    '@fullcalendar/core' => [
        'version' => '6.1.20',
    ],
    'preact' => [
        'version' => '10.28.2',
    ],
    'preact/compat' => [
        'version' => '10.28.2',
    ],
    'preact/hooks' => [
        'version' => '10.28.2',
    ],
    '@fullcalendar/daygrid' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/core/index.js' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/core/internal.js' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/core/preact.js' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/timegrid' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/daygrid/internal.js' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/list' => [
        'version' => '6.1.20',
    ],
    '@fullcalendar/interaction' => [
        'version' => '6.1.20',
    ],
    '@calendarjs/ce' => [
        'version' => '1.0.6',
    ],
    'lemonadejs' => [
        'version' => '5.3.3',
    ],
    '@calendarjs/ce/dist/style.css' => [
        'version' => '1.0.6',
        'type' => 'css',
    ],
    '@fullcalendar/bootstrap5' => [
        'version' => '6.1.20',
    ],
    '@schedule-x/calendar' => [
        'version' => '4.1.0',
    ],
    'preact/jsx-runtime' => [
        'version' => '10.28.2',
    ],
    '@preact/signals' => [
        'version' => '2.5.1',
    ],
    '@preact/signals-core' => [
        'version' => '1.12.1',
    ],
    '@schedule-x/theme-default/dist/index.css' => [
        'version' => '4.1.0',
        'type' => 'css',
    ],
    'temporal-polyfill/global' => [
        'version' => '0.3.0',
    ],
];
