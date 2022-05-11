<?php

namespace App\Controller;

use App\Entity\CoachingPrive;
use App\Form\CoachingPriveType;
use App\Repository\CoachingPriveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/coaching/prive')]
class CoachingPriveController extends AbstractController
{
    #[Route('/', name: 'app_coaching_prive_index', methods: ['GET'])]
    public function index(CoachingPriveRepository $coachingPriveRepository): Response
    {
        return $this->render('coaching_prive/index.html.twig', [
            'coaching_prives' => $coachingPriveRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_coaching_prive_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CoachingPriveRepository $coachingPriveRepository): Response
    {
        $coachingPrive = new CoachingPrive();
        $form = $this->createForm(CoachingPriveType::class, $coachingPrive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachingPriveRepository->add($coachingPrive);
            return $this->redirectToRoute('app_coaching_prive_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coaching_prive/new.html.twig', [
            'coaching_prive' => $coachingPrive,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coaching_prive_show', methods: ['GET'])]
    public function show(CoachingPrive $coachingPrive): Response
    {
        return $this->render('coaching_prive/show.html.twig', [
            'coaching_prive' => $coachingPrive,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_coaching_prive_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CoachingPrive $coachingPrive, CoachingPriveRepository $coachingPriveRepository): Response
    {
        $form = $this->createForm(CoachingPriveType::class, $coachingPrive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachingPriveRepository->add($coachingPrive);
            return $this->redirectToRoute('app_coaching_prive_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coaching_prive/edit.html.twig', [
            'coaching_prive' => $coachingPrive,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coaching_prive_delete', methods: ['POST'])]
    public function delete(Request $request, CoachingPrive $coachingPrive, CoachingPriveRepository $coachingPriveRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coachingPrive->getId(), $request->request->get('_token'))) {
            $coachingPriveRepository->remove($coachingPrive);
        }

        return $this->redirectToRoute('app_coaching_prive_index', [], Response::HTTP_SEE_OTHER);
    }
}
