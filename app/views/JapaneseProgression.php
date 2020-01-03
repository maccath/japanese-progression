<?php

namespace App\Views;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class JapaneseProgression extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('percentage', [$this, 'percentage']),
        ];
    }

    /**
     * Calculate the percentage of $total that $amount is.
     *
     * @param int $amount
     * @param int $total
     *
     * @return float
     */
    public function percentage(int $amount, int $total): float
    {
        return 100 / $total * $amount;
    }
}
