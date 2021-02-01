<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{pseudo}", name="profil")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('profil/profil.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/profil/{pseudo}/update", name="update")
     */
    public function update(Request $request, UserPasswordEncoderInterface $encode): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        

        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($encode->encodePassword($user,$user->getPassword()));
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('profil', [
                'pseudo' => $this->getUser()->getUsername()
            ]);
        }

        return $this->render('profil/update.html.twig', [
            'formUser' => $form->createView()
        ]);
    }
}
