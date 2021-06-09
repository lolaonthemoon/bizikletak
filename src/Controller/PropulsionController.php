<?php

namespace App\Controller;

use App\Entity\Propulsion;
use App\Form\PropulsionType;
use App\Repository\PropulsionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/propulsion")
 */
class PropulsionController extends AbstractController
{
    /**
     * @Route("/", name="propulsion_index", methods={"GET"})
     */
    public function index(PropulsionRepository $propulsionRepository): Response
    {
        return $this->render('propulsion/index.html.twig', [
            'propulsions' => $propulsionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="propulsion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $propulsion = new Propulsion();
        $form = $this->createForm(PropulsionType::class, $propulsion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propulsion);
            $entityManager->flush();

            return $this->redirectToRoute('propulsion_index');
        }

        return $this->render('propulsion/new.html.twig', [
            'propulsion' => $propulsion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="propulsion_show", methods={"GET"})
     */
    public function show(Propulsion $propulsion): Response
    {
        return $this->render('propulsion/show.html.twig', [
            'propulsion' => $propulsion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="propulsion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Propulsion $propulsion): Response
    {
        $form = $this->createForm(PropulsionType::class, $propulsion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('propulsion_index');
        }

        return $this->render('propulsion/edit.html.twig', [
            'propulsion' => $propulsion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="propulsion_delete", methods={"POST"})
     */
    public function delete(Request $request, Propulsion $propulsion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propulsion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($propulsion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('propulsion_index');
    }
}
