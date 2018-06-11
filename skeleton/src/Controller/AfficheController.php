<?php

namespace App\Controller;

use App\Entity\Affiche;
use App\Services\FixturesManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AfficheController extends Controller
{

    /**
     * @Route("/affiche/add", name="affiche_add")
     */

    public function add(FixturesManager $fm)
    {
        $em = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 5; $i++) {
            $affiche = new Affiche();
            $affiche->setDescription($fm->getFaker()->paragraph(2));
            $affiche->setImageUrl($fm->getFaker()->imageUrl(300,150));


            $em->persist($affiche);
        }
        $em->flush();
        return $this->redirectToRoute('film');

    }


    /**
     * @Route("/affiche", name="affiche")
     */
    public function index()
    {
        return $this->render('affiche/index.html.twig', [
            'controller_name' => 'AfficheController',
        ]);
    }
}
