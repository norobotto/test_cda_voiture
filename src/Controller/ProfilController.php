<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        $author = $this->getUser();

        return $this->render('profil/profil.html.twig', [
            'annonces' => $annonceRepository->findBy([
                'author' => $author,
            ]),
            
        ]);
    }
}
