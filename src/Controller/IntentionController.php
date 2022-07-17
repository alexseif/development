<?php

namespace App\Controller;

use App\Entity\Intention;
use App\Form\IntentionType;
use App\Repository\IntentionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/intention')]
class IntentionController extends AbstractController
{
    #[Route('/', name: 'app_intention_index', methods: ['GET'])]
    public function index(IntentionRepository $intentionRepository): Response
    {
        return $this->render('intention/index.html.twig', [
            'intentions' => $intentionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_intention_new', methods: ['GET', 'POST'])]
    public function new(Request $request, IntentionRepository $intentionRepository): Response
    {
        $intention = new Intention();
        $form = $this->createForm(IntentionType::class, $intention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intentionRepository->add($intention, true);

            return $this->redirectToRoute('app_intention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('intention/new.html.twig', [
            'intention' => $intention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intention_show', methods: ['GET'])]
    public function show(Intention $intention): Response
    {
        return $this->render('intention/show.html.twig', [
            'intention' => $intention,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_intention_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Intention $intention, IntentionRepository $intentionRepository): Response
    {
        $form = $this->createForm(IntentionType::class, $intention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intentionRepository->add($intention, true);

            return $this->redirectToRoute('app_intention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('intention/edit.html.twig', [
            'intention' => $intention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intention_delete', methods: ['POST'])]
    public function delete(Request $request, Intention $intention, IntentionRepository $intentionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $intention->getId(), $request->request->get('_token'))) {
            $intentionRepository->remove($intention, true);
        }

        return $this->redirectToRoute('app_intention_index', [], Response::HTTP_SEE_OTHER);
    }
}
