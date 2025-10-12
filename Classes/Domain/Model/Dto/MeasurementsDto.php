<?php

declare(strict_types=1);

/*
 * This file is part of the package t3docs/bmi-calculator.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace T3docs\BmiCalculator\Domain\Model\Dto;

use TYPO3\CMS\Extbase\Annotation\Validate;

final class MeasurementsDto
{
    // Ensure that the height is in meters, not centimeters
    #[Validate(['validator' => 'NotEmpty'])]
    #[Validate([
        'validator' => 'NumberRange',
        'options' => ['minimum' => 0.5, 'maximum' => 2.5],
    ])]
    private float $height;
    #[Validate(['validator' => 'NotEmpty'])]
    private int $weight;

    public function __construct(?float $height = 0, ?int $weight = 0)
    {
        $this->height = $height ?? 0;
        $this->weight = $weight ?? 0;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function serialize(): string
    {
        return json_encode(
            [
                'height' => $this->height,
                'weight' => $this->weight,
            ]
        );
    }

    public static function deserialize(string $sessionData): self
    {
        $data = json_decode($sessionData);
        if (!is_object($data) || !isset($data->height) || !isset($data->weight)) {
            print_r($data);
            throw new \RuntimeException('Deserialization failed: ' . $sessionData);
        }
        return new self(
            height: (float)$data->height,
            weight: (int)$data->weight,
        );
    }
}
