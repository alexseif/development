<?php

namespace App\Controller;

use App\Routine\Workday;
use DateTime;
use DateTimeZone;
use Recurr\Rule;
use Recurr\Transformer\ArrayTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoutineBuilderController extends AbstractController
{
    #[Route('/routine', name: 'app_routine')]
    public function index(): Response
    {
        $workday = new Workday();
        return $this->render('routine/index.html.twig', [
            'workday' => $workday
        ]);
    }

    #[Route('/routine/sample', name: 'app_routine_sample')]
    public function sample(): Response
    {
        $timezone = 'Africa/Cairo';
        $startDate = new DateTime('2021-07-11 08:00:00', new DateTimeZone($timezone));
        $endDate = new DateTime('2021-08-11 20:00:00', new DateTimeZone($timezone)); // Optional
        $rule = (new Rule())
            ->setTimezone($timezone)
            ->setStartDate($startDate)
            ->setEndDate($endDate)
            ->setFreq('DAILY')
            ->setByDay(['SU', 'MO', 'TU', 'WE', 'TH'])
            ->setUntil($endDate)
            ->setByHour(range(7, 18));
        $wakeUpRule = (new Rule())
//            ->setTimezone($timezone)
//            ->setStartDate($startDate)
//            ->setEndDate($endDate)
//            ->setUntil($endDate)
            ->setFreq('DAILY')
            ->setByDay(['SU', 'MO', 'TU', 'WE', 'TH'])
            ->setByHour([6]);
        $transformer = new ArrayTransformer();
        $transformed = $transformer->transform($rule);
        dump($transformed);
        $wakeUpSchedule = $transformer->transform($wakeUpRule);
        dump($wakeUpSchedule);
        return $this->render('routine/sample.html.twig', [
            'wakeUpSchedule' => $wakeUpSchedule
        ]);
    }
}
