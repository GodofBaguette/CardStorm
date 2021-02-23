<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Entity\User;
use App\Entity\CarteCollection;
use App\Form\CarteCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    //affiche la page d'information d'une carte
    /**
     * @Route("/carte/{jeu}/{id}", name="carte_page")
     */
    public function carte(int $id): Response
    {
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->find($id);

        $user = $this->getUser();

        if(is_null($user)) {
            return $this->render('carte/pagecarte.html.twig', [
                'cartes' => $carte,
                'user' => $user,
            ]);
        }else{
            $collection = $user->getCarteCollection();
        

            return $this->render('carte/pagecarte.html.twig', [
                'cartes' => $carte,
                'collections' => $collection,
                'user' => $user,
            ]);
        }
    }

    //affiche toute les cartes
    /**
     * @Route("/carte/{jeu}", name="carte")
     */
    public function show(string $jeu): Response
    {

        $user = $this->getUser();

        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->findBy(['jeu' => $jeu]);

            return $this->render('carte/carte.html.twig', [
                'cartes' => $carte,
                'user' => $user,
            ]);
    }
}
