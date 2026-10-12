<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        [
            $translator->trans('rsce.quote.label', [], 'rsce'),
            $translator->trans('rsce.quote.description', [], 'rsce'),
        ],
        'texts',
        [
            'types' => ['content'],
            'standardFields' => ['cssID'],
        ]
    )
    ->addGroup('settings', [
        $translator->trans('rsce.group.settings', [], 'rsce'),
    ])
    ->addImageSizeField(['tl_class' => 'w50 clr'])
    ->addGroup('quote_group', [
        $translator->trans('rsce.group.quote_group', [], 'rsce'),
    ])
    ->addImageField()
    ->addField('name_position', [
        'inputType' => 'text',
        'label' => [
            $translator->trans('rsce.field.name_position.label', [], 'rsce'),
            $translator->trans('rsce.field.name_position.description', [], 'rsce'),
        ],
        'eval' => ['tl_class' => 'w50 clr'],
    ])
    ->addField('quote_suffix', [
        'inputType' => 'text',
        'label' => [
            $translator->trans('rsce.field.quote_suffix.label', [], 'rsce'),
            $translator->trans('rsce.field.quote_suffix.description', [], 'rsce'),
        ],
        'eval' => ['tl_class' => 'w50'],
    ])
    ->addField('quote', [
        'inputType' => 'textarea',
        'label' => [
            $translator->trans('rsce.field.quote.label', [], 'rsce'),
            $translator->trans('rsce.field.quote.description', [], 'rsce'),
        ],
        'eval' => ['tl_class' => 'w100 clr'],
    ])
    ->build()
;
