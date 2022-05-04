<?php

namespace App\Controller;

use App\Entity\Chronometer;
use App\Form\ChronometerType;
use App\Repository\ChronometerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chronometer')]
class ChronometerController extends AbstractController
{
    #[Route('/', name: 'app_chronometer_index', methods: ['GET'])]
    public function index(ChronometerRepository $chronometerRepository): Response
    {
        return $this->render('chronometer/index.html.twig', [
            'chronometers' => $chronometerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_chronometer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChronometerRepository $chronometerRepository): Response
    {
        $chronometer = new Chronometer();
        $form = $this->createForm(ChronometerType::class, $chronometer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronometerRepository->add($chronometer);
            return $this->redirectToRoute('app_chronometer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chronometer/new.html.twig', [
            'chronometer' => $chronometer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chronometer_show', methods: ['GET'])]
    public function show(Chronometer $chronometer): Response
    {
        return $this->render('chronometer/show.html.twig', [
            'chronometer' => $chronometer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_chronometer_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Chronometer $chronometer,
        ChronometerRepository $chronometerRepository
    ): Response {
        $form = $this->createForm(ChronometerType::class, $chronometer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronometerRepository->add($chronometer);
            return $this->redirectToRoute('app_chronometer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chronometer/edit.html.twig', [
            'chronometer' => $chronometer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chronometer_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Chronometer $chronometer,
        ChronometerRepository $chronometerRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $chronometer->getId(), $request->request->get('_token'))) {
            $chronometerRepository->remove($chronometer);
        }

        return $this->redirectToRoute('app_chronometer_index', [], Response::HTTP_SEE_OTHER);
    }
}
