<?php

namespace App\Controller;

use App\Entity\Coaches;
use App\Form\CoachesType;
use App\Repository\CoachesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/coaches')]
class CoachesController extends AbstractController
{
    #[Route('/', name: 'app_coaches_index', methods: ['GET'])]
    public function index(CoachesRepository $coachesRepository, Request $request): Response
    {
        //dd($coachesRepository->findAll());
        return $this->render('coaches/index.html.twig', [
            'coaches' => $coachesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_coaches_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CoachesRepository $coachesRepository): Response
    {
        $coach = new Coaches();
        $form = $this->createForm(CoachesType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachesRepository->add($coach);
            return $this->redirectToRoute('app_coaches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coaches/new.html.twig', [
            'coach' => $coach,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coaches_show', methods: ['GET'])]
    public function show(Coaches $coach): Response
    {
        return $this->render('coaches/show.html.twig', [
            'coach' => $coach,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_coaches_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Coaches $coach, CoachesRepository $coachesRepository): Response
    {
        $form = $this->createForm(CoachesType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachesRepository->add($coach);
            return $this->redirectToRoute('app_coaches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coaches/edit.html.twig', [
            'coach' => $coach,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coaches_delete', methods: ['POST'])]
    public function delete(Request $request, Coaches $coach, CoachesRepository $coachesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coach->getId(), $request->request->get('_token'))) {
            $coachesRepository->remove($coach);
        }

        return $this->redirectToRoute('app_coaches_index', [], Response::HTTP_SEE_OTHER);
    }
}
