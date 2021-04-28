<?php

namespace App\Controller;

use App\Entity\AwesomeCandidate;
use App\Form\AwesomeCandidateType;
use App\Repository\AwesomeCandidateRepository;
use App\Service\AwesomeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/awesome/candidate')]
class AwesomeCandidateController extends AbstractController
{
    #[Route('/', name: 'awesome_candidate_index', methods: ['GET'])]
    public function index(AwesomeCandidateRepository $awesomeCandidateRepository): Response
    {
        return $this->render('awesome_candidate/index.html.twig', [
            'awesome_candidates' => $awesomeCandidateRepository->findAll(),
        ]);
    }

    #[Route('/is/awesome', name: 'awesome_candidate_landing', methods: ['GET'])]
    public function awesome(): Response
    {
        return $this->render('awesome_candidate/awesome.html.twig');
    }

    #[Route('/is/not/quite/awesome', name: 'not_awesome_candidate_landing', methods: ['GET'])]
    public function notAwesome(): Response
    {
        return $this->render('awesome_candidate/not_quite_awesome.html.twig');
    }

    #[Route('/new', name: 'awesome_candidate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AwesomeService $awesomeService): Response
    {
        $awesomeCandidate = new AwesomeCandidate();
        $form = $this->createForm(AwesomeCandidateType::class, $awesomeCandidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $awesomeCandidate->setIsAwesome($awesomeService->isCandidateAwesome($awesomeCandidate));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($awesomeCandidate);
            $entityManager->flush();

            if ($awesomeCandidate->getIsAwesome()) {
                return $this->redirectToRoute('awesome_candidate_landing');
            }

            return $this->redirectToRoute('not_awesome_candidate_landing');
        }

        return $this->render('awesome_candidate/new.html.twig', [
            'awesome_candidate' => $awesomeCandidate,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'awesome_candidate_delete', methods: ['POST'])]
    public function delete(Request $request, AwesomeCandidate $awesomeCandidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$awesomeCandidate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($awesomeCandidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('awesome_candidate_index');
    }
}
