<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        [
            $translator->trans('rsce.history_item_list.label', [], 'rsce'),
            $translator->trans('rsce.history_item_list.description', [], 'rsce'),
        ],
        'texts',
        [
            'types' => ['content'],
            'standardFields' => ['headline', 'topline', 'cssID'],
        ]
    )
    ->addGroup('settings', [$translator->trans('rsce.group.settings', [], 'rsce')])
    ->addImageSizeField()
    ->startList()
        ->addImageField()
        ->addToplineField()
        ->addHeadlineField()
        ->addRichTextField(['mandatory' => false])
        ->addField('year', [
            'label' => [
                $translator->trans('rsce.history_item_list.field.year.label', [], 'rsce'),
                $translator->trans('rsce.history_item_list.field.year.description', [], 'rsce'),
            ],
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50'],
        ])
    ->endList()
    ->build()
;
