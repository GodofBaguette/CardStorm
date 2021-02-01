<?php

namespace App\Controller;

use App\Entity\Carte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    /**
     * @Route("/carte/{jeu}/{id}", name="carte_page")
     */
    public function carte(int $id): Response
    {
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->find($id);

            return $this->render('carte/pagecarte.html.twig', [
                'cartes' => $carte,
            ]);
    }

    /**
     * @Route("/carte/{jeu}", name="carte")
     */
    public function show(string $jeu): Response
    {
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->findBy(['jeu' => $jeu]);

            return $this->render('carte/carte.html.twig', [
                'cartes' => $carte,
            ]);
    }
}
