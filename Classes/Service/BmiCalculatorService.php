<?php

declare(strict_types=1);

/*
 * This file is part of the package t3docs/bmi-calculator.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace T3docs\BmiCalculator\Service;

use T3docs\BmiCalculator\Domain\Model\Dto\MeasurementsDto;

class BmiCalculatorService
{
    public function calculate(MeasurementsDto $measurementsDto): float
    {
        $height = $measurementsDto->getHeight(); // height in meters
        $weight = $measurementsDto->getWeight(); // weight in kilograms

        return $weight / ($height ** 2);
    }
}
