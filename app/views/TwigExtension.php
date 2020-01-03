<?php

namespace App\Views;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('progressColour', [$this, 'progressColour']),
            new TwigFunction('percentage', [$this, 'percentage']),
        ];
    }

    /**
     * Change the progress bar colour depending on the percentage total
     *
     * @param float $percentage
     *
     * @return string
     */
    public function progressColour(float $percentage): string
    {
        if ($percentage < 33) {
            return 'danger';
        }

        if ($percentage < 66) {
            return 'warning';
        }

        return 'success';
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
