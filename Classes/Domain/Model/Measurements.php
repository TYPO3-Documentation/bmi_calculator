<?php

declare(strict_types=1);

/*
 * This file is part of the package t3docs/bmi-calculator.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace T3docs\BmiCalculator\Domain\Model;

use T3docs\BmiCalculator\Domain\Model\Dto\MeasurementsDto;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

final class Measurements extends AbstractEntity
{
    protected int $height = 0;
    protected int $weight = 0;

    public static function fromMeasurementsDto(MeasurementsDto $measurementsDto): self
    {
        $model = new self();
        $model->weight = $measurementsDto->getWeight();
        $model->height = (int)($measurementsDto->getHeight() * 100);
        return $model;
    }
    public function getHeight(): int
    {
        return $this->height;
    }
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }
    public function getWeight(): int
    {
        return $this->weight;
    }
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }
}
