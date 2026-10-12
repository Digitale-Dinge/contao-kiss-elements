<?php

declare(strict_types=1);

use Contao\System;

$configBuilder = System::getContainer()->get('kiss.rsce_config.builder');
$translator = System::getContainer()->get('translator');

return $configBuilder
    ->create(
        'icon_headline_list',
        'texts',
        [
            'types' => ['content'],
            'standardFields' => ['headline', 'topline', 'cssID'],
        ]
    )
    ->startList()
        ->addIconField()
        ->addHeadlineField()
        ->addToplineField()
        ->addRichTextField(['mandatory' => false])
    ->endList()
    ->addGridGroup()
    ->build()
;
