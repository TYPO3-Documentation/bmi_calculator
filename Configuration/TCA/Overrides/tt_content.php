<?php

declare(strict_types=1);
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'BmiCalculator',
    'BmiCalculator',
    'BMI Calculator',
    'ext-bmi-calculator-plugin',
    'plugins',
    '',
);
