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

        $carte = $collection->getCarte();

        $user = $this->getUser();


            return $this->render('carte_collection/cartecollection.html.twig', [
                'collections' => $collection,
                'cartes' => $carte,
                'user' => $user,
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

            return $this->redirectToRoute('allcollection', [
                'pseudo' => $this->getUser()->getUsername()
            ]);
        }

        return $this->render('carte_collection/createcollection.html.twig', [
            'formCollection' => $form->createView(),
            'user' => $user,
        ]);
    }

    /**
     * @Route("/profil/{carte}/{collection}", name="addcard")
     */
    public function addCard(int $carte, string $collection): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $carte = $this->getDoctrine()
        ->getRepository(Carte::class)
        ->find($carte);

        $ght = $this->getUser()->getCarteCollection();

        foreach($ght as $listes){
            if($listes->getNom() === $collection){
                $listes->addCarte($carte);
                $entityManager->persist($listes);
                $entityManager->flush();
            }
        }       

        return $this->redirectToRoute('carte', [
            'jeu' => $carte->getJeu()
        ]);
    }

    /**
     * @Route("/profil/{pseudo}/collection/{id}/delete", name="delete_collection")
     */
    public function deleteCollection(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $collection = $entityManager->getRepository(CarteCollection::class)->find($id);

        $entityManager->remove($collection);

        $entityManager->flush();

        return $this->redirectToRoute('allcollection', [
            'pseudo' => $this->getUser()->getUsername()
        ]);
    }

    /**
     * @Route("/profil/{pseudo}/{collection}/{id}/delete", name="delete_carte")
     */
    public function deleteCarte(int $id, string $collection): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $carte = $entityManager->getRepository(Carte::class)->find($id);

        $all = $this->getUser()->getCarteCollection();

        foreach($all as $coll){
            if($coll->getNom() === $collection){
                $coll->removeCarte($carte);
                $entityManager->persist($coll);
                $entityManager->flush();

                return $this->redirectToRoute('carte_collection', [
                    'pseudo' => $this->getUser()->getUsername(),
                    'id' => $coll->getId()
                ]);
            }
        }

        
    }
}
