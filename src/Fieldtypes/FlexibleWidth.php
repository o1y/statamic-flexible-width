<?php

namespace O1y\StatamicFlexibleWidth\Fieldtypes;

use Statamic\Fields\Fieldtype;
use Statamic\Fieldtypes\HasSelectOptions;

class FlexibleWidth extends Fieldtype
{
    use HasSelectOptions;

    protected $categories = ['controls'];
    protected $indexComponent = 'tags';
    protected $icon = 'width';

    protected function configFieldItems(): array
    {
        return [
            [
                'display' => __('Options'),
                'fields' => [
                    'options' => [
                        'display' => __('Options'),
                        'instructions' => __('statamic::fieldtypes.select.config.options'),
                        'type' => 'array',
                        'key_header' => __('Key'),
                        'value_header' => __('Label').' ('.__('Optional').')',
                        'add_button' => __('Add Option'),
                        'default' => [
                            '1' => '1/3',
                            '2' => '2/3',
                            '3' => '3/3',
                        ],
                    ],
                    'default' => [
                        'display' => __('Default Value'),
                        'instructions' => __('statamic::messages.fields_default_instructions'),
                        'type' => 'text',
                        'width' => 50,
                    ],
                ],
            ],
        ];
    }
}
