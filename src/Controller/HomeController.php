<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_home_routines');
    }

    #[Route('/routines', name: 'app_home_routines')]
    public function routines(): Response
    {
        return $this->render('home/routines.html.twig');
    }

    #[Route('/colors', name: 'app_home_colors')]
    public function colors(): Response
    {
        return $this->render('home/colors.html.twig');
    }

    #[Route('/aspirations', name: 'app_home_aspirations')]
    public function aspirations(): Response
    {
        return $this->render('home/aspirations.html.twig');
    }
}
