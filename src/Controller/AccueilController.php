<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("", name="accueil")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        
        return $this->render('accueil/accueil.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation(): Response
    {
        $user = $this->getUser();
        
        return $this->render('presentation/presentation.html.twig', [
            'user' => $user,
        ]);
    }
}
