<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        'steps_list',
        'texts',
        [
            'types' => ['content'],
            'standardFields' => ['headline', 'topline', 'cssID'],
        ]
    )
    ->addGroup('settings')
    ->addField('stepsLayout', [
        'label' => true,
        'inputType' => 'radioImage',
        'options' => [
            'vertical' => $translator->trans('rsce.steps_list.field.stepsLayout.options.vertical', [], 'rsce'),
            'horizontal' => $translator->trans('rsce.steps_list.field.stepsLayout.options.horizontal', [], 'rsce'),
        ],
        'eval' => ['imagePath' => 'bundles/digitaledingecontaokisselements/icons/steps_list/layout/', 'tl_class' => 'clr'],
    ])
    ->startList()
        ->addHeadlineField()
        ->addRichTextField()
        ->addTextAppearanceField()
    ->endList()
    ->build()
;
