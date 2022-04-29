<?php

namespace App\Controller;

use App\Calendar\UI\Month;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalenderController extends AbstractController
{
    #[Route('/calender', name: 'app_calender_home')]
    public function index(): Response
    {
        $monthUI = new Month(new DateTime());
        return $this->render('calender/index.html.twig', [
            'month_ui' => $monthUI
        ]);
    }
}
