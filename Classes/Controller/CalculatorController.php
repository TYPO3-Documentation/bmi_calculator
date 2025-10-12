<?php

declare(strict_types=1);

/*
 * This file is part of the package t3docs/bmi-calculator.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace T3docs\BmiCalculator\Controller;

use Psr\Http\Message\ResponseInterface;
use T3docs\BmiCalculator\Domain\Model\Dto\MeasurementsDto;
use T3docs\BmiCalculator\Domain\Model\Measurements;
use T3docs\BmiCalculator\Domain\Repository\MeasurementsRepository;
use T3docs\BmiCalculator\Service\BmiCalculatorService;
use T3docs\BmiCalculator\Service\UserSessionService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CalculatorController extends ActionController
{
    public function __construct(
        private readonly BmiCalculatorService $bmiCalculatorService,
        private readonly MeasurementsRepository $measurementsRepository,
        private readonly UserSessionService $userSessionService,
    ) {}

    public function formAction(): ResponseInterface
    {
        $defaultValues = $this->userSessionService->loadFromSession($this->request)
            ?? new MeasurementsDto(1.73, 73);
        $this->view->assign('defaultValues', $defaultValues);
        return $this->htmlResponse();
    }
    public function resultAction(MeasurementsDto $measurements): ResponseInterface
    {
        $this->view->assign('measurements', $measurements);
        $this->view->assign(
            'result',
            $this->bmiCalculatorService->calculate($measurements)
        );
        $this->measurementsRepository->add(Measurements::fromMeasurementsDto($measurements));
        $this->userSessionService->storeIntoSession($this->request, $measurements);
        return $this->htmlResponse();
    }
    protected function getErrorFlashMessage(): bool|string
    {
        return 'Check your measurements, height must be in meters not centimeters. ';
    }
}
