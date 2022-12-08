<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Marque;
use App\Repository\AnnonceRepository;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(AnnonceRepository $annonceRepository, MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'annonces' => $annonceRepository->findAll(),
            'marques' => $marqueRepository->findAll(),
        ]);
    }

    #[Route('/card/{id}', name: 'card', methods: ['GET'])]
    public function card(Marque $marque, AnnonceRepository $annonceRepository, MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/card.html.twig', [ 
            'marq' => $marque,
            'annonces' => $annonceRepository->findAll(),
            'marques' => $marqueRepository->findAll(),
        ]);
    }
}
