<?php

namespace App\Controller;

use App\Calendar\UI\Month;
use App\Calendar\UI\Week;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    #[Route('/calendar', name: 'app_calendar_home')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_calendar_month');
    }

    #[Route('/calendar/month', name: 'app_calendar_month')]
    public function month(): Response
    {
        $monthUI = new Month(new DateTime());
        return $this->render('calendar/month.html.twig', [
            'month_ui' => $monthUI
        ]);
    }

    #[Route('/calendar/week', name: 'app_calendar_week')]
    public function week(): Response
    {
        $weekUI = new Week(new DateTime());
        return $this->render('calendar/week.html.twig', [
            'week_ui' => $weekUI
        ]);
    }
}
