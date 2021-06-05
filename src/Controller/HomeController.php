<?php

namespace App\Controller;

use App\Repository\BikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BikeRepository $bikeRepository): Response
    {
        $allBikes = $bikeRepository->findAll();
        return $this->render('home/index.html.twig', [
            'allBikes' => $allBikes,
        ]);
    }
}
