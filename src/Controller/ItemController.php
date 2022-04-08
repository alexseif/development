<?php

namespace App\Controller;

use App\Dictrionary\Types;
use App\Entity\Item;
use App\Exceptions\TypeNotFoundException;
use App\Form\ItemType;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/item')]
class ItemController extends BaseController
{
    const NAME = "Item";

    #[Route('/{type}', name: 'app_item_index', methods: ['GET'])]
    public function index(ItemRepository $itemRepository, $type = 'item'): Response
    {
        if (!in_array($type, Types::$typeLabels)) {
            throw new TypeNotFoundException();
        }
        return $this->render('item/index.html.twig', [
            'type' => $type,
            'items' => $itemRepository->findBy(['type' => $type]),
        ]);
    }

    #[Route('/{type}/new', name: 'app_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ItemRepository $itemRepository, $type = 'item'): Response
    {
        $item = new Item();
        $item->setType($type);
        $form_item = $this->createForm(ItemType::class, $item);
        $form_item->handleRequest($request);

        if ($form_item->isSubmitted() && $form_item->isValid()) {
            $itemRepository->add($item);
            $this->addFlash('success', self::NAME . self::SPACE . self::CREATED);
            return $this->redirectToRoute('app_item_index', ['type' => $type], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item/new.html.twig', [
            'type' => $type,
            'item' => $item,
            'form_item' => $form_item,
        ]);
    }

    #[Route('/{type}/{id}', name: 'app_item_show', methods: ['GET'])]
    public function show(Item $item, $type = 'item'): Response
    {
        return $this->render('item/show.html.twig', [
            'type' => $type,
            'item' => $item,
        ]);
    }

    #[Route('/{type}/{id}/edit', name: 'app_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Item $item, ItemRepository $itemRepository, $type = 'item'): Response
    {
        $form_item = $this->createForm(ItemType::class, $item);
        $form_item->handleRequest($request);

        if ($form_item->isSubmitted() && $form_item->isValid()) {
            $itemRepository->add($item);
            $this->addFlash('success', self::NAME . self::SPACE . self::UPDATED);
            return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item/edit.html.twig', [
            'type' => $type,
            'item' => $item,
            'form_item' => $form_item,
        ]);
    }

    #[Route('/{type}/{id}', name: 'app_item_delete', methods: ['POST'])]
    public function delete(Request $request, Item $item, ItemRepository $itemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $item->getId(), $request->request->get('_token'))) {
            $itemRepository->remove($item);
            $this->addFlash('success', self::NAME . self::SPACE . self::DELETED);
        }

        return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
