<?php

namespace App\Controller;

use App\Routine\Routine;
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
        $routines = [
            new Routine("Morning routine",
                ['Brush Teeth', 'Drink Water', 'Water Plants', 'Exercise', 'Breakfast', 'Wash Dishes']),
            new Routine("Day routine", ['Work', 'Eat', 'Work', 'Stretch', 'Eat', 'Work', 'Read']),
            new Routine("Afternoon routine",
                ['Read emails', 'Study', 'Walk', 'Assign priorities', 'chores', 'shopping', 'cooking']),
            new Routine("Sleeping routine", ['turn of screens', 'brush teeth']),
        ];
        return $this->render('home/routines.html.twig',
            ['routines' => $routines]);
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
