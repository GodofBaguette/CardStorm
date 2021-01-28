<?php

namespace App\Controller;

use App\Entity\Carte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    /**
     * @Route("/carteygo", name="carteygo")
     */
    public function showygo(): Response
    {
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->findAll();

        return $this->render('carte/ygo.html.twig', [
            'cartes' => $carte,
        ]);
    }

    /**
     * @Route("/cartedb", name="cartedb")
     */
    public function showdb(): Response
    {
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->findAll();

        return $this->render('carte/db.html.twig', [
            'cartes' => $carte,
        ]);
    }
}
