<?php

namespace App\Views;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Japanese Progression';
    }


    public function getFunctions()
    {
        return array(
            new TwigFunction('progressColour', array($this, 'progressColour')),
            new TwigFunction('percentage', array($this, 'percentage')),
        );
    }

    /**
     * Change the progress bar colour depending on the percentage total
     *
     * @param $percentage
     *
     * @return string
     */
    public function progressColour($percentage)
    {
        if ($percentage < 33) {
            return 'danger';
        } else if ($percentage < 66) {
            return 'warning';
        } else {
            return 'success';
        }
    }

    /**
     * Calculate the percentage that $amount occupies of $total
     *
     * @param $amount
     * @param $total
     *
     * @return float
     */
    public function percentage($amount, $total)
    {
        return 100 / $total * $amount;
    }
}
