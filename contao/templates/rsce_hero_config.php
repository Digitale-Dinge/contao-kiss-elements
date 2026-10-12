<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        [
            $translator->trans('rsce.hero.label', [], 'rsce'),
            $translator->trans('rsce.hero.description', [], 'rsce'),
        ],
        'media',
        [
            'types' => ['content'],
            'standardFields' => ['cssID'],
        ]
    )
    ->addGroup('settings', [
        $translator->trans('rsce.group.settings', [], 'rsce'),
    ])
    ->addSelectField('mediaType', ['image', 'video'])
    ->addBackgroundField(['tl_class' => 'w50'])
    ->addImageSizeField()
    ->addGroup('media', [
        $translator->trans('rsce.group.media', [], 'rsce')
    ])
    ->addResponsiveVideoField([], 'mediaType')
    ->addImageField(['mandatory' => false], 'mediaType')
    ->addField('posterSRC', [
        'label' => [
            'Video-Poster (Standbild)',
            'Wird sofort angezeigt, während das Video lädt – verbessert die Ladezeit (LCP). Empfohlen für Video-Heros.',
        ],
        'inputType' => 'fileTree',
        'eval' => [
            'filesOnly' => true,
            'fieldType' => 'radio',
            'extensions' => 'jpg,jpeg,png,webp,avif',
            'tl_class' => 'w50 clr',
        ],
        'dependsOn' => ['field' => 'mediaType', 'value' => 'video'],
    ])
    ->addHeadlineField()
    ->addRichTextField(['mandatory' => false])
    ->addCallToActionField()
    ->build()
;
