<?php

namespace App\Tests\Twig\Extensions;

use App\Twig\Extensions\Percentage;
use PHPUnit\Framework\TestCase;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

class PercentageTest extends TestCase
{
    public function testIsExtension(): void
    {
        $extension = new Percentage();

        $this->assertInstanceOf(ExtensionInterface::class, $extension);
    }

    public function testHasPercentageFunction(): void
    {
        $extension = new Percentage();
        $functions = $extension->getFunctions();

        $this->assertContainsOnlyInstancesOf(TwigFunction::class, $functions);
        $this->assertInstanceOf(TwigFunction::class, $functions['percentage']);
        $this->assertEquals('percentage', $functions['percentage']->getName());
        $this->assertIsCallable($functions['percentage']->getCallable());
    }

    /**
     * @testWith [50, 100, 50]
     *           [50, 500, 10]
     *           [33, 70, 48]
     */
    public function testPercentageFunction(int $amount, int $total, int $expectedPercentage): void
    {
        $extension = new Percentage();
        $functions = $extension->getFunctions();
        $percentageFunction = $functions['percentage'];

        $this->assertSame($expectedPercentage, $percentageFunction->getCallable()($amount, $total));
    }
}