<?php

namespace O1y\StatamicFlexibleWidth;

use O1y\StatamicFlexibleWidth\Fieldtypes\FlexibleWidth;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $vite = [
        'publicDirectory' => 'dist',
        'hotFile' => 'vendor/statamic-flexible-width/hot',
        'input' => [
            'resources/js/addon.js',
        ],
    ];

    protected $fieldtypes = [
        FlexibleWidth::class,
    ];
}
