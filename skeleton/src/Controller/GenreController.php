<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Services\FixturesManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenreController extends AbstractController
{


    /**
     * @Route("/genre/add", name="genre_add")
     */

    public function add(FixturesManager $fm)
    {
        $em = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 5; $i++) {
            $genre = new Genre();
            $genre->setNom($fm->getFaker()->text(5));

            $em->persist($genre);
        }
        $em->flush();
        return $this->redirectToRoute('genre');

    }


    /**
     * @Route("/genre", name="genre")
     */
    public function index()
    {

        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();
        return $this->render('genre/index.html.twig', [
            'genres' => $genres,
        ]);
    }

    /**
     * @Route("/genre/{id}", name="genre_show")
     */
    public function read($id){
        $genre = $this->getDoctrine()->getRepository(Genre::class)->find($id);

        return $this->render('genre/detail.html.twig',array(
            'genre'=>$genre
        ));

    }
}
