<?php

namespace App\Controller;

use App\Entity\Personen;
use App\Form\PersonenType;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\PersonenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personen')]
class PersonenController extends AbstractController
{
    #[Route('/', name: 'app_personen_index', methods: ['GET'])]
    public function index(Request $request, PersonenRepository $personenRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $personenRepository->findAll(), // Hier musst du die Query für deine Daten einfügen
            $request->query->getInt('page', 1), // Aktuelle Seite
            10 // Anzahl der Elemente pro Seite
        );

        return $this->render('personen/index.html.twig', [
            'personens' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_personen_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $personen = new Personen();
        $form = $this->createForm(PersonenType::class, $personen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($personen);
            $entityManager->flush();

            return $this->redirectToRoute('app_personen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personen/new.html.twig', [
            'personen' => $personen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personen_show', methods: ['GET'])]
    public function show(Personen $personen): Response
    {
        return $this->render('personen/show.html.twig', [
            'personen' => $personen,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_personen_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Personen $personen, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonenType::class, $personen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_personen_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personen/edit.html.twig', [
            'personen' => $personen,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personen_delete', methods: ['POST'])]
    public function delete(Request $request, Personen $personen, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personen->getId(), $request->request->get('_token'))) {
            $entityManager->remove($personen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_personen_index', [], Response::HTTP_SEE_OTHER);
    }
}
