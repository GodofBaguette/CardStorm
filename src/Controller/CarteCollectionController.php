<?php

namespace App\Controller;

use App\Entity\CarteCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Carte;
use App\Form\CarteCollectionType;
use Symfony\Component\HttpFoundation\Request;

class CarteCollectionController extends AbstractController
{
    /**
     * @Route("/profil/{pseudo}/collection", name="allcollection")
     */
    public function allCollection(): Response
    {
        $user = $this->getUser();

        $collections = $user->getCarteCollection();

        return $this->render('carte_collection/allcollection.html.twig', [
            'allcollections' => $collections,
            'user' =>$user,
        ]);
    }

    /**
     * @Route("/profil/{pseudo}/collection/{id}", name="carte_collection")
     */
    public function collection(int $id): Response
    {
        $collection = $this->getDoctrine()
        ->getRepository(CarteCollection::class)
        ->find($id);

            return $this->render('carte_collection/cartecollection.html.twig', [
                'collections' => $collection,
            ]);
    }

    /**
     * @Route("/profil/{pseudo}/createcollection", name="createcollection")
     */
    public function createCollection(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        

        $collection = new CarteCollection();

        $form = $this->createForm(CarteCollectionType::class, $collection);

        $form->handleRequest($request);

        $user = $this->getUser();


        if($form->isSubmitted() && $form->isValid()) {
            $collection->setUser($user);
            $entityManager->persist($collection);
            $entityManager->flush();

            return $this->redirectToRoute('profil', [
                'pseudo' => $this->getUser()->getUsername()
            ]);
        }

        return $this->render('carte_collection/createcollection.html.twig', [
            'formCollection' => $form->createView()
        ]);
    }

    /**
     * @Route("/carte/{id}/addcard", name="addcard")
     */

    public function addcard(Request $request, int $id): Response
    {
        $user = $this->getUser();
        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->find($id);

        $collection = $user->getCarteCollections();

        $collection->addCarte($carte);

        return $this->render('carte/pagecarte.html.twig', [
            'collection' => $collection,
        ]);
    }

}
