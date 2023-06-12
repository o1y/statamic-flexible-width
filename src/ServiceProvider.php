<?php

namespace O1y\StatamicFlexibleWidth;

use O1y\StatamicFlexibleWidth\Fieldtypes\FlexibleWidth;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $vite = [
        'input' => [
            'resources/js/addon.js',
        ],
        'publicDirectory' => 'dist',
    ];

    protected $fieldtypes = [
        FlexibleWidth::class,
    ];
}
