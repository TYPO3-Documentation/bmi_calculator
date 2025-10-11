<?php

declare(strict_types=1);
use T3docs\BmiCalculator\Controller\CalculatorController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
ExtensionUtility::configurePlugin(
    'BmiCalculator',
    'BmiCalculator',
    [
        CalculatorController::class => 'form,result',
    ],
    [
        CalculatorController::class => 'result',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);
