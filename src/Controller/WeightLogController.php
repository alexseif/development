<?php

namespace App\Controller;

use App\Entity\WeightLog;
use App\Form\WeightLogType;
use App\Repository\WeightLogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/weightlog')]
class WeightLogController extends AbstractController
{
    #[Route('/', name: 'app_weight_log_index', methods: ['GET'])]
    public function index(WeightLogRepository $weightLogRepository): Response
    {
        return $this->render('weight_log/index.html.twig', [
            'weight_logs' => $weightLogRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_weight_log_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WeightLogRepository $weightLogRepository): Response
    {
        $weightLog = new WeightLog();
        $form = $this->createForm(WeightLogType::class, $weightLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $weightLogRepository->add($weightLog);
            return $this->redirectToRoute('app_weight_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('weight_log/new.html.twig', [
            'weight_log' => $weightLog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_weight_log_show', methods: ['GET'])]
    public function show(WeightLog $weightLog): Response
    {
        return $this->render('weight_log/show.html.twig', [
            'weight_log' => $weightLog,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_weight_log_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WeightLog $weightLog, WeightLogRepository $weightLogRepository): Response
    {
        $form = $this->createForm(WeightLogType::class, $weightLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $weightLogRepository->add($weightLog);
            return $this->redirectToRoute('app_weight_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('weight_log/edit.html.twig', [
            'weight_log' => $weightLog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_weight_log_delete', methods: ['POST'])]
    public function delete(Request $request, WeightLog $weightLog, WeightLogRepository $weightLogRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $weightLog->getId(), $request->request->get('_token'))) {
            $weightLogRepository->remove($weightLog);
        }

        return $this->redirectToRoute('app_weight_log_index', [], Response::HTTP_SEE_OTHER);
    }
}
