<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Services\FixturesManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActeurController extends AbstractController
{


    /**
     * @Route("/acteur/add", name="acteur_add")
     */

    public function add(FixturesManager $fm)
    {
        $em = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 5; $i++) {
            $acteur = new Acteur();
            $acteur->setNom($fm->getFaker()->firstName());
            $acteur->setPrenom($fm->getFaker()->name());
            $acteur->setDateDeNaissance($fm->getFaker()->date());
            $acteur->setDateDeDeces($fm->getFaker()->date());
            $acteur->setImageUrl($fm->getFaker()->imageUrl(300,150));

            $em->persist($acteur);
        }
        $em->flush();
        return $this->redirectToRoute('film');

    }




    /**
     * @Route("/acteur", name="acteur")
     */
    public function index()
    {
        return $this->render('acteur/index.html.twig', [
            'controller_name' => 'ActeurController',
        ]);
    }
}
