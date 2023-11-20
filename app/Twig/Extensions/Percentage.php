<?php

namespace App\Twig\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

class Percentage extends AbstractExtension implements ExtensionInterface
{
    public function getFunctions(): array
    {
        return [
            'percentage' => new TwigFunction(
                'percentage',
                fn (int $amount, int $total): int => ceil(100 / $total * $amount),
            ),
        ];
    }
}
