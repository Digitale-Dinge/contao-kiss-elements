<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        [
            $translator->trans('rsce.team_list.label', [], 'rsce'),
            $translator->trans('rsce.team_list.description', [], 'rsce'),
        ],
        'media',
        [
            'types' => ['content'],
            'standardFields' => ['headline', 'topline', 'cssID'],
        ]
    )
    ->addGroup('settings', [$translator->trans('rsce.group.settings', [], 'rsce')])
    ->addImageSizeField()
    ->addField('company', ['inputType' => 'standardField'])
    ->startList()
        ->addImageField()
        ->addField('title', [
            'inputType' => 'text',
            'label' => [
                $translator->trans('rsce.team_list.field.title.label', [], 'rsce'),
                $translator->trans('rsce.team_list.field.title.description', [], 'rsce'),
            ],
            'eval' => ['tl_class' => 'w50'],
        ])
        ->addField('occupation', [
            'inputType' => 'text',
            'label' => [
                $translator->trans('rsce.team_list.field.occupation.label', [], 'rsce'),
                $translator->trans('rsce.team_list.field.occupation.description', [], 'rsce'),
            ],
            'eval' => ['tl_class' => 'w50'],
        ])
        ->addField('year', [
            'inputType' => 'text',
            'label' => [
                $translator->trans('rsce.team_list.field.year.label', [], 'rsce'),
                $translator->trans('rsce.team_list.field.year.description', [], 'rsce'),
            ],
            'eval' => ['tl_class' => 'w50'],
        ])
        ->addRichTextField(['mandatory' => false])
        ->addEmailField()
        ->addPhoneField()
        ->addSocialsField()
    ->endList()
    ->addGridGroup()
    ->build()
;
