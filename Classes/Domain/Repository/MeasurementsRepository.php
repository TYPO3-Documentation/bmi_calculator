<?php

declare(strict_types=1);

/*
 * This file is part of the package t3docs/bmi-calculator.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace T3docs\BmiCalculator\Domain\Repository;

use T3docs\BmiCalculator\Domain\Model\Measurements;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Measurements>
 */
final class MeasurementsRepository extends Repository {}
