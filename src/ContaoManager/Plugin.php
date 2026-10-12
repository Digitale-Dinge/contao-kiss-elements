<?php

declare(strict_types=1);

namespace DigitaleDinge\ContaoKissElements\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use DigitaleDinge\ContaoKiss\DigitaleDingeContaoKissBundle;
use DigitaleDinge\ContaoKissElements\DigitaleDingeContaoKissElementsBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            new BundleConfig(DigitaleDingeContaoKissElementsBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    DigitaleDingeContaoKissBundle::class,
                ]),
        ];
    }
}
