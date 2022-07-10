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
        $topics = [
            'Physical' => [
                'Fix Shoulder',
                'Phlebologist'
            ],
            'Psychological' => [
                'Read',
                'Socialize'
            ],
            'Bank' => [
                'Work hard',
                'FSN',
                'Boutique'

            ],
            'Social' => [
                'Go out',
                'Connect with friends'
            ],
        ];
        return $this->render('home/home.html.twig', [
            'topics' => $topics,
        ]);
    }

    #[Route('/marslow', name: 'app_home_marslow')]
    public function marslow(): Response
    {
        $maslow = [
            'Physiological Needs' => [
                'Air',
                'Heat',
                'Clothes',
                'Hygiene',
                'Light',
                'Water',
                'Urination',
                'Food',
                'Excretion',
                'Shelter',
                'Sleep',
                'Sexual intercourse'
            ]
            ,
            'Safety Needs' => [
                'Health',
                'Personal security',
                'Emotional security',
                'Financial security'
            ],
            'Belonging and Love Needs' => [
                'Family',
                'Friendship',
                'Intimacy',
                'Trust',
                'Acceptance',
                'Receiving and giving love and affection'
            ],
            'Esteem Needs' => [
                'The Lower => is the need for respect from others, and may include a need for status, recognition, fame, prestige, and attention.',
                'The Higher => is the need for self-respect, and can include a need for strength, competence, mastery, self-confidence, independence, and freedom.'

            ],
            'Cognitive Needs' => [
                'creativity',
                'foresight',
                'curiosity',
                'meaning'

            ],
            'Aesthetic Needs' => [

            ],
            'Self Actualization' => [
                'Partner acquisition',
                'Parenting',
                'Utilizing and developing talents and abilities',
                'Pursuing goals'

            ],
            'Transcendence' => [
                '"Transcendence refers to the very highest and most inclusive or holistic levels of human consciousness, behaving and relating, as ends rather than means, to oneself, to significant others, to human beings in general, to other species, to nature, and to the cosmos."'
            ],
        ];
        return $this->render('home/marslow.html.twig', [
            'maslow_needs' => $maslow
        ]);

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
