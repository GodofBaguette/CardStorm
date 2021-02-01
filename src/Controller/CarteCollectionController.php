<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteCollectionController extends AbstractController
{
    /**
     * @Route("/carte/collection", name="carte_collection")
     */
    public function index(): Response
    {
        return $this->render('carte_collection/index.html.twig', [
            'controller_name' => 'CarteCollectionController',
        ]);
    }
}
