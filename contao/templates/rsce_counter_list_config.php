<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        [
            $translator->trans('rsce.counter_list.label', [], 'rsce'),
            $translator->trans('rsce.counter_list.description', [], 'rsce'),
        ],
        'texts',
        [
            'types' => ['content'],
            'standardFields' => ['headline', 'topline', 'cssID'],
        ]
    )
    ->addGroup('settings', [
        $translator->trans('rsce.group.settings', [], 'rsce'),
    ])
    ->addField('separator', [
        'label' => [
            $translator->trans('rsce.counter_list.field.separator.label', [], 'rsce'),
            $translator->trans('rsce.counter_list.field.separator.description', [], 'rsce'),
        ],
        'inputType' => 'select',
        'options' => [',', '.'],
        'eval' => ['tl_class' => 'w25', 'includeBlankOption' => true],
    ])
    ->addField('duration', [
        'label' => [
            $translator->trans('rsce.counter_list.field.duration.label', [], 'rsce'),
            $translator->trans('rsce.counter_list.field.duration.description', [], 'rsce'),
        ],
        'inputType' => 'text',
        'default' => 2,
        'eval' => ['rgxp' => 'natural', 'maxlength' => 3, 'tl_class' => 'w25'],
    ])
    ->addTextAppearanceField(['tl_class' => 'w25'])
    ->addImageSizeField()
    ->startList()
        ->addSelectField('mode', ['default', 'image', 'icon'])
        ->addImageField([], 'mode')
        ->addIconField([], 'mode')
        ->addField('prefix', [
            'label' => [
                $translator->trans('rsce.counter_list.field.prefix.label', [], 'rsce'),
                $translator->trans('rsce.counter_list.field.prefix.description', [], 'rsce'),
            ],
            'inputType' => 'text',
            'eval' => ['maxlength' => 32, 'tl_class' => 'w25 clr'],
        ])
        ->addField('value', [
            'label' => [
                $translator->trans('rsce.counter_list.field.value.label', [], 'rsce'),
                $translator->trans('rsce.counter_list.field.value.description', [], 'rsce'),
            ],
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'rgxp' => 'natural', 'maxlength' => 12, 'tl_class' => 'w25'],
        ])
        ->addField('suffix', [
            'label' => [
                $translator->trans('rsce.counter_list.field.suffix.label', [], 'rsce'),
                $translator->trans('rsce.counter_list.field.suffix.description', [], 'rsce'),
            ],
            'inputType' => 'text',
            'eval' => ['maxlength' => 32, 'tl_class' => 'w25'],
        ])
        ->addField('label', [
            'label' => [
                $translator->trans('rsce.counter_list.field.label.label', [], 'rsce'),
                $translator->trans('rsce.counter_list.field.label.description', [], 'rsce'),
            ],
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
        ])
    ->endList()
    ->addGridGroup()
    ->build()
;
