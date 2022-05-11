<?php

namespace App\Controller;

use App\Entity\TypeAbonnement;
use App\Form\TypeAbonnementType;
use App\Repository\TypeAbonnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/abonnement')]
class TypeAbonnementController extends AbstractController
{
    #[Route('/', name: 'app_type_abonnement_index', methods: ['GET'])]
    public function index(TypeAbonnementRepository $typeAbonnementRepository): Response
    {
        return $this->render('type_abonnement/index.html.twig', [
            'type_abonnements' => $typeAbonnementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_abonnement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeAbonnementRepository $typeAbonnementRepository): Response
    {
        $typeAbonnement = new TypeAbonnement();
        $form = $this->createForm(TypeAbonnementType::class, $typeAbonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeAbonnementRepository->add($typeAbonnement);
            return $this->redirectToRoute('app_type_abonnement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_abonnement/new.html.twig', [
            'type_abonnement' => $typeAbonnement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_abonnement_show', methods: ['GET'])]
    public function show(TypeAbonnement $typeAbonnement): Response
    {
        return $this->render('type_abonnement/show.html.twig', [
            'type_abonnement' => $typeAbonnement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_abonnement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeAbonnement $typeAbonnement, TypeAbonnementRepository $typeAbonnementRepository): Response
    {
        $form = $this->createForm(TypeAbonnementType::class, $typeAbonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeAbonnementRepository->add($typeAbonnement);
            return $this->redirectToRoute('app_type_abonnement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_abonnement/edit.html.twig', [
            'type_abonnement' => $typeAbonnement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_abonnement_delete', methods: ['POST'])]
    public function delete(Request $request, TypeAbonnement $typeAbonnement, TypeAbonnementRepository $typeAbonnementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAbonnement->getId(), $request->request->get('_token'))) {
            $typeAbonnementRepository->remove($typeAbonnement);
        }

        return $this->redirectToRoute('app_type_abonnement_index', [], Response::HTTP_SEE_OTHER);
    }
}
