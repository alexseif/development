<?php

namespace App\Controller;

use App\Entity\ExpenseInbox;
use App\Form\ExpenseInboxType;
use App\Repository\ExpenseInboxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/expense/inbox')]
class ExpenseInboxController extends BaseController
{
    const NAME = "Expense Inbox";

    #[Route('/', name: 'app_expense_inbox_index', methods: ['GET'])]
    public function index(ExpenseInboxRepository $expenseInboxRepository): Response
    {

        return $this->render('expense_inbox/index.html.twig', [
            'expense_inboxes' => $expenseInboxRepository->findAll(),
            'expense_inbox_total' => $expenseInboxRepository->sum()
        ]);
    }

    #[Route('/new', name: 'app_expense_inbox_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ExpenseInboxRepository $expenseInboxRepository): Response
    {
        $expenseInbox = new ExpenseInbox();
        $form = $this->createForm(ExpenseInboxType::class, $expenseInbox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $expenseInboxRepository->add($expenseInbox);
            $this->addFlash('success', self::NAME . self::SPACE . self::CREATED);
            return $this->redirectToRoute('app_expense_inbox_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('expense_inbox/new.html.twig', [
            'expense_inbox' => $expenseInbox,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_expense_inbox_show', methods: ['GET'])]
    public function show(ExpenseInbox $expenseInbox): Response
    {
        return $this->render('expense_inbox/show.html.twig', [
            'expense_inbox' => $expenseInbox,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_expense_inbox_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        ExpenseInbox $expenseInbox,
        ExpenseInboxRepository $expenseInboxRepository
    ): Response {
        $form = $this->createForm(ExpenseInboxType::class, $expenseInbox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $expenseInboxRepository->add($expenseInbox);
            $this->addFlash('success', self::NAME . self::SPACE . self::UPDATED);
            return $this->redirectToRoute('app_expense_inbox_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('expense_inbox/edit.html.twig', [
            'expense_inbox' => $expenseInbox,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_expense_inbox_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        ExpenseInbox $expenseInbox,
        ExpenseInboxRepository $expenseInboxRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $expenseInbox->getId(), $request->request->get('_token'))) {
            $expenseInboxRepository->remove($expenseInbox);
            $this->addFlash('success', self::NAME . self::SPACE . self::DELETED);
        }

        return $this->redirectToRoute('app_expense_inbox_index', [], Response::HTTP_SEE_OTHER);
    }
}
